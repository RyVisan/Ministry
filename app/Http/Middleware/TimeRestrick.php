<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeRestrick
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
        $start = Carbon::parse('08:00:00');
        $end = Carbon::parse('24:00:00');
        if (now() < $start || now() > $end){
            if (session()->has('Logged')){
                session()->pull('Logged');
                return redirect('user/login')->with('fail','សូមអធ្យាស្រ័យប្រព័ន្ធអនុញ្ញាតឱ្យប្រើប្រាស់បានតែត្រឹមម៉ោង ៨:០០ នាទីព្រឹក ដល់ ៥:០០ នាទីល្ងាច តែប៉ុណ្ណោះ');
            }
        }
        return $next($request);
    }
}
