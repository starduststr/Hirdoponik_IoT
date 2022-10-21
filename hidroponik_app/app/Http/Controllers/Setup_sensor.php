<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Setup_sensor extends Controller
{
    public function index()
    {
        $data = ['title'=>'SETUP PARAMETER'];

        return view('setup_sensor', $data);
    }
}
