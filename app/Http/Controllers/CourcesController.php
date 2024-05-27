<?php

namespace App\Http\Controllers;

use App\Models\Cources;
use Illuminate\Http\Request;

class CourcesController extends Controller
{
    // method untuk menampilkan halaman student
    public function index(){
        // mendapatkan data student dari database
        $cources = Cources::all();

        // panggil view dan kirim data ke view
        return view('admin.contents.cources.index', [
            'cources' => $cources
        ]);
    }
}
