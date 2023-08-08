<?php

namespace App\Http\Controllers;

use App\Http\Resources\FreemiumBankSoalDetailResource;
use App\Models\FreemiumBankSoal;
use Illuminate\Http\Request;

class FreemiumBankSoalController extends Controller
{
    public function index()
    {
        $data = FreemiumBankSoal::with(['bidangs', 'tutors'])->get();

        return FreemiumBankSoalDetailResource::collection($data->loadMissing(['bidangs', 'tutors']));
    }

    public function show($id)
    {
        $data = FreemiumBankSoal::with(['bidangs', 'tutors'])->where('id', $id)->first();

        return new FreemiumBankSoalDetailResource($data->loadMissing(['bidangs', 'tutors']));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'bidang_id' => 'required',
            'tutor_id' => 'required',
        ]);

        $freemium_bank_soal = FreemiumBankSoal::create($data);

        return new FreemiumBankSoalDetailResource($freemium_bank_soal->loadMissing(['bidangs', 'tutors']));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required',
            'bidang_id' => 'required',
            'tutor_id' => 'required',
        ]);

        $freemium_bank_soal = FreemiumBankSoal::findOrFail($id);

        $freemium_bank_soal->update($data);

        return new FreemiumBankSoalDetailResource($freemium_bank_soal->loadMissing(['bidangs', 'tutors']));
    }

    public function destroy($id)
    {
        $freemium_bank_soal = FreemiumBankSoal::findOrFail($id);

        $freemium_bank_soal->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus',
        ]);
    }
}