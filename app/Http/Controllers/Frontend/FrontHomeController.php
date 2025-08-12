<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnquiryMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Gallery;

class FrontHomeController extends Controller
{
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

    public function contactSubmitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:10',
            'message' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();
        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message'] ?? null,
        ];
        try {
            Mail::to('rahulkumarmaurya464@gmail.com')->send(new EnquiryMail($data));
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

    
}
