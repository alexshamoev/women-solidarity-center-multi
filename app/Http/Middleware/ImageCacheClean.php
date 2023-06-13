<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ImageCacheClean
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
        $skipUrl = array(route('joinedExport'), route('subscribeExport'));

        $response = $next($request);

        if ($response->getStatusCode() == 200 && !in_array($request->url(), $skipUrl) ) {

            $content = $response->getContent();
            
            $content = preg_replace('/(src="[^"]+\/storage\/images\/[^"]+\.(jpe?g|png)\/?[^"]*)"/', '$1?' . time() . '"', $content);

            $response->setContent($content);
        }

        return $response;
    }
}