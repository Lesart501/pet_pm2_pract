<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $context = ['devices' => Device::latest()->get()];
        return view('admin', $context);
    }
}
