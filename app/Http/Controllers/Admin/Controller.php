<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;


class Controller extends BaseController
{
    use AuthorizesRequests,DispatchesJobs, ValidatesRequests;

    public $breadcrumbs, $pageTitle, $pageHeading, $orderNotify;

    public function __construct()
    {
//        $this->orderNotify = Order::where('is_seen', 1)->get()->count();
        View::composer('*', function($view)
        {
            $view->with([
                'breadcrumbs' => $this->breadcrumbs,
                'pageTitle' => $this->pageTitle,
                'pageHeading' => $this->pageHeading,
                'locales' => config('app.locales'),
//                'orderNotify' => $this->orderNotify,
//                'role' => session()->get('ADMIN')['role'],
            ]);
        });
    }
}
