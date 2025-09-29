<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnquiryMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\Service;

class FrontHomeController extends Controller
{
    public function resizeImage(Request $request, $folder, $image)
    {
        $imagePath = public_path("upload/{$folder}/{$image}");
        if (!file_exists($imagePath)) {
            abort(404);
        }
        $width = $request->get('w', null);
        $height = $request->get('h', null);
        $quality = $request->get('q', 85);
        if (!$width && !$height) {
            return response()->file($imagePath);
        }
        $img = Image::make($imagePath);
        if ($width && $height) {
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        } elseif ($width) {
            $img->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        } elseif ($height) {
            $img->resize(null, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        $img->encode('webp', $quality);
        return $img->response('webp');
    }

    public function home(){
        
        $data['blog'] = Blog::where('status', 'Published')->orderBy('created_at', 'desc')
        ->inRandomOrder()
        ->limit(6)
        ->get();
        $data['testimonials'] = Testimonial::where('status', 1)->orderBy('created_at', 'desc')
        ->inRandomOrder()
        ->limit(20)
        ->get();
        $data['galleryList'] = Gallery::where('status', 1)
        ->inRandomOrder()
        ->limit(30)
        ->get();
        //return response()->json($data['blog']);
        return view('frontend.index', compact('data'));
    }

    public function aboutUs(){
        return view('frontend.pages.about-us.index');
    }

    public function servicesList(){
        $servicesList = Service::with('serviceCategory')
            ->orderBy('id', 'asc')
            ->paginate(30)
            ->groupBy(function($item) {
                return $item->serviceCategory->title;
            });
        //return response()->json($servicesList);
        return view('frontend.pages.services.sevices-list', compact('servicesList'));
    }

    public function servicesDetails($slug){
        $services = Service::with(['serviceCategory'])
                ->where('slug', $slug)
                ->firstOrFail();
        $servicesList = Service::inRandomOrder()
                ->get();
        return view('frontend.pages.services.services-details', compact('services', 'servicesList'));
    }

    
    public function blogList(){
        $blogs = Blog::orderBy('id', 'desc')->where('status', 'published')->paginate(30);
        return view('frontend.pages.blog.blog-list', compact('blogs'));
    }

    public function blogDetails($slug){
        $blog = Blog::with(['images', 'paragraphs'])
                ->where('slug', $slug)
                ->firstOrFail();
        $blogList = Blog::where('status', 'Published')
                ->where('id', '!=', $blog->id)
                ->orderBy('created_at', 'desc')
                ->inRandomOrder()
                ->limit(10)
                ->get();
        //return response()->json($blog);
        return view('frontend.pages.blog.blog-details', compact('blog', 'blogList'));
    }

    public function contactUs(){
        return view('frontend.pages.contact-us.index');
    }

    public function EnquirySubmitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'required|regex:/^[6-9][0-9]{9}$/',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        if ($request->filled('hp_name')) {
            return response()->json(['status'=>'error'], 422);
        }

        $validated = $validator->validated();
        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone_number'] ?? null,
            'service' => $validated['service'] ?? null,
            'message' => $validated['message'] ?? null,
        ];
        try {
            Mail::to('akshat@gdsons.co.in')->send(new EnquiryMail($data));
            // Mail::to('info.draradhyaachuri@gmail.com')->send(new EnquiryMail($data));
        } catch (\Exception $e) {
            Log::error('Failed to send enquiry email: ' . $e->getMessage());
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Your enquiry form submitted successfully. Our team will contact you soon.',
        ]);
    }

    public function AjaxTestimonials(Request $request, $id){
        $testimonial = Testimonial::findOrFail($id);        
        $imageColumn = '';
        $contentColumnClass = 'col-lg-12';         
        if ($testimonial->image) {
            $imageColumn = '
            <div class="col-md-5 text-center mb-3 mb-md-0">
                <img src="' . asset('upload/testimonials/' . $testimonial->image) . '" 
                    class="img-fluid rounded" 
                    alt="' . $testimonial->title . '">
            </div>';
            
            $contentColumnClass = 'col-md-7';
        }
        
        $modalContent = '
        <div class="modal-body">
            <div class="row align-items-center">'
                . $imageColumn . '
                <div class="' . $contentColumnClass . '">                        
                    <div class="testimonial-content mb-3">
                        <p>' . $testimonial->content . '</p>
                    </div>
                </div>
            </div>
        </div>';

        return response()->json([
            'status' => 'success',
            'modalContent' => $modalContent,
        ]);
    }

    public function faq(){
         return view('frontend.pages.faq.index');
    }
    
}
