<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\ServicesCategory;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::with(['serviceCategory'])
        ->orderBy('sort_order', 'asc') 
        ->paginate(50);
        return view('backend.pages.services.index', compact('services'));
    }

    public function create(){
        $servicesCategory = ServicesCategory::get();
        return view('backend.pages.services.create', compact('servicesCategory'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'services_category_id' => 'required|exists:services_categories,id',
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string',
            'short_description' => 'nullable|string',
            'content' => 'required|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'details_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'icon_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'breadcrumb_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $destinationPath = public_path('upload/services');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        DB::beginTransaction();
        try {
            $mainImageName = $this->processImageUpload($request->file('main_image'), $validatedData['title'], $destinationPath);
            $iconImageName = $this->processImageUpload($request->file('icon_image'), $validatedData['title'], $destinationPath);
            $detailsImageName = null;
            if ($request->hasFile('details_image')) {
                $detailsImageName = $this->processImageUpload($request->file('details_image'), $validatedData['title'], $destinationPath);
            }
            $breadcrumbImageName = null;
            if ($request->hasFile('breadcrumb_image')) {
                $breadcrumbImageName = $this->processImageUpload($request->file('breadcrumb_image'), $validatedData['title'], $destinationPath);
            }
            $service = Service::create([
                'services_category_id' => $validatedData['services_category_id'],
                'title' => $validatedData['title'],
                'subtitle' => $validatedData['sub_title'],
                'short_content' => $validatedData['short_description'] ?? null,
                'content' => $validatedData['content'],
                'main_image' => $mainImageName,
                'icon_image' => $iconImageName,
                'details_image' => $detailsImageName,
                'breadcrumb_image' => $breadcrumbImageName,
            ]);
            DB::commit();            
            return redirect()->route('manage-services.index')->with('success', 'Service created successfully.');                
        } catch (\Exception $e) {
            DB::rollBack();
            $this->cleanupUploadedFiles($destinationPath, [
                $mainImageName ?? null,
                $iconImageName ?? null,
                $detailsImageName ?? null,
                $breadcrumbImageName ?? null
            ]);            
            return back()->withInput()->with('error', 'Error creating service: ' . $e->getMessage());
        }
    }
    /**
     * Process image upload without resizing (only convert to WebP)
     */
    private function processImageUpload($image, $title, $destinationPath, $quality = 80)
    {
        if (!$image) return null;        
        $titleSlug = Str::slug($title);
        $imageName = $titleSlug . '-' . uniqid() . '.webp';
        $imagePath = $destinationPath . '/' . $imageName;
        Image::make($image->getRealPath())
            ->encode('webp', $quality)
            ->save($imagePath);        
        return $imageName;
    }

    private function cleanupUploadedFiles($directory, $fileNames)
    {
        foreach ($fileNames as $fileName) {
            if ($fileName) {
                $filePath = $directory . '/' . $fileName;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }
    }

    public function edit($id){
        $service = Service::with('serviceCategory')->findOrFail($id);
        $categories = ServicesCategory::all();        
        return view('backend.pages.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, $id){
        $service = Service::findOrFail($id);        
        $validatedData = $request->validate([
            'services_category_id' => 'required|exists:services_categories,id',
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string',
            'short_description' => 'nullable|string',
            'content' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'details_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'breadcrumb_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $destinationPath = public_path('upload/services');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        DB::beginTransaction();
        try {
            $data = [
                'services_category_id' => $validatedData['services_category_id'],
                'title' => $validatedData['title'],
                'subtitle' => $validatedData['sub_title'],
                'short_content' => $validatedData['short_description'] ?? null,
                'content' => $validatedData['content'],
            ];
            $imageFields = [
                'main_image',
                'icon_image',
                'details_image',
                'breadcrumb_image'
            ];
            foreach ($imageFields as $field) {
                if ($request->hasFile($field)) {
                    if ($service->$field) {
                        $oldImagePath = $destinationPath . '/' . $service->$field;
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }
                    $data[$field] = $this->processImageUpload(
                        $request->file($field), 
                        $validatedData['title'], 
                        $destinationPath
                    );
                }
            }

            $service->update($data);
            DB::commit();            
            return redirect()->route('manage-services.index')->with('success', 'Service updated successfully.');                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Error updating service: ' . $e->getMessage());
        }
    }
    
    public function destroy($id){
        $service = Service::findOrFail($id);        
        DB::beginTransaction();
        try {
            $destinationPath = public_path('upload/services');
            $imagesToDelete = [
                $service->main_image,
                $service->icon_image,
                $service->details_image,
                $service->breadcrumb_image
            ];
            $service->delete();
            foreach ($imagesToDelete as $image) {
                if ($image) {
                    $imagePath = $destinationPath . '/' . $image;
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }            
            DB::commit();            
            return redirect()->route('manage-services.index')->with('success', 'Service deleted successfully.');                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error deleting service: ' . $e->getMessage());
        }
    }

    public function reorder(Request $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'order' => 'required|array',
                'order.*' => 'integer|exists:services,id'
            ]);

            foreach ($validated['order'] as $index => $id) {
                Service::where('id', $id)->update(['sort_order' => $index + 1]);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Service order updated successfully'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Validation error: ' . $e->getMessage()
            ], 422);
        } 
    }

}
