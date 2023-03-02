<?php

namespace App\Http\Controllers;

use App\Models\PesertaVaccines;
use App\Models\VaccinationStatus;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ApiPesertaVaccineTable extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pv = PesertaVaccines::get();

        $response = [
            'message' => 'Daftar data peserta vaksin',
            'data' => $pv,
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'peserta_id' => ['required', 'numeric'],
            'peserta_nik' => ['required', 'numeric'],
            'vaccines_id' => ['required', 'numeric'],
        ]);

        if($validator->fails()) {
            $response = [
                'message' => 'Pastikan semua field terisi sesuai format',
                'data' => $validator->errors(),
            ];
    
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $vs = VaccinationStatus::create([
                'peserta_id' => $req->peserta_id,
                'peserta_nik' => $req->peserta_nik,
                'vaccines_id' => $req->vaccines_id,
            ]);
            $response = [
                'message' => 'Data status vaksin baru berhasil dibuat',
                'data' => $vs,
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Data status vaksin baru gagal dibuat',
                'data' => $e,
            ];
            return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
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
        $vs = VaccinationStatus::where('id', $id)->get();
        if($vs == null) {
            $response = [
                'message' => 'Data status vaksin tidak ditemukan',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        } else {
            $response = [
                'message' => 'Data status vaksin ditemukan',
                'data' => $vs,
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $vs = VaccinationStatus::where('id', $id)->get();
        if($vs == null) {
            $response = [
                'message' => 'Data status vaksin tidak ditemukan',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($req->all(), [
            'peserta_id' => ['required', 'numeric'],
            'peserta_nik' => ['required', 'numeric'],
            'vaccines_id' => ['required', 'numeric'],
        ]);

        if($validator->fails()) {
            $response = [
                'message' => 'Pastikan semua field terisi sesuai format',
                'data' => $validator->errors(),
            ];
    
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $vs->update([
                'peserta_id' => $req->peserta_id,
                'peserta_nik' => $req->peserta_nik,
                'vaccines_id' => $req->vaccines_id,
            ]);
            $response = [
                'message' => 'Data status vaksin baru berhasil diupdate',
                'data' => $vs,
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Data status vaksin baru gagal diupdate',
                'data' => $e,
            ];
            return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
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
        $vs = VaccinationStatus::where('id', $id)->get();
        if($vs == null) {
            $response = [
                'message' => 'Data status vaksin tidak ditemukan',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        try {
            $vs->delete();
            $response = [
                'message' => 'Data status vaksin baru berhasil dihapus',
                'data' => $vs,
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Data status vaksin baru gagal dihapus',
                'data' => $e,
            ];
            return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
