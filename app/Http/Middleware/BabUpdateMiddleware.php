<?php

namespace App\Http\Middleware;

use App\Models\Bab;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BabUpdateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tutor_id = auth()->user()->id;
        $materi_id = $request->id;
        $bab = Bab::with('materis')->where('id', $materi_id)->whereHas('materis.tutors', function ($query) use ($tutor_id) {
            $query->where('tutor_id', $tutor_id);
        })->first();

        if (!$bab) {
            return response()->json(
                [
                    'message' => 'Unauthorized',
                ],
                401
            );
        }

        return $next($request);
    }
}