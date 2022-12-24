<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Device;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private const ADD_VALIDATOR = [
        'name' => 'required|max:255',
        'category' => 'required|numeric',
        'description' => 'required|max:255',
        'number' => 'required|numeric|gt:0',
        'image' => 'mimes:jpeg,bmp,png'
    ];
    private const EDIT_VALIDATOR = [
        'name' => 'required|max:255',
        'category' => 'required|numeric',
        'description' => 'required|max:255',
        'number' => 'required|numeric|gt:0'
    ];

    private const ERROR_MESSAGES = [
        'required' => 'Заполните это поле',
        'max' => 'Значение не должно быть длиннее :max символов',
        'numeric' => 'Введите число',
        'gt' => 'Отсутствие оборудования оборудованием не считается',
        'mimes' => 'Выберите файл формата: jpeg, bmp, png'
    ];

    public function index(){
        $context = ['devices' => Device::latest()->get()];
        return view('admin', $context);
    }
    
    public function addDeviceForm(){
        $context = ['categories' => Category::get()];
        return view('device_add', $context);
    }
    public function saveDevice(Request $request){
        $validated = $request->validate(self::ADD_VALIDATOR, self::ERROR_MESSAGES);
        $image = $request->file('image');
        $image_name = time()."_". preg_replace('/\s+/', '_', strtolower($image->getClientOriginalName()));
        $tmp = $image->storeAs('uploads', $image_name, 'public');
        Device::create(['name' => $validated['name'], 'categories_id' => $validated['category'],'description' => $validated['description'],
        'number' => $validated['number'], 'image' => $image_name]);
        return redirect()->route('admin');
    }
    
    public function editDeviceForm(Device $device){
        $context = ['device' => $device, 'categories' => Category::get()];
        return view('device_edit', $context);
    }
    public function updateDevice(Request $request, Device $device){
        if($request->file('image') != ''){
            $this->validate($request, ['image' => ['required', 'mimes:jpeg,gif,bmp,png', 'max:2048']]);
            $image = $request->file('image');
            $image_name = time()."_". preg_replace('/\s+/', '_', strtolower($image->getClientOriginalName()));
            $tmp = $image->storeAs('uploads', $image_name, 'public');
            $device->fill(['image' => $image_name]);
        }
        $validated = $request->validate(self::EDIT_VALIDATOR, self::ERROR_MESSAGES);
        $device->fill(['name' => $validated['name'], 'categories_id' => $validated['category'],'description' => $validated['description'],
        'number' => $validated['number']]);
        $device->save();
        return redirect()->route('admin');
    }
    
    public function deleteDeviceForm(Device $device){
        return view('device_delete', ['device' => $device]);
    }
    public function destroyDevice(Request $request, Device $device){
        $device->delete();
        return redirect()->route('admin');
    }
}
