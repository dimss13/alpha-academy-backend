<?php

namespace App\Http\Controllers;

use App\Http\Resources\MateriDetailResource;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::with(['bidangs:id,nama', 'tutors:id,nama'])->get();

        return MateriDetailResource::collection($materis->loadMissing(['bidangs', 'tutors']));
    }

    public function show($id)
    {
        $materi = Materi::with(['bidangs:id,nama', 'tutors:id,nama'])->find($id);

        return new MateriDetailResource($materi->loadMissing(['bidangs', 'tutors']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'content' => 'required',
            'bidang_id' => 'required|integer',
        ]);

        $materi = Materi::create([
            'nama' => $request->nama,
            'content' => $request->content,
            'bidang_id' => $request->bidang_id,
            'tutor_id' => auth()->user()->id,
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $materi,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'content' => 'required',
            'bidang_id' => 'required|integer',
        ]);

        $materi = Materi::find($id);

        $materi->update($request->all());

        return response()->json([
            'message' => 'Success',
            'data' => $materi,
        ], 200);
    }

    public function destroy($id)
    {
        $materi = Materi::find($id);

        $materi->delete();

        return response()->json([
            'message' => 'Success',
        ], 200);
    }
}