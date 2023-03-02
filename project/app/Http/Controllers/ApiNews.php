<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ApiNews extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::get();

        $response = [
            'message' => 'Daftar data news',
            'data' => $news,
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
            'date' => ['required'],
            'body' => ['required'],
        ]);

        if($validator->fails()) {
            $response = [
                'message' => 'Pastikan semua field terisi sesuai format',
                'data' => $validator->errors(),
            ];
            
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $news = News::create([
                'date' => $req->date,
                'body' => $req->body,
            ]);
            $response = [
                'message' => 'Data berita baru berhasil dibuat',
                'data' => $news,
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Data berita baru gagal dibuat',
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
        $news = News::where('id', $id)->get();
        if($news == null) {
            $response = [
                'message' => 'Data berita tidak ditemukan',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        } else {
            $response = [
                'message' => 'Data berita ditemukan',
                'data' => $news,
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
        $news = News::where('id', $id)->get();
        if($news == null) {
            $response = [
                'message' => 'Data berita tidak ditemukan',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($req->all(), [
            'date' => ['required'],
            'body' => ['required'],
        ]);

        if($validator->fails()) {
            $response = [
                'message' => 'Pastikan semua field terisi sesuai format',
                'data' => $validator->errors(),
            ];
            
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $news->update([
                'date' => ['required'],
                'body' => ['required'],
            ]);
            $response = [
                'message' => 'Data berita baru berhasil diupdate',
                'data' => $news,
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Data admin baru gagal diupdate',
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
        $news = News::where('id', $id)->get();
        if($news == null) {
            $response = [
                'message' => 'Data berita tidak ditemukan',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        try {
            $news->delete();
            $response = [
                'message' => 'Data news berhasil dihapus',
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Data news gagal dihapus',
                'data' => $e,
            ];
            return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
