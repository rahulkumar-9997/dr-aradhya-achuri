<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Services\ApiService;

class LeadController extends Controller
{
    public function index()
    {
        return view('backend.pages.manage-lead.dashboard.index');
    }

    public function create(Request $request)
    {
        $form = '
        <div class="modal-body">
            <form method="POST" action="' . route('form.store') . '" accept-charset="UTF-8" id="addLeadForm" enctype="multipart/form-data">
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

            // $apiUrl = 'https://leads.wizards.co.in/api/v1/form';
            // $bearerToken = 'leads_wizards_9fc3b94b8ba5f69794461e3a694478181d5ba668b14b557b68f63152bcafd60d';
            // $client = new \GuzzleHttp\Client();
            // $response = $client->post($apiUrl, [
            //     'headers' => [
            //         'Authorization' => 'Bearer ' . $bearerToken,
            //         'Accept' => 'application/json',
            //         'Content-Type' => 'application/json',
            //     ],
            //     'json' => $formData,
            //     'timeout' => 30,
            //     'connect_timeout' => 10,
            // ]);           
            // $apiResponse = json_decode($response->getBody()->getContents(), true);
            if ($response['success']) {
                // $formsListHtml = view('backend.forms.partials.forms-list', compact('forms'))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Form created successfully!',
                    'api_response' => $response['data']
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'API Error: ' . ($apiResponse['message'] ?? 'Unknown error')
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
}
