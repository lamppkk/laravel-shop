<?php

namespace App\Http\Middleware\User;

use Closure;

class notConfirmed
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $user = $request->user();
    if($user->confirmed()) {
      return redirect('/panel');
    }
    return $next($request);
  }
}
