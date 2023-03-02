<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ApiPeserta extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta = Peserta::get();

        $response = [
            'message' => 'Daftar data peserta',
            'data' => $peserta,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nik' => ['required','numeric'],
            'password' => ['required'],
            'password_confirm' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'dob' => ['required'],
            'address' => ['required'],
            'contact' => ['required'],
            'age' => ['required'],
            'vac_center_id' => ['required', 'numeric'],
        ]);

        if($validator->fails()) {
            $response = [
                'message' => 'Pastikan semua field terisi sesuai format',
                'data' => $validator->errors(),
            ];
    
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if($req->password == $req->password_confirm) {
            try {
                $password = password_hash($req->password, PASSWORD_DEFAULT);
                $peserta = Peserta::create([
                    'nik' => $req->nik,
                    'password' => $password,
                    'first_name' => $req->first_name,
                    'last_name' => $req->last_name,
                    'dob' => $req->dob,
                    'address' => $req->address,
                    'contact' => $req->contact,
                    'age' => $req->age,
                    'vac_center_id' => $req->vac_center_id,
                ]);
                $response = [
                    'message' => 'Data peserta baru berhasil dibuat',
                    'data' => $peserta,
                ];
                return response()->json($response, Response::HTTP_OK);
            } catch (QueryException $e) {
                $response = [
                    'message' => 'Data peserta baru gagal dibuat',
                    'data' => $e,
                ];
                return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            $response = [
                'message' => 'Pastikan isi password dan konfirmasi password sama!',
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peserta = Peserta::where('id', $id)->get();
        if($peserta == null) {
            $response = [
                'message' => 'Data peserta tidak ditemukan',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        } else {
            $response = [
                'message' => 'Data peserta ditemukan',
                'data' => $peserta,
            ];
            return response()->json($response, Response::HTTP_FOUND);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $peserta = Peserta::where('id', $id)->get();
        if($peserta == null) {
            $response = [
                'message' => 'Data peserta tidak ditemukan',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($req->all(), [
            'nik' => ['required'],
            'password' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'dob' => ['required'],
            'address' => ['required'],
            'contact' => ['required'],
            'age' => ['required'],
            'vac_center_id' => ['required'],
        ]);

        if($validator->fails()) {
            $response = [
                'message' => 'Pastikan semua field terisi sesuai format',
                'data' => $validator->errors(),
            ];
    
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if($req->password == $peserta['password']) {
            try {
                $peserta->update([
                    'nik' => $req->nik,
                    'password' => $peserta['password'],
                    'first_name' => $req->first_name,
                    'last_name' => $req->last_name,
                    'dob' => $req->dob,
                    'address' => $req->address,
                    'contact' => $req->contact,
                    'age' => $req->age,
                    'vac_center_id' => $req->vac_center_id,
                ]);
                $response = [
                    'message' => 'Data peserta berhasil diedit',
                    'data' => $peserta,
                ];
                return response()->json($response, Response::HTTP_OK);
            } catch (QueryException $e) {
                $response = [
                    'message' => 'Data peserta gagal diedit',
                    'data' => $e,
                ];
                return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            $response = [
                'message' => 'Pastikan isi password dan konfirmasi password sama!',
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peserta = Peserta::where('id', $id)->get();
        if($peserta == null) {
            $response = [
                'message' => 'Data peserta tidak ditemukan',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        try {
            $peserta->delete();
            $response = [
                'message' => 'Data peserta berhasil dihapus',
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Data peserta gagal dihapus',
                'data' => $e,
            ];
            return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
