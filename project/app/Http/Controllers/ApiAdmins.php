<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ApiAdmins extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admins::get();

        $response = [
            'message' => 'Daftar data admin',
            'data' => $admin,
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
            'username' => ['required'],
            'password' => ['required'],
            'password_confirm' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
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
                $admin = Admins::create([
                    'username' => $req->username,
                    'password' => $password,
                    'first_name' => $req->first_name,
                    'last_name' => $req->last_name,
                ]);
                $response = [
                    'message' => 'Data admin baru berhasil dibuat',
                    'data' => $admin,
                ];
                return response()->json($response, Response::HTTP_OK);
            } catch (QueryException $e) {
                $response = [
                    'message' => 'Data admin baru gagal dibuat',
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
        $admin = Admins::where('id', $id)->get();
        if($admin == null) {
            $response = [
                'message' => 'Data admin tidak ditemukan',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        } else {
            $response = [
                'message' => 'Data admin ditemukan',
                'data' => $admin,
            ];
            return response()->json($response, Response::HTTP_FOUND);
        }
        
    }

    public function login(Request $req)
    {
        $username = $req->username;
        $password = $req->password;

        $admin = Admins::where('username', $username)->get();
        if($admin == null) {
            $response = [
                'message' => 'Gagal login admin',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        } else {
            if(password_verify($password, $admin['password'])) {
                $response = [
                    'message' => 'Berhasil Login',
                ];
                return response()->json($response, Response::HTTP_OK);
            }
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
        $admin = Admins::where('id', $id)->get();
        if($admin == null) {
            $response = [
                'message' => 'Data admin tidak ditemukan',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($req->all(), [
            'username' => ['required', 'max-length:20'],
            'password' => ['required'],
            'password_confirm' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
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
                $admin->update([
                    'username' => $req->username,
                    'password' => $password,
                    'first_name' => $req->first_name,
                    'last_name' => $req->last_name,
                ]);
                $response = [
                    'message' => 'Data admin baru berhasil dibuat',
                    'data' => $admin,
                ];
                return response()->json($response, Response::HTTP_OK);
            } catch (QueryException $e) {
                $response = [
                    'message' => 'Data admin baru gagal dibuat',
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

    public function changePassword($id, Request $req)
    {
        $admin = Admins::where('id', $id)->get();
        if($admin == null) {
            $response = [
                'message' => 'Data admin tidak ditemukan',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $admins = Admins::findOrFail($id);

        $validator = Validator::make($req->all(), [
            'password_old' => ['required'],
            'password' => ['required'],
            'password_confirm' => ['required'],
        ]);

        if($validator->fails()) {
            $response = [
                'message' => 'Pastikan semua field terisi sesuai format',
                'data' => $validator->errors(),
            ];
    
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if(password_verify($req->password_old, $admin[0]['password'])) {
            if($req->password == $req->password_confirm) {
                try {
                    $password = password_hash($req->password, PASSWORD_DEFAULT);
                    $admins->update([
                        'username' => $admin[0]['username'],
                        'password' => $password,
                        'first_name' => $admin[0]['first_name'],
                        'last_name' => $admin[0]['last_name'],
                    ]);
                    $response = [
                        'message' => 'Password berhasil diubah',
                        'data' => $admin,
                    ];
                    return response()->json($response, Response::HTTP_OK);
                } catch (QueryException $e) {
                    $response = [
                        'message' => 'Password gagal diubah',
                        'data' => $e,
                    ];
                    return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
                }
            } else {
                $response = [
                    'message' => 'Pastikan isi password dan konfirmasi password baru sama!',
                ];
                return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        } else {
            $response = [
                'message' => 'Pastikan password lama yang anda masukkan benar!',
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
        $admin = Admins::findOrFail($id);
        try {
            $admin->delete();
            $response = [
                'message' => 'Data admin baru berhasil dihapus',
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Data admin baru gagal dihapus',
                'data' => $e,
            ];
            return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
