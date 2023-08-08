<?php

namespace App\Http\Middleware;

use App\Models\SoalPilgan;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SoalPilganAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tutor_id = auth()->user()->id;
        $soal_pilgan_id = $request->id;

        $tutor = SoalPilgan::with('freemiumBankSoals.tutors')->where('id', $soal_pilgan_id)->whereHas('freemiumBankSoals.tutors', function ($query) use ($tutor_id) {
            $query->where('tutor_id', $tutor_id);
        })->get();

        $tutor_bidang = SoalPilgan::with('freemiumBankSoals.bidangs.bidangTutors')->where('id', $soal_pilgan_id)->whereHas('freemiumBankSoals.bidangs.bidangTutors', function ($query) use ($tutor_id) {
            $query->where('tutor_id', $tutor_id);
        })->get();

        if ($tutor->isEmpty() && $tutor_bidang->isEmpty()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return $next($request);
    }
}