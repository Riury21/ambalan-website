<?php

namespace App\Http\Controllers;

use App\Models\Berita;

abstract class Controller
{
    //
}

class AdminController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('admin.admin.berita', compact('berita'));
    }
}
