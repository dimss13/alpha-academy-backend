<?php

namespace App\Http\Middleware;

use App\Models\Materi;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MateriMiddleware
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

        $materi = Materi::where('id', $materi_id)->where('tutor_id', $tutor_id)->first();

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