<?php

namespace App\Http\Controllers;

use App\Models\SoalPilgan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SoalPilganController extends Controller
{
    public function index()
    {
        $data = SoalPilgan::with(['freemiumBankSoals', 'pilihanGandas'])->get();

        return response()->json([
            'message' => 'success',
            'data' => $data
        ], 200);
    }

    public function show($id)
    {
        $data = SoalPilgan::findOrFail($id);

        return response()->json([
            'message' => 'success',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'freemium_bank_soal_id' => 'required',
            'deskripsi' => 'required',
            'kunci_jawaban' => 'required',
        ]);

        $filename = null;
        if ($request->file) {
            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $filename = time() . '.' . $request->file->extension();

            Storage::putFileAs(
                'images',
                $request->file,
                $filename
            );
        }

        $request['gambar'] = $filename;

        $data = SoalPilgan::create($request->all());

        return response()->json([
            'message' => 'success',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'deskripsi' => 'required',
            'kunci_jawaban' => 'required',
        ]);

        $data = SoalPilgan::findOrFail($id);

        $request['freemium_bank_soal_id'] = $data->freemium_bank_soal_id;

        $filename = null;
        if ($request->file) {
            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $filename = time() . '.' . $request->file->extension();

            Storage::putFileAs(
                'images',
                $request->file,
                $filename
            );

            $request['gambar'] = $filename;

            if ($data->gambar) {
                Storage::delete('images/' . $data->gambar);
            }
        }

        $data->update($request->all());

        return response()->json([
            'message' => 'success',
            'data' => $data
        ], 200);
    }

    public function updateImage(Request $request, $id)
    {
        // Validate the uploaded file
        // $validated = $request->validate([
        //     'file' => 'required',
        // ]);

        $data = SoalPilgan::findOrFail($id);

        if ($request->hasFile('file')) { // Check if the file exists in the request
            $file = $request->file('file'); // Get the uploaded file from the request

            $filename = time() . '.' . $file->getClientOriginalExtension();

            Storage::putFileAs(
                'images',
                $file,
                $filename
            );

            if ($data->gambar) {
                Storage::delete('images/' . $data->gambar);
            }

            $data->gambar = $filename; // Update the 'gambar' attribute with the new filename
        }

        $data->update($request->except('file')); // Update other fields except 'file'

        return response()->json([
            'message' => 'success',
            'data' => $data
        ], 200);

    }

    public function destroy($id)
    {
        $data = SoalPilgan::findOrFail($id);

        if ($data->gambar) {
            Storage::delete('images/' . $data->gambar);
        }

        $data->delete();

        return response()->json([
            'message' => 'success',
        ], 200);
    }

    public function showImage($id)
    {
        $data = SoalPilgan::findOrFail($id);

        if ($data->gambar) {
            $path = storage_path('app/images/' . $data->gambar);
            return response()->file($path);
        }

        return response()->json([
            'message' => 'success',
        ], 200);
    }
}