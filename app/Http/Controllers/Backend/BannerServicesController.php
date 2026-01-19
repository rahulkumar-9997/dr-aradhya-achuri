<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\BannerService;
use App\Models\BannerServicesLink;
use App\Models\Service;

class BannerServicesController extends Controller
{
    public function index()
    {
        $bannerServices = BannerService::with(['serviceLinks.service'])->latest()->paginate(20);
        return view('backend.pages.banner-services.index', compact('bannerServices'));
    }
    public function create()
    {
        $services = Service::orderBy('title', 'asc')->get();
        return view('backend.pages.banner-services.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'services_multiple' => 'nullable|array',
            'services_multiple.*' => 'exists:services,id',
        ], [
            'title.required' => 'The title field is required.',
            'services_multiple.*.exists' => 'One or more selected services are invalid.',
        ]);
        DB::beginTransaction();        
        try {
            $bannerService = BannerService::create([
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'short_detail' => $request->short_description,
                'long_detail' => $request->content,
            ]);
            if ($request->has('services_multiple') && !empty($request->services_multiple)) {
                $links = [];
                foreach ($request->services_multiple as $serviceId) {
                    $links[] = [
                        'banner_services_id' => $bannerService->id,
                        'services_id' => $serviceId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }                
                if (!empty($links)) {
                    BannerServicesLink::insert($links);
                }
            }
            DB::commit();
            return redirect()->route('banner-services.index')
                ->with('success', 'Banner service created successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Banner Service Creation Error: ' . $e->getMessage());
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $bannerService = BannerService::with(['serviceLinks'])->findOrFail($id);            
        $services = Service::select('id', 'title')->orderBy('title')->get();
        $selectedServices = $bannerService->serviceLinks->pluck('services_id')->toArray();        
        return view('backend.pages.banner-services.edit', compact('bannerService', 'services', 'selectedServices'));
    }

    public function update(Request $request, $id)
    {
        $bannerService = BannerService::findOrFail($id);
        $validator = $request->validate([
            'title' => 'required|string|max:255|unique:banner_services,title,' . $id,
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'services_multiple' => 'nullable|array',
            'services_multiple.*' => 'exists:services,id',
        ], [
            'title.required' => 'The title field is required.',
            'title.unique' => 'This title already exists.',
            'services_multiple.*.exists' => 'One or more selected services are invalid.',
        ]);
        DB::beginTransaction();        
        try {           
            $bannerService->update([
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'short_detail' => $request->short_description,
                'long_detail' => $request->content,
            ]);
            $bannerService->serviceLinks()->delete();            
            if ($request->has('services_multiple') && !empty($request->services_multiple)) {
                $links = [];
                foreach ($request->services_multiple as $serviceId) {
                    $links[] = [
                        'banner_services_id' => $bannerService->id,
                        'services_id' => $serviceId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }                
                if (!empty($links)) {
                    BannerServicesLink::insert($links);
                }
            }

            DB::commit();
            return redirect()->route('banner-services.index')->with('success', 'Banner service updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Banner Service Update Error: ' . $e->getMessage());            
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    
    public function destroy($id)
    {
        $bannerService = BannerService::findOrFail($id);        
        DB::beginTransaction();        
        try {
            $bannerService->serviceLinks()->delete();
            $bannerService->delete();            
            DB::commit();            
            return redirect()->route('banner-services.index')->with('success', 'Banner service deleted successfully!');                
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Banner Service Deletion Error: ' . $e->getMessage());            
            return back()->with('error', 'An error occurred while deleting the banner service. Please try again.');
        }
    }


}
