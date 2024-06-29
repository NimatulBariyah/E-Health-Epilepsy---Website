<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        
        // Auth::logout();
        if(Auth::user()) {       
            View::share('user', Auth::user());
        }
    }

    public function dashboard()
    {
        
        // dd(Auth::user()->notifications);
        return view('dashboard');
    }

    public function markAllAsRead()
    {
        foreach(Auth::user()->notifications as $notif) {
            $notif->markAsRead();
        }

        return redirect(url()->previous());
    }
}
