<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $data['nama'] = "Silvi Nispi";
        $data['role'] = "Administrator";
        $data['products'] = [
            'Laptop',
            'Smartrphone',
            'Tablet',
            'Smartwatch',
        ];
        return view('home',$data);
    }
}
