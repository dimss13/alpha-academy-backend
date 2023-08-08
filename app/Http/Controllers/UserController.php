<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserDetailResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('statuses')->get();

        return response()->json(
            [
                'message' => 'Success',
                'data' => $users,
            ],
            200
        );
    }
    public function register(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|email|unique:users',
                'no_telepon' => 'required|string',
                'asal_sekolah' => 'required|string',
                'asal_provinsi' => 'required|string',
                'password' => 'required|string',
            ]
        );

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'asal_sekolah' => $request->asal_sekolah,
            'asal_provinsi' => $request->asal_provinsi,
            'password' => bcrypt($request->password),
            'status_id' => 1,
        ]);

        return response()->json(
            [
                'message' => 'User berhasil ditambahkan',
                'data' => $user,
            ],
            201
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

        // check if there is user with specified email
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            // if there is no user or password is wrong
            return response()->json(
                [
                    'message' => 'Email atau password salah',
                ],
                401
            );
        }

        return $user->createToken($request->email)->plainTextToken;
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(
            [
                'message' => 'Token berhasil dihapus',
            ],
            200
        );
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|email',
                'no_telepon' => 'required|string',
                'asal_sekolah' => 'required|string',
                'asal_provinsi' => 'required|string',
                'password' => 'required|string',
            ]
        );

        $user = User::findOrFail($id);

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'asal_sekolah' => $request->asal_sekolah,
            'asal_provinsi' => $request->asal_provinsi,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(
            [
                'message' => 'User berhasil diupdate',
                'data' => $user,
            ],
            200
        );
    }

    public function show($id)
    {
        $user = User::with(['statuses', 'userTutors'])->where('id', $id)->first();

        // return response()->json(
        //     [
        //         'message' => 'Success',
        //         'data' => $user,
        //     ],
        //     200
        // );

        return new UserDetailResource($user->loadMissing('statuses', 'userTutors'));
    }

}