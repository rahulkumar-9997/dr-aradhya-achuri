<?php
// app/Providers/ViewServiceProvider.php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Service;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer(['frontend.layouts.header-menu', 'frontend.layouts.footer'], function ($view) {
            if ($view->getName() === 'frontend.layouts.header-menu') {
                $menuServices = cache()->remember('menu_services', 3600, function () {
                    return Service::orderBy('title')
                        ->get();
                });
                
                $view->with('menuServices', $menuServices);
            }

            if ($view->getName() === 'frontend.layouts.footer') {
                $footerServices = cache()->remember('footer_services', 3600, function () {
                    return Service::inRandomOrder()
                        ->limit(6)
                        ->get();
                });

                $view->with('footerServices', $footerServices);
            }
        });
    }
}
