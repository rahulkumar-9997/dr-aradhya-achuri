<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Services\ApiService;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class LeadFormResponseController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $formId = $request->input('formId') ?? null;
        Log::info('Creating new lead form response for form ID: ' . $formId);
        
        $apiService = new ApiService();
        $response = $apiService->makeRequest('GET', "https://leads.wizards.co.in/api/v1/form/{$formId}/internal");        
        Log::info("Forms data fetched successfully" . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        if (!$response['success']) {
            return response()->json([
                'status' => 'error',
                'message' => 'Form not found or could not be loaded'
            ], 404);
        }
        
        $formData = $response['data']['form'] ?? $response['data'];
        $onlyData = $response['data'] ?? [];
        $formHtml = $this->generateResponseFormHtml($formData, $onlyData);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Form created successfully',
            'form' => $formHtml,
        ]);
    }

    /* Generate Bootstrap HTML for response form */
    private function generateResponseFormHtml($formData, $onlyData)
    {
        $fieldsHtml = '';
        $nextActionsHtml = '';        
        $usersHtml = '';        
        if (!empty($formData['fields'])) {
            $fields = $formData['fields'];
            usort($fields, function($a, $b) {
                return ($a['order'] ?? 999) <=> ($b['order'] ?? 999);
            });
            
            foreach ($fields as $index => $field) {
                $fieldsHtml .= $this->generateResponseFieldHtml($field, $index);
            }            
        }

        if (!empty($formData['nextActions'])) {
            Log::info('Generating next actions HTML for form ID: ' . ($formData['id'] ?? 'unknown'));
            $nextActionsHtml = $this->generateNextActionsHtml($formData['nextActions'], count($formData['fields'] ?? []));
        }

        if (!empty($onlyData['users'])) {
            Log::info('Generating users HTML for form ID: ' . ($formData['id'] ?? 'unknown'));
            $usersHtml = $this->generateUsersHtml($onlyData['users'], count($formData['fields'] ?? []));
        }
        
        return '
        <div class="modal-body">
            <form method="POST" action="' . route('manage-lead.responses.store') . '" accept-charset="UTF-8" id="addResponseForm" enctype="multipart/form-data">
                ' . csrf_field() . '
                <input type="hidden" name="formId" value="' . ($formData['id'] ?? '') . '">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title mb-2">' .$formData['title'] . '</h4>
                        ' . (!empty($formData['description']) ? '<p class="card-text text-muted">' . $formData['description'] . '</p>' : '') . '
                    </div>
                </div>
                <div class="form-fields-container">
                    ' . $fieldsHtml . '
                    ' . $nextActionsHtml . '
                    ' . $usersHtml . '
                </div>
                <div class="row"> 
                    <div class="modal-footer pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="ti ti-refresh me-1"></i> Close Form
                        </button>
                        <button type="submit" class="btn btn-primary">
                        <i class="ti ti-send me-1"></i>
                         Submit Response
                        </button>
                    </div>
                </div>                
            </form>
        </div>';
    }

    private function generateResponseFieldHtml($field, $index)
    {
        $requiredAttr = ($field['required'] ?? false) ? 'required' : '';
        $requiredStar = ($field['required'] ?? false) ? ' <span class="text-danger">*</span>' : '';
        $fieldId = 'field_' . ($field['id'] ?? $index);
        $options = [];
        if (!empty($field['options'])) {
            if (is_string($field['options'])) {
                $decoded = json_decode($field['options'], true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    $options = $decoded;
                }
            } elseif (is_array($field['options'])) {
                $options = $field['options'];
            }
        }
        
        $fieldHtml = '';
        $fieldType = $field['type'] ?? 'text';        
        switch ($fieldType) {
            case 'text':
            case 'email':
            case 'number':
            case 'date':
                $fieldHtml = '
                <div class="card mb-3 animate__animated animate__fadeInUp" style="animation-delay: ' . ($index * 0.1) . 's">
                    <div class="card-body p-2">
                        <div class="mb-3">
                            <label for="' . $fieldId . '" class="form-label fw-bold">
                                ' . htmlspecialchars($field['label'] ?? 'Field ' . ($index + 1)) . $requiredStar . '
                            </label>
                            <input type="' . $fieldType . '" 
                                class="form-control" 
                                id="' . $fieldId . '" 
                                name="field[' . ($field['id'] ?? '') . ']" 
                                placeholder="Enter ' . htmlspecialchars($field['label'] ?? '') . '" 
                                ' . $requiredAttr . '>
                            <div class="invalid-feedback">Please provide a valid ' . htmlspecialchars($field['label'] ?? 'value') . '</div>
                        </div>
                    </div>
                </div>';
                break;
                
            case 'textarea':
                $fieldHtml = '
                <div class="card mb-3 animate__animated animate__fadeInUp" style="animation-delay: ' . ($index * 0.1) . 's">
                    <div class="card-body p-2">
                        <div class="mb-3">
                            <label for="' . $fieldId . '" class="form-label fw-bold">
                                ' . htmlspecialchars($field['label'] ?? 'Field ' . ($index + 1)) . $requiredStar . '
                            </label>
                            <textarea class="form-control" 
                                    id="' . $fieldId . '" 
                                    name="field[' . ($field['id'] ?? '') . ']" 
                                    rows="3" 
                                    placeholder="Enter ' . htmlspecialchars($field['label'] ?? '') . '" 
                                    ' . $requiredAttr . '></textarea>
                            <div class="invalid-feedback">Please provide a valid ' . htmlspecialchars($field['label'] ?? 'value') . '</div>
                        </div>
                    </div>
                </div>';
                break;
                
            case 'select':
                $optionsHtml = '<option value="">Select ' . htmlspecialchars($field['label'] ?? '') . '</option>';
                foreach ($options as $option) {
                    $optionsHtml .= '<option value="' . htmlspecialchars($option) . '">' . htmlspecialchars($option) . '</option>';
                }
                
                $fieldHtml = '
                <div class="card mb-3 animate__animated animate__fadeInUp" style="animation-delay: ' . ($index * 0.1) . 's">
                    <div class="card-body p-2">
                        <div class="mb-3">
                            <label for="' . $fieldId . '" class="form-label fw-bold">
                                ' . htmlspecialchars($field['label'] ?? 'Field ' . ($index + 1)) . $requiredStar . '
                            </label>
                            <select class="form-select" 
                                    id="' . $fieldId . '" 
                                    name="field[' . ($field['id'] ?? '') . ']" 
                                    ' . $requiredAttr . '>
                                ' . $optionsHtml . '
                            </select>                            
                        </div>
                    </div>
                </div>';
                break;
                
            case 'radio':
                $radioOptions = '';
                foreach ($options as $key => $option) {
                    $radioId = $fieldId . '_' . $key;
                    $radioOptions .= '
                    <div class="form-check mb-2">
                        <input class="form-check-input" 
                            type="radio" 
                            name="field[' . ($field['id'] ?? '') . ']" 
                            id="' . $radioId . '" 
                            value="' . htmlspecialchars($option) . '"
                            ' . $requiredAttr . '>
                        <label class="form-check-label" for="' . $radioId . '">
                            ' . htmlspecialchars($option) . '
                        </label>
                    </div>';
                }
                
                $fieldHtml = '
                <div class="card mb-3 animate__animated animate__fadeInUp" style="animation-delay: ' . ($index * 0.1) . 's">
                    <div class="card-body p-2">
                        <div class="mb-3">
                            <label class="form-label d-block fw-bold">
                                ' . htmlspecialchars($field['label'] ?? 'Field ' . ($index + 1)) . $requiredStar . '
                            </label>
                            <div class="ps-2">
                                ' . $radioOptions . '
                            </div>                            
                        </div>
                    </div>
                </div>';
                break;
                
            case 'checkbox':
                $checkboxOptions = '';
                foreach ($options as $key => $option) {
                    $checkboxId = $fieldId . '_' . $key;
                    $checkboxOptions .= '
                    <div class="form-check mb-2">
                        <input class="form-check-input" 
                            type="checkbox" 
                            id="' . $checkboxId . '" 
                            name="field[' . ($field['id'] ?? '') . '][]" 
                            value="' . htmlspecialchars($option) . '">
                        <label class="form-check-label" for="' . $checkboxId . '">
                            ' . htmlspecialchars($option) . '
                        </label>
                    </div>';
                }
                
                $fieldHtml = '
                <div class="card mb-3 animate__animated animate__fadeInUp" style="animation-delay: ' . ($index * 0.1) . 's">
                    <div class="card-body p-2">
                        <div class="mb-3">
                            <label class="form-label d-block fw-bold">
                                ' . htmlspecialchars($field['label'] ?? 'Field ' . ($index + 1)) . $requiredStar . '
                            </label>
                            <div class="ps-2">
                                ' . $checkboxOptions . '
                            </div>
                        </div>
                    </div>
                </div>';
                break;
                
            case 'file':
                $fieldHtml = '
                <div class="card mb-3 animate__animated animate__fadeInUp" style="animation-delay: ' . ($index * 0.1) . 's">
                    <div class="card-body p-2">
                        <div class="mb-3">
                            <label for="' . $fieldId . '" class="form-label fw-bold">
                                ' . htmlspecialchars($field['label'] ?? 'Field ' . ($index + 1)) . $requiredStar . '
                            </label>
                            <input type="file" 
                                class="form-control" 
                                id="' . $fieldId . '" 
                                name="field[' . ($field['id'] ?? '') . ']" 
                                ' . $requiredAttr . '>
                            <div class="form-text">Allowed file types: pdf, doc, docx, jpg, png, jpeg</div>
                            <div class="invalid-feedback">Please upload a valid file</div>
                        </div>
                    </div>
                </div>';
                break;
                
            default:
                $fieldHtml = '
                <div class="card mb-3 animate__animated animate__fadeInUp" style="animation-delay: ' . ($index * 0.1) . 's">
                    <div class="card-body p-2">
                        <div class="mb-3">
                            <label for="' . $fieldId . '" class="form-label fw-bold">
                                ' . htmlspecialchars($field['label'] ?? 'Field ' . ($index + 1)) . $requiredStar . '
                            </label>
                            <input type="text" 
                                class="form-control" 
                                id="' . $fieldId . '" 
                                name="field[' . ($field['id'] ?? '') . ']" 
                                placeholder="Enter ' . htmlspecialchars($field['label'] ?? '') . '" 
                                ' . $requiredAttr . '>
                            <div class="invalid-feedback">Please provide a valid ' . htmlspecialchars($field['label'] ?? 'value') . '</div>
                        </div>
                    </div>
                </div>';
        }
        
        return $fieldHtml;
    }

    private function generateNextActionsHtml($nextActions, $fieldCount = 0)
    {
        $optionsHtml = '<option value="">Select Next Action</option>';        
        foreach ($nextActions as $action) {
            $optionsHtml .= '
            <option value="' . $action['label'] .'" data-status="' . $action['status'] . '" class="next-action-option">
                ' .$action['label']. ' ('.$action['status'].')
            </option>';
        }        
        $animationDelay = ($fieldCount * 0.1) . 's';        
        return '
        <div class="card mb-3 animate__animated animate__fadeInUp" style="animation-delay: ' . $animationDelay . '">
            <div class="card-body p-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="nextAction" class="form-label fw-bold">
                                Next Action
                            </label>
                            <select class="form-select form-select-lg" 
                                    id="nextAction" 
                                    name="nextAction">
                                ' . $optionsHtml . '
                            </select>
                            <div class="invalid-feedback">Please select a next action</div>
                            <div class="form-text">Select what should be done next with this lead</div>
                        </div> 
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="nextFollowUpDate" class="form-label fw-bold">
                                Next Follow-up Date
                            </label>
                            <input type="date" 
                                class="form-control form-control datepicker datepicker-single" 
                                id="nextFollowUpDate" 
                                name="nextFollowUpDate" 
                                >
                            <div class="invalid-feedback">Please provide a valid follow-up date</div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>';
    }

    private function generateUsersHtml($users, $fieldCount = 0)
    {
        $optionsHtml = '<option value="">Select User</option>';        
        foreach ($users as $user) {
            $optionsHtml .= '
            <option value="' . $user['id'] .'">
                ' .$user['name']. ' ('.$user['email'].')
            </option>';
        }        
        $animationDelay = ($fieldCount * 0.1) . 's';        
        return '
        <div class="card mb-3 animate__animated animate__fadeInUp" style="animation-delay: ' . $animationDelay . '">
            <div class="card-body p-2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="selectedUserId" class="form-label fw-bold">
                                Assign To User
                            </label>
                            <select class="form-select form-select select2" multiple="multiple" 
                                    id="selectedUserId" 
                                    name="selectedUserId[]">
                                ' . $optionsHtml . '
                            </select>
                            <div class="invalid-feedback">Please select a user to assign</div>
                            <div class="form-text">Select the user to whom this lead should be assigned</div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>';
    } 
    
    public function store(Request $request)
    {
        try {
            $formId = $request->input('formId');        
            $token = $request->input('_token');
            if (!$formId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Form ID is required'
                ], 400);
            }
            $formFields = [];
            if ($request->has('field') && is_array($request->input('field'))) {
                $formFields = $request->input('field');
            } 
            else {
                $formFields = $request->input('field', []);
            }
            $leadData = array_merge(
                $formFields,
                [
                    'nextAction' => $request->input('nextAction'),
                    'nextFollowUpDate' => $request->input('nextFollowUpDate'),
                    'selectedUserId' => $request->input('selectedUserId', [])
                ]
            );
            unset($leadData['_token']);
            unset($leadData['formId']);
            
            Log::info('Processed data for API (form ID: ' . $formId . '): ' . json_encode($leadData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $client = new Client();
            $response = $client->request('POST', "https://leads.wizards.co.in/api/v1/form/{$formId}/response/internal", [
                'headers' => [
                    'Authorization' => 'Bearer ' . config('services.api.token'),
                    'Accept' => 'application/json',
                ],
                'form_params' => $leadData,
                'timeout' => 30,
            ]);            
            $responseBody = $response->getBody()->getContents();
            $decodedResponse = json_decode($responseBody, true);            
            Log::info("API Response: " . json_encode($decodedResponse, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));            
            return response()->json([
                'status' => true,
                'message' => 'Response submitted successfully!',
                'data' => $decodedResponse ?? []
            ]);            
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBody = $response->getBody()->getContents();
            $decodedError = json_decode($responseBody, true);            
            Log::error("API Client Error: " . $e->getMessage());
            Log::error("API Error Response: " . $responseBody);            
            return response()->json([
                'status' => false,
                'message' => $decodedError['error'] ?? 'Error submitting form response',
                'errors' => $decodedError['errors'] ?? []
            ], 400);
            
        } catch (\Exception $e) {
            Log::error("Form submission error: " . $e->getMessage());
            Log::error($e->getTraceAsString());
            
            return response()->json([
                'status' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {  
        $formId = $id;
        $apiService = new ApiService();
        $response = $apiService->makeRequest('GET', "https://leads.wizards.co.in/api/v1/form/{$formId}/response");        
        Log::info("Forms response data fetched successfully" . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        if (!$response['success']) {
            return redirect()->back()->with('error', 'Form responses not found');
        }        
        return view('backend.pages.manage-lead.form-response.show', compact('response', 'formId'));
    }

}
