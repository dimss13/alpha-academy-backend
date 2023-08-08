<?php

namespace App\Http\Middleware;

use App\Models\Bidang;
use App\Models\TutorBidang;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TutorBidangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tutor_Id = auth()->user()->id;
        $bidang_Id = $request->id;

        // use this if you want to use eloquent relationship
        $tutor_bidang_id = Bidang::with('bidangTutors')->where('id', $bidang_Id)->whereHas('bidangTutors', function ($query) use ($tutor_Id) {
            $query->where('tutor_id', $tutor_Id);
        })->first();

        // or use this if you want to use eloquent relationship
        $tutorBidang = TutorBidang::where('tutor_id', $tutor_Id)->where('bidang_id', $bidang_Id)->first();

        if (!$tutorBidang) {
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