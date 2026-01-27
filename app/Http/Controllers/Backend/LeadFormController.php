<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Services\ApiService;
use Illuminate\Support\Facades\Log;

class LeadFormController extends Controller
{
    public function index()
    {
        try {
            $apiService = new ApiService();
            $page  = request()->get('page', 1);
            $response = $apiService->makeRequest(
                'GET',
                'https://leads.wizards.co.in/api/v1/form',
                [
                    'page'  => $page,
                    'limit' => 12,
                ]
            );            
            //Log::info( "Forms fetched successfully" . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) );
            $forms = [];
            $pagination = [];

            if ($response['success']) {
                $apiData = $response['data'] ?? [];
                $forms = $apiData['response']['forms'] ?? [];
                $pagination = $apiData['response'] ?? [];
            }
            Log::info('Forms fetched successfully.', ['forms' => $forms, 'pagination' => $pagination]);
            if (request()->ajax()) {
                return response()->json([
                    'status' => 'success',
                    'forms_list_html' => view(
                        'backend.pages.manage-lead.form.partials.form-list',
                        compact('forms', 'pagination')
                    )->render(),                    
                ]);
            }
            return view('backend.pages.manage-lead.form.index', compact('forms', 'pagination'));
            
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return view('backend.pages.manage-lead.form.index', [
                'forms' => [],
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function create(Request $request)
    {
        $form = '
        <div class="modal-body">
            <form method="POST" action="' . route('manage-lead.forms.store') . '" accept-charset="UTF-8" id="addLeadForm" enctype="multipart/form-data">
                ' . csrf_field() . '
                <div class="row">                    
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Form Name *</label>
                            <input type="text" id="title" name="title" class="form-control">
                            <div class="invalid-feedback" id="title_error"></div>
                        </div>
                    </div>   
                </div>
                <div class="row">                    
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" id="description" name="description" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="adminCampaign" class="form-label">Admin Campaign Name</label>
                            <input type="text" id="adminCampaign" name="adminCampaign" class="form-control" placeholder="Example::admin_new_lead_alert">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="userCampaign" class="form-label">User Campaign Name</label>
                            <input type="text" id="userCampaign" name="userCampaign" class="form-control" placeholder="Example::user_lead_received">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="mb-2">Form Fields</h5>
                        <div class="field_name_append_here">
                            <!-- Dynamic fields will be added here -->
                        </div>
                    </div>
                </div>                
                <div class="row mt-2"> 
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end mb-3">
                            <button type="button" class="btn btn-success" id="addFieldBtn">
                                <i class="ti ti-circle-plus me-1"></i> Add Field
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="row"> 
                    <div class="modal-footer pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>';

        return response()->json([
            'status' => 'success',
            'message' => 'Form created successfully',
            'form' => $form,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'adminCampaign' => 'nullable|string',
                'userCampaign' => 'nullable|string',
                'field_label' => 'required|array|min:1',
                'field_type' => 'required|array|min:1',
                'field_options' => 'nullable|array',
                'field_required' => 'nullable|array',
                'field_order' => 'nullable|array',
            ], [
                'title.required' => 'Form name is required',
                'field_label.required' => 'At least one field is required',
                'field_label.min' => 'At least one field is required',
                'field_type.required' => 'Field type is required for all fields',
                'field_type.min' => 'Field type is required for all fields',
            ]);
            $fieldLabels = $validated['field_label'] ?? [];
            $fieldTypes = $validated['field_type'] ?? [];
            if (count($fieldLabels) !== count($fieldTypes)) {
                throw ValidationException::withMessages([
                    'field_label' => ['Number of field labels must match number of field types'],
                    'field_type' => ['Number of field labels must match number of field types'],
                ]);
            }
            foreach ($fieldLabels as $index => $label) {
                if (empty(trim($label))) {
                    throw ValidationException::withMessages([
                        "field_label.{$index}" => ['Field label is required']
                    ]);
                }
                if (empty($fieldTypes[$index])) {
                    throw ValidationException::withMessages([
                        "field_type.{$index}" => ['Field type is required']
                    ]);
                }
                $type = $fieldTypes[$index];
                $options = $validated['field_options'][$index] ?? '';

                if (in_array($type, ['select', 'radio', 'checkbox'])) {
                    if (empty(trim($options))) {
                        throw ValidationException::withMessages([
                            "field_options.{$index}" => ['Options are required for ' . $type . ' field type']
                        ]);
                    }
                    $optionArray = explode(',', $options);
                    $validOptions = array_filter(array_map('trim', $optionArray), function ($opt) {
                        return !empty($opt);
                    });

                    if (count($validOptions) === 0) {
                        throw ValidationException::withMessages([
                            "field_options.{$index}" => ['Please enter at least one valid option']
                        ]);
                    }
                }
            }
            $formData = [
                'title' => $validated['title'],
                'description' => $validated['description'] ?? '',
                'adminCampaign' => $validated['adminCampaign'] ?? '',
                'userCampaign' => $validated['userCampaign'] ?? '',
                'fields' => []
            ];
            foreach ($fieldLabels as $index => $label) {
                $label = trim($label);
                $type = $fieldTypes[$index];

                if (!empty($label) && !empty($type)) {
                    $field = [
                        'label' => $label,
                        'type' => $type,
                        'required' => isset($validated['field_required'][$index]) &&
                            in_array('true', (array)$validated['field_required']),
                        'order' => isset($validated['field_order'][$index]) ?
                            intval($validated['field_order'][$index]) : ($index + 1)
                    ];
                    if (in_array($type, ['select', 'radio', 'checkbox'])) {
                        $options = $validated['field_options'][$index] ?? '';
                        if (!empty($options)) {
                            $optionArray = explode(',', $options);
                            $field['options'] = array_map('trim', array_filter($optionArray, function ($opt) {
                                return !empty(trim($opt));
                            }));
                        }
                    }

                    $formData['fields'][] = $field;
                }
            }
            if (empty($formData['fields'])) {
                throw ValidationException::withMessages([
                    'field_label' => ['At least one valid field is required']
                ]);
            }

            $apiService = new ApiService();
            $response = $apiService->makeRequest('POST', 'https://leads.wizards.co.in/api/v1/form', $formData);
            if ($response['success']) {               
                Log::info('API Response:', $response);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Form created successfully!',
                    'api_response' => $response['data']
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => $response['error']
                ], 400);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation Error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Server Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit(Request $request, $formId)
    {
        try {
            $apiService = new ApiService();
            $response = $apiService->makeRequest('GET', "https://leads.wizards.co.in/api/v1/form/{$formId}");
            Log::info( "Forms fetched successfully for edit" . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) );            
            if (!$response['success']) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Form not found or could not be loaded'
                ], 404);
            }            
            $form = $response['data']['form'] ?? $response['data'];
            $formHtml = $this->generateEditFormHtml($form);            
            return response()->json([
                'status' => 'success',
                'message' => 'Form loaded successfully',
                'form' => $formHtml,
                'form_data' => $form
            ]);            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Server Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /* Generate HTML for edit form*/
    private function generateEditFormHtml($formData)
    {
        $fieldsHtml = '';
        $fieldCounter = 0;
        
        if (!empty($formData['fields'])) {
            foreach ($formData['fields'] as $field) {
                $fieldCounter++;
                $fieldsHtml .= $this->generateEditFieldHtml($field, $fieldCounter);
            }
        }
        
        return '
        <div class="modal-body">
            <form method="POST" action="' . route('manage-lead.forms.update', $formData['id']) . '" accept-charset="UTF-8" id="editLeadForm" enctype="multipart/form-data">
                ' . csrf_field() . '
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="form_id" value="' . ($formData['id'] ?? '') . '">                
                <div class="row">                    
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Form Name *</label>
                            <input type="text" id="title" name="title" class="form-control" value="' . htmlspecialchars($formData['title'] ?? '') . '">
                            <div class="invalid-feedback" id="title_error"></div>
                        </div>
                    </div>   
                </div>
                
                <div class="row">                    
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" id="description" name="description" class="form-control" value="' . htmlspecialchars($formData['description'] ?? '') . '">
                        </div>
                    </div>
                </div>
                
                <div class="row">    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="adminCampaign" class="form-label">Admin Campaign Name</label>
                            <input type="text" id="adminCampaign" name="adminCampaign" class="form-control" value="' . htmlspecialchars($formData['adminCampaign'] ?? '') . '" placeholder="Example::admin_new_lead_alert">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="userCampaign" class="form-label">User Campaign Name</label>
                            <input type="text" id="userCampaign" name="userCampaign" class="form-control" value="' . htmlspecialchars($formData['userCampaign'] ?? '') . '" placeholder="Example::user_lead_received">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="mb-2">Form Fields</h5>
                        <div class="field_name_append_here">
                            ' . $fieldsHtml . '
                        </div>
                    </div>
                </div>                
                
                <div class="row mt-2"> 
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end mb-3">
                            <button type="button" class="btn btn-success" id="addFieldBtn">
                                <i class="ti ti-circle-plus me-1"></i> Add Field
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="row"> 
                    <div class="modal-footer pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>';
    }
    
    /* Generate HTML for a single field in edit mode */
    private function generateEditFieldHtml($field, $index)
    {
        $optionsValue = '';
        Log::info('Generating field HTML', ['field' => $field['options']]);
        if (!empty($field['options'])) {
            if (is_string($field['options'])) {
                $decodedOptions = json_decode($field['options'], true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decodedOptions)) {
                    $optionsValue = implode(', ', $decodedOptions);
                    Log::info('Parsed JSON options', ['decoded' => $decodedOptions]);
                } else {
                    $optionsValue = $field['options'];
                    Log::info('Treated options as string', ['value' => $optionsValue]);
                }
            } elseif (is_array($field['options'])) {
                $optionsValue = implode(', ', $field['options']);
                Log::info('Options already array', ['value' => $optionsValue]);
            }
        }
        
        $optionsContainerStyle = in_array($field['type'], ['select', 'radio', 'checkbox']) ? '' : 'style="display: none;"';        
        $requiredChecked = ($field['required'] ?? false) ? 'checked' : '';        
        $fieldTypes = [
            'text' => 'Text',
            'email' => 'Email',
            'textarea' => 'Textarea',
            'select' => 'Select',
            'radio' => 'Radio',
            'checkbox' => 'Checkbox',
            'number' => 'Number',
            'date' => 'Date',
            'file' => 'File Upload'
        ];        
        $typeOptions = '';
        foreach ($fieldTypes as $value => $label) {
            $selected = $field['type'] == $value ? 'selected' : '';
            $typeOptions .= '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
        }
        
        return '
        <div class="field-row row mb-4 border-bottom pb-3" data-index="' . $index . '">
            <div class="col-md-12 col-12">
                <div class="mb-3">                                                
                    <h6>Field ' . $index . ' <span class="text-danger">*</span></h6>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Label <span class="text-danger">*</span></label>
                    <input type="text" name="field_label[]" class="form-control field-label" value="' . htmlspecialchars($field['label'] ?? '') . '" placeholder="e.g., First Name">
                    <div class="invalid-feedback field_label_error"></div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Type <span class="text-danger">*</span></label>
                    <select name="field_type[]" class="form-control field-type-select">
                        <option value="">-- Select Field Type --</option>
                        ' . $typeOptions . '
                    </select>
                    <div class="invalid-feedback field_type_error"></div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="field_order[]" class="form-control" value="' . ($field['order'] ?? $index) . '" min="1">
                </div>
            </div>            
            
            <div class="col-md-12 col-12 field-options-container" ' . $optionsContainerStyle . '>
                <div class="mb-3">
                    <label class="form-label">Options (comma separated) <span class="text-danger">*</span></label>
                    <textarea class="form-control field-options" name="field_options[]" rows="2" placeholder="e.g., Option 1, Option 2, Option 3">' . htmlspecialchars($optionsValue) . '</textarea>
                    <small class="form-text text-muted">Enter options separated by commas (for Select, Radio, Checkbox)</small>
                    <div class="invalid-feedback field_options_error"></div>
                </div>
            </div>            
            
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="field_required[]" value="true" class="form-check-input required-checkbox" id="field_required_' . $index . '" ' . $requiredChecked . '>
                        <label class="form-check-label" for="field_required_' . $index . '">Required Field</label>
                    </div>
                </div>
            </div>            
            
            <div class="col-md-6 col-12">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm remove-field-btn">
                        <i class="ti ti-trash me-1"></i> Remove Field
                    </button>
                </div>
            </div>
        </div>';
    }

    /* Update the specified resource in storage.*/
    public function update(Request $request, $formId)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'adminCampaign' => 'nullable|string',
                'userCampaign' => 'nullable|string',
                'field_label' => 'required|array|min:1',
                'field_type' => 'required|array|min:1',
                'field_options' => 'nullable|array',
                'field_required' => 'nullable|array',
                'field_order' => 'nullable|array',
            ], [
                'title.required' => 'Form name is required',
                'field_label.required' => 'At least one field is required',
                'field_label.min' => 'At least one field is required',
                'field_type.required' => 'Field type is required for all fields',
                'field_type.min' => 'Field type is required for all fields',
            ]);
            $fieldLabels = $validated['field_label'] ?? [];
            $fieldTypes = $validated['field_type'] ?? [];            
            if (count($fieldLabels) !== count($fieldTypes)) {
                throw ValidationException::withMessages([
                    'field_label' => ['Number of field labels must match number of field types'],
                    'field_type' => ['Number of field labels must match number of field types'],
                ]);
            }
            foreach ($fieldLabels as $index => $label) {
                if (empty(trim($label))) {
                    throw ValidationException::withMessages([
                        "field_label.{$index}" => ['Field label is required']
                    ]);
                }
                
                if (empty($fieldTypes[$index])) {
                    throw ValidationException::withMessages([
                        "field_type.{$index}" => ['Field type is required']
                    ]);
                }
                
                $type = $fieldTypes[$index];
                $options = $validated['field_options'][$index] ?? '';

                if (in_array($type, ['select', 'radio', 'checkbox'])) {
                    if (empty(trim($options))) {
                        throw ValidationException::withMessages([
                            "field_options.{$index}" => ['Options are required for ' . $type . ' field type']
                        ]);
                    }
                    
                    $optionArray = explode(',', $options);
                    $validOptions = array_filter(array_map('trim', $optionArray), function ($opt) {
                        return !empty($opt);
                    });

                    if (count($validOptions) === 0) {
                        throw ValidationException::withMessages([
                            "field_options.{$index}" => ['Please enter at least one valid option']
                        ]);
                    }
                }
            }
            $formData = [
                'title' => $validated['title'],
                'description' => $validated['description'] ?? '',
                'adminCampaign' => $validated['adminCampaign'] ?? '',
                'userCampaign' => $validated['userCampaign'] ?? '',
                'fields' => []
            ];

            foreach ($fieldLabels as $index => $label) {
                $label = trim($label);
                $type = $fieldTypes[$index];

                if (!empty($label) && !empty($type)) {
                    $field = [
                        'label' => $label,
                        'type' => $type,
                        'required' => isset($validated['field_required'][$index]) &&
                            in_array('true', (array)$validated['field_required']),
                        'order' => isset($validated['field_order'][$index]) ?
                            intval($validated['field_order'][$index]) : ($index + 1)
                    ];

                    if (in_array($type, ['select', 'radio', 'checkbox'])) {
                        $options = $validated['field_options'][$index] ?? '';
                        if (!empty($options)) {
                            $optionArray = explode(',', $options);
                            $field['options'] = array_map('trim', array_filter($optionArray, function ($opt) {
                                return !empty(trim($opt));
                            }));
                        }
                    }

                    $formData['fields'][] = $field;
                }
            }

            if (empty($formData['fields'])) {
                throw ValidationException::withMessages([
                    'field_label' => ['At least one valid field is required']
                ]);
            }
            $apiService = new ApiService();
            $response = $apiService->makeRequest('PATCH', "https://leads.wizards.co.in/api/v1/form/{$formId}", $formData);            
            if ($response['success']) {               
                Log::info('API Update Response:', $response);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Form updated successfully!',
                    'api_response' => $response['data']
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => $response['error'] ?? 'Failed to update form'
                ], 400);
            }            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation Error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Server Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Request $request, $formId)
    {
        try {
            $apiService = new ApiService();
            $response = $apiService->makeRequest('DELETE', "https://leads.wizards.co.in/api/v1/form/{$formId}");
            if ($response['success']) {
                Log::info('Form deleted successfully:', ['form_id' => $formId]);
                if ($request->ajax()) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Form deleted successfully!',
                        'api_response' => $response['data']
                    ]);
                }                
                return redirect()->back()->with('success', 'Form deleted successfully!');                
            } else {
                Log::error('Failed to delete form:', [
                    'form_id' => $formId,
                    'error' => $response['error'] ?? 'Unknown error'
                ]);                
                if ($request->ajax()) {
                    return response()->json([
                        'status' => 'error',
                        'message' => $response['error'] ?? 'Failed to delete form'
                    ], 400);
                }                
                return redirect()->back()->with('error', $response['error'] ?? 'Failed to delete form');
            }
            
        } catch (\Exception $e) {
            Log::error('Exception while deleting form:', [
                'form_id' => $formId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Server Error: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Server Error: ' . $e->getMessage());
        }
    }

    public function show($formId)
    {
        $apiService = new ApiService();
        $response = $apiService->makeRequest('GET', "https://leads.wizards.co.in/api/v1/form/{$formId}");
        
        Log::info( "Forms data fetched successfully" . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) );
        if ($response['success']) {
            $form = $response['data'];
            return view('backend.pages.manage-lead.form.show', compact('form'));
        } else {
            return redirect()->back()->with('error', 'Failed to retrieve form details');
        }
    }


}