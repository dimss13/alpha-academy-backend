<?php

namespace App\Http\Middleware;

use App\Models\SubBab;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubBabAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tutor_id = auth()->user()->id;
        $bab_id = $request->id;

        $sub_bab = SubBab::with('babs.materis')->where('id', $bab_id)->whereHas('babs.materis.tutors', function ($query) use ($tutor_id) {
            $query->where('tutor_id', $tutor_id);
        })->get();

        if ($sub_bab->isEmpty()) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        return $next($request);
    }
}