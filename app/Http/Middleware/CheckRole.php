<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $typeuser=0)
    {
        $user = DB::table('users')->where('id', auth()->id)->first();
        if(!empty($user->typeuser)&&($user->typeuser===intval($typeuser)||$user->typeuser==1)) {
            return $next($request);
        } else {
            return redirect()->route('index.home');
        }
    }
}
