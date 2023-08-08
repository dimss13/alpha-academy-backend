<?php

namespace App\Http\Middleware;

use App\Models\FreemiumBankSoal;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FreemiumBankSoalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tutor_id = auth()->user()->id;
        $freemium_bank_soal_id = $request->id;

        $data = FreemiumBankSoal::with('tutors')->where('id', $freemium_bank_soal_id)->where('tutor_id', $tutor_id)->get();

        if ($data->isEmpty()) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        return $next($request);
    }
}