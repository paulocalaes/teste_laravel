<?php

namespace estoque\Http\Middleware;

use Closure;

class AutorizacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->is('login') && \Auth::guest()) { //poderia colocar aqui alguma verificacao de banco de dados acrescentar a classe no arquivo kernel em  app/http
            return redirect('/login');
        }
        return $next($request);
    }
}
