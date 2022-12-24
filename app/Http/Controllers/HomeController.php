<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usage;

class HomeController extends Controller
{
    
    private const BOOK_VALIDATOR = [
        'number' => 'required|numeric',
        'days' => 'required|numeric'];
    private const ERROR_MESSAGES = [
        'required' => 'Заполните это поле',
        'numeric' => 'Введите число'];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $context = ['usages' => Usage::latest()->where('users_id', Auth::user()->id)->get()];
        return view('home', $context);
    }
    
    public function bookForm(Device $device) {
        return view('book', ['device' => $device]);
    }
    public function book(Request $request, Device $device){
        $validated = $request->validate(self::BOOK_VALIDATOR, self::ERROR_MESSAGES);
        $id = Auth::user()->id;
        Usage::create(['statuses_id' => 1, 'users_id' => $id, 'devices_id' => $device->id,'number' => $validated['number'],
        'days' => $validated['days']]);
        return redirect()->route('home');
    }
}
