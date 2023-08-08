<?php

namespace App\Http\Middleware;

use App\Models\Bab;
use App\Models\Materi;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BabMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tutor_id = auth()->user()->id;

        // $tutor_bab_id = Bab::with('materis.tutors')->where('id', $request->id)->whereHas('materis.tutors', function ($query) use ($tutor_id) {
        //     $query->where('tutor_id', $tutor_id);
        // })->first();

        $materi = Materi::where('id', $request->materi_id)->where('tutor_id', $tutor_id)->first();

        if (!$materi) {
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