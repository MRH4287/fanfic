<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class OwnerMiddleware{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type){
        var_dump($type);
        if($type == 'username'){
            if(!$request->user()->isOwner($request->input('username'))){
                return redirect('/home');
            }elseif(User::where('username', '=', $request->input('username'))->count() == 0){
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
