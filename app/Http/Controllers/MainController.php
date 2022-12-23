<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class MainController extends Controller
{
    public function index()
    {
        $context = ['devices' => Device::latest()->get()];
        return view('index', $context);
    }
}
