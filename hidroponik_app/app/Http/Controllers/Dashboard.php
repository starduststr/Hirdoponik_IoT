<?php

namespace App\Http\Controllers;

use App\Models\SensorModel;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $sensor = SensorModel::first();
        
        $data = ['title'=>'Dashboard',
                'sensor'=>$sensor];

        return view('dashboard', $data);
    }
}
