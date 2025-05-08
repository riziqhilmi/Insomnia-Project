<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataMasterController extends Controller
{
    public function index()
    {
        return view('datamaster.index'); // Pastikan view ini ada di folder resources/views/datamaster
    }
}
