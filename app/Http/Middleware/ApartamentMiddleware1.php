<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApartamentMiddleware1
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
        $validated = Validator::make($request->all(), ([
            'address' => 'required|String|max:100',
            'city' => 'required|String',
            //'Continent' => [new Enum(ServerStatus::class)],
            'postal_code' => 'required|String|size:5',
            'rent_price' => 'nullable|numeric',
            'rented' => 'required|Boolean'
        ]));

        if ($validated->fails()) {
            return response()->json([
                'error' => "No has introduït el tipus correctes en els camps, revisa'ls"
            ]);
        } else {
            return $next($request);
        }
        //return $next($request);
    }
}
