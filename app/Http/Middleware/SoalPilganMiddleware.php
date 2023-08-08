<?php

namespace App\Http\Middleware;

use App\Models\FreemiumBankSoal;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SoalPilganMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tutor_id = auth()->user()->id;
        $freemium_bank_soal_id = $request->freemium_bank_soal_id;

        $tutor = FreemiumBankSoal::with('tutors')->where('id', $freemium_bank_soal_id)->where('tutor_id', $tutor_id)->whereHas('tutors', function ($query) use ($tutor_id) {
            $query->where('tutor_id', $tutor_id);
        })->get();

        $bidang = FreemiumBankSoal::with('bidangs.bidangTutors')->where('id', $freemium_bank_soal_id)->whereHas('bidangs.bidangTutors', function ($query) use ($tutor_id) {
            $query->where('tutor_id', $tutor_id);
        })->get();

        if ($tutor->isEmpty() && $bidang->isEmpty()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return $next($request);
    }
}