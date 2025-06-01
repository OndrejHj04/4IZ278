<?php

namespace App\Http\Middleware;

use App\Models\Reservation;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminOrLeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $reservation = Reservation::find($request->route('reservation'));
        $leader_id = $reservation->leader->id;

        $isAdmin = Auth::user()->role == 'admin';
        $isLeader = Auth::user()->id == $leader_id;

        if($isAdmin || $isLeader){
            return $next($request);
        }
        
        return redirect()->back();
    }
}
