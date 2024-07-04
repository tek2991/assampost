<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XSS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (env('APP_ENV') === 'production') {
            header("Cache: no-cache");
            header('Content-type: text/html; charset=UTF-8');
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('X-FRAME-OPTIONS: DENY');
            header('X-XSS-Protection: 1; mode=block'); // good idea
            header( 'Strict-Transport-Security: max-age=31536000; includeSubDomains; preload' );
            $userInput = $request->all();
            array_walk_recursive($userInput, function (&$userInput) {
            $userInput = strip_tags($userInput);
            });
            $request->merge($userInput);
            $allowed_host = array('assampost.gov.in','www.assampost.gov.in');
            if (!isset($_SERVER['HTTP_HOST']) || !in_array($_SERVER['HTTP_HOST'], $allowed_host))
            {
                header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request');
                exit();
            }
            return $next($request);
        }

        return $next($request);
    }
}
