<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Models\Blog;
use App\Models\Service;
use App\Models\BannerService;
use Carbon\Carbon;
class SiteMapController extends Controller
{
    public function index()
    {
        $urls = [];

        /* ------------------
         | Static pages
         ------------------*/
        $staticRoutes = [
            route('home'),
            route('about-us'),
            route('services'),
            route('contact-us'),
            route('blog'),
        ];

        foreach ($staticRoutes as $url) {
            $urls[] = [
                'loc' => $url,
                'lastmod' => Carbon::now()->toDateString(),
                'priority' => '0.8'
            ];
        }

        /* ------------------
         | Blogs
         ------------------*/
        Blog::get()->each(function ($blog) use (&$urls) {
            $urls[] = [
                'loc' => route('blog.details', $blog->slug),
                'lastmod' => optional($blog->updated_at)->toDateString(),
                'priority' => '0.7'
            ];
        });

        /* ------------------
         | Service
         ------------------*/
        Service::get()->each(function ($services) use (&$urls) {
            $urls[] = [
                'loc' => route('services.details', $services->slug),
                'lastmod' => optional($services->updated_at)->toDateString(),
                'priority' => '0.7'
            ];
        });
        
        /* ------------------
         | Banner Service
         ------------------*/
        BannerService::whereNotNull('slug')
            ->where('slug', '!=', '')
            ->whereHas('serviceLinks')
            ->select('id', 'slug', 'updated_at')
            ->each(function ($bannerService) use (&$urls) {

                $urls[] = [
                    'loc' => route('banner.service', $bannerService->slug),
                    'lastmod' => optional($bannerService->updated_at)->toDateString(),
                    'priority' => '0.7',
                ];
            });

        return response()
            ->view('frontend.sitemap.xml', compact('urls'))
            ->header('Content-Type', 'application/xml');
    }
}
