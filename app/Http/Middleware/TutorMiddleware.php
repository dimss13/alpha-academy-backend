<?php

namespace App\Http\Middleware;

use App\Models\Tutor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TutorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tutorId = auth()->user()->id;
        $editedTutorId = $request->id;

        if ($tutorId != $editedTutorId) {
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