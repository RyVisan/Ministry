<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('Logged') && $request->path() !='user/login'){
            return redirect('user/login')->with('fail', 'អ្នកត្រូវតែបំពេញព័ត៌មានមុនចូលទៅប្រើប្រាស់');
        }
        if (session()->has('Logged') && ($request->path() =='user/login')){
            return back();
        }
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                            ->header('Pragma','no-cache')
                            ->header('Expires','Mon, 12 Jun 2020 07:28:00 GMT');
    }
}
