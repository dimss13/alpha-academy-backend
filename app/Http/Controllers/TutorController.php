<?php

namespace App\Http\Controllers;

use App\Http\Resources\TutorDetailResource;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TutorController extends Controller
{
    public function index()
    {
        $tutors = Tutor::with('tutorBidangs', 'tutorUsers')->get();

        return response()->json(
            [
                'message' => 'Success',
                'data' => $tutors,
            ],
            200
        );
    }

    public function login(Request $request)
    {
        $validated = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|string',
            ]
        );

        $tutor = Tutor::where('email', $request->email)->first();

        if (!$tutor || !Hash::check($request->password, $tutor->password)) {
            return response()->json(
                [
                    'message' => 'Unauthorized',
                ],
                401
            );
        }

        $token = $tutor->createToken($request->email)->plainTextToken;

        return $token;
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(
            [
                'message' => 'Token revoked',
            ],
            200
        );
    }

    public function show(Request $request)
    {
        $tutor = Tutor::with('tutorBidangs', 'tutorUsers')->where('id', $request->id)->first();

        // return response()->json(
        //     [
        //         'message' => 'Success',
        //         'data' => $tutor,
        //     ],
        //     200
        // );

        return new TutorDetailResource($tutor->loadMissing('tutorBidangs', 'tutorUsers'));
    }

}