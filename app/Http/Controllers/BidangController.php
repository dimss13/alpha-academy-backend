<?php

namespace App\Http\Controllers;

use App\Http\Resources\BidangDetailResource;
use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function index()
    {
        $bidangs = Bidang::with('bidangTutors')->get();

        return response()->json(
            [
                'message' => 'Success',
                'data' => $bidangs,
            ],
            200
        );
    }

    public function show(Request $request)
    {
        $bidang = Bidang::with('bidangTutors')->find($request->id);

        // return response()->json(
        //     [
        //         'message' => 'Success',
        //         'data' => $bidang,
        //     ],
        //     200
        // );

        return new BidangDetailResource($bidang->loadMissing('bidangTutors'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'nama' => 'required|string',
            ]
        );


        $bidang = Bidang::find($id);

        $bidang->update($request->all());

        return response()->json(
            [
                'message' => 'Success',
                'data' => $bidang,
            ],
            200
        );
    }
}