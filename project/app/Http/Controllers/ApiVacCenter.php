<?php

namespace App\Http\Controllers;

use App\Models\VacCenter;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ApiVacCenter extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vs = VacCenter::get();

        $response = [
            'message' => 'Daftar data vaksin center',
            'data' => $vs,
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
        //
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
            'name' => ['required'],
            'address' => ['required'],
            'contact' => ['required'],
        ]);

        if($validator->fails()) {
            $response = [
                'message' => 'Pastikan semua field terisi sesuai format',
                'data' => $validator->errors(),
            ];
    
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $vs = VacCenter::create([
                'name' => $req->name,
                'address' => $req->address,
                'contact' => $req->contact,
            ]);
            $response = [
                'message' => 'Data vaksin center baru berhasil dibuat',
                'data' => $vs,
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Data vaksin center baru gagal dibuat',
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
        $vs = VacCenter::findOrFail($id);
        $response = [
            'message' => 'Daftar data vaksin center',
            'data' => $vs,
        ];
        return response()->json($response, Response::HTTP_OK);
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
        $vs = VacCenter::where('id', $id)->get();
        if($vs == null) {
            $response = [
                'message' => 'Data vaksin center tidak ditemukan',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $vcc = VacCenter::findOrFail($id);

        $validator = Validator::make($req->all(), [
            'name' => ['required'],
            'address' => ['required'],
            'contact' => ['required','numeric'],
        ]);

        if($validator->fails()) {
            $response = [
                'message' => 'Pastikan semua field terisi sesuai format',
                'data' => $validator->errors(),
            ];
    
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $vcc->update([
                'name' => $req->name,
                'address' => $req->address,
                'contact' => $req->contact,
            ]);
            $response = [
                'message' => 'Data vaksin center berhasil diupdate',
                'data' => $vcc,
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Data vaksin center gagal diupdate',
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
        $vs = VacCenter::findOrFail($id);
        
        try {
            $vs->delete();
            $response = [
                'message' => 'Data vaksin berhasil diupdate',
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Data vaksin gagal diupdate',
            ];
            return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }
}
