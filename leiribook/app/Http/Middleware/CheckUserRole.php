<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        /*if ((auth)->user()->isAdmin()){
            return ... } throw new AccessDeniedHttpException('Acesso não autorizado!')*/
        if (Auth::check() && Auth::user()->role != 'A') {
            return redirect('/');
        }

        return $next($request);

        /*depois de fazer isso registar o ficheiro no app/kernel.php*/
    }
}
