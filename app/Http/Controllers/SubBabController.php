<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubBabDetailResource;
use App\Models\SubBab;
use Illuminate\Http\Request;

class SubBabController extends Controller
{
    public function index()
    {
        $sub_babs = SubBab::with(['babs'])->get();

        return SubBabDetailResource::collection($sub_babs->loadMissing(['babs']));
    }

    public function show($id)
    {
        $sub_bab = SubBab::with(['babs'])->findOrFail($id);

        return new SubBabDetailResource($sub_bab->loadMissing(['babs']));

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_sub_bab' => 'required|string',
            'bab_id' => 'required|integer',
        ]);

        $sub_bab = SubBab::create([
            'judul_sub_bab' => $request->judul_sub_bab,
            'bab_id' => $request->bab_id,
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $sub_bab,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul_sub_bab' => 'required|string',
            'bab_id' => 'required|integer',
        ]);

        $sub_bab = SubBab::find($id);

        // // update
        $sub_bab->update($request->all());

        return response()->json([
            'message' => 'Success',
            'data' => $sub_bab,
        ], 200);
    }

    public function destroy($id)
    {
        $sub_bab = SubBab::find($id);

        $sub_bab->delete();

        return response()->json([
            'message' => 'Success',
        ], 200);
    }
}