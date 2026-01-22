<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Services\ApiService;
use Illuminate\Support\Facades\Log;

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
        $response = $apiService->makeRequest('GET', "https://leads.wizards.co.in/api/v1/form/{$formId}");        
        Log::info("Forms data fetched successfully" . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        if (!$response['success']) {
            return response()->json([
                'status' => 'error',
                'message' => 'Form not found or could not be loaded'
            ], 404);
        }
        
        $formData = $response['data']['form'] ?? $response['data'];
        $formHtml = $this->generateResponseFormHtml($formData);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Form created successfully',
            'form' => $formHtml,
        ]);
    }

    /* Generate Bootstrap HTML for response form */
    private function generateResponseFormHtml($formData)
    {
        $fieldsHtml = '';
        $nextActionsHtml = '';        
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
            foreach ($formData['nextActions'] as $nextAction) {
                $nextActionsHtml .= $this->generateNextActionHtml($nextAction);
            }
        }
        
        return '
        <div class="modal-body">
            <form method="POST" action="' . route('manage-lead.responses.store') . '" accept-charset="UTF-8" id="addLeadForm" enctype="multipart/form-data">
                ' . csrf_field() . '
                <input type="hidden" name="formId" value="' . ($formData['id'] ?? '') . '">
                <input type="hidden" name="form_title" value="' . $formData['title'] . '">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title mb-2">' .$formData['title'] . '</h4>
                        ' . (!empty($formData['description']) ? '<p class="card-text text-muted">' . $formData['description'] . '</p>' : '') . '
                    </div>
                </div>
                <div class="form-fields-container">
                    ' . $fieldsHtml . '
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
                            <label for="' . $fieldId . '" class="form-label">
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
                            <label for="' . $fieldId . '" class="form-label">
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
                            <label for="' . $fieldId . '" class="form-label">
                                ' . htmlspecialchars($field['label'] ?? 'Field ' . ($index + 1)) . $requiredStar . '
                            </label>
                            <select class="form-select" 
                                    id="' . $fieldId . '" 
                                    name="field[' . ($field['id'] ?? '') . ']" 
                                    ' . $requiredAttr . '>
                                ' . $optionsHtml . '
                            </select>
                            <div class="invalid-feedback">Please select a ' . htmlspecialchars($field['label'] ?? 'value') . '</div>
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
                            <label class="form-label d-block">
                                ' . htmlspecialchars($field['label'] ?? 'Field ' . ($index + 1)) . $requiredStar . '
                            </label>
                            <div class="ps-2">
                                ' . $radioOptions . '
                            </div>
                            <div class="invalid-feedback d-block">Please select a ' . htmlspecialchars($field['label'] ?? 'value') . '</div>
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
                            <label class="form-label d-block">
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
                            <label for="' . $fieldId . '" class="form-label">
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
                            <label for="' . $fieldId . '" class="form-label">
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

}
