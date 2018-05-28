<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use App\User;


class AdminCheck
{

    /**Illuminate\Http\Request  $request
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


//        if (auth()->user()->type_id != 1) {
//            return redirect()->to('/');
//        }
//
//        return $next($request);
//
//
//    }


        session(['current_url'=>$request->url()]);

        if($request->user()===null){
            return redirect('error/401');

        }
	
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if($request->user()->hasAnyRole($roles)||!$roles) {
            return $next($request);
        }
        return redirect('error/401');//response("Insufficient Permissions",401);//view('errors.401');
    }


}
