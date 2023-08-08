<?php

namespace App\Http\Controllers;

use App\Http\Resources\BabDetailResource;
use App\Models\Bab;
use Illuminate\Http\Request;

class BabController extends Controller
{
    public function index()
    {
        $babs = Bab::with(['materis', 'subBabs', 'materis.tutors'])->get();

        return BabDetailResource::collection($babs->loadMissing(['materis', 'subBabs', 'materis.tutors']));
    }

    public function show($id)
    {
        $bab = Bab::with(['materis', 'subBabs', 'materis.tutors'])->findOrFail($id);

        return new BabDetailResource($bab->loadMissing(['materis', 'subBabs', 'materis.tutors']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_bab' => 'required|string',
            'materi_id' => 'required|integer',
        ]);

        $bab = Bab::create([
            'judul_bab' => $request->judul_bab,
            'materi_id' => $request->materi_id,
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $bab,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul_bab' => 'required|string',
            'materi_id' => 'required|integer',
        ]);

        $bab = Bab::find($id);


        $bab->update($request->all());

        return response()->json([
            'message' => 'Success',
            'data' => $bab,
        ], 200);

    }

    public function destroy($id)
    {
        $bab = Bab::find($id);

        $bab->delete();

        return response()->json([
            'message' => 'Success',
        ], 200);
    }
}