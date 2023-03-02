<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPagesController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.index');
    }

    public function adminCreate()
    {
        return view('dashboard.admin.create');
    }

    public function changePassword()
    {
        return view('dashboard.admin.changePassword');
    }
    
    public function adminUpdateData()
    {
        return view('dashboard.admin.updateData');
    }

    public function pesertaRead() 
    {
        return view('dashboard.peserta.index');
    }

    public function pesertaCreate()
    {
        return view('dashboard.peserta.create');
    }
    
    public function vacCenter()
    {
        return view('dashboard.vacCenter.index');
    }

    public function vacCenterCreate()
    {
        return view('dashboard.vacCenter.create');
    }
    
    public function vacCenterUpdate()
    {
        return view('dashboard.vacCenter.update');
    }
}
