<?php

namespace App\Http\Middleware;

use Closure;

class Password
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

      if($request->file->password === null || $request->session()->has('logged') === true) {

        return $next($request);

      }

      return redirect("/file/{$request->file->name}/#modal-check-password");

    }
}
