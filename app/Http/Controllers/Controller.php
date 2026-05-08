<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected $guarded = []; // Mengizinkan semua kolom untuk diisi
}
