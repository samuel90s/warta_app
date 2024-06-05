<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerumahaanController extends Controller
{
    public function index() {
        return view("perumahaan.index");
    }
}
