<?php namespace Bantenprov\Staf\Http\Middleware;

use Closure;

/**
 * The StafMiddleware class.
 *
 * @package Bantenprov\Staf
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StafMiddleware
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
        return $next($request);
    }
}
