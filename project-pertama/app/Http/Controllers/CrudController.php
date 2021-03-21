<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    // halaman utama crud
    public function index()
    {
        return view('crud');
    }

    // halaman tambah data
    public function tambah()
    {
        return view('tambah-data-crud');
    }
}
