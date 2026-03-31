<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilControllerController extends Controller
{
    //
    public function index(){
        $data['nama'] = "Silvi Nispi";
        $data['role'] = "Administrator";
        $data['products'] = [
            'Laptop',
            'Smartphone',
            'Tablet',
            'Smartwatch',
        ];
        return view('home', $data);
    }
}

