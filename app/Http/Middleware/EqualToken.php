<?php

namespace App\Http\Middleware;

use App\Models\Apartament;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EqualToken
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
        $compara  =  Apartament::where('id', $request->segment(3))->get();
        //return response($compara[0]->user_id);
        //$request->segment(3);
        if (Auth::id() == $compara[0]->user_id) {
            return $next($request);
        } else {
            return response()->json(["missatge","Per editar el apartamnt ha de coincidir la id"]);
        }
    }
}
