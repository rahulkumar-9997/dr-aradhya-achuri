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
                $menuServices = Service::orderBy('sort_order', 'asc')->get();
                $view->with('menuServices', $menuServices);
            }

            if ($view->getName() === 'frontend.layouts.footer') {
                $footerServices = Service::inRandomOrder()
                    ->limit(6)
                    ->get();
                $view->with('footerServices', $footerServices);
            }
        });
    }
}
