<?php

namespace App\Http\Controllers;

use App\Models\Cources;
use Illuminate\Http\Request;

class CourcesController extends Controller
{
    // method untuk menampilkan halaman courses
    public function index(){
        // mendapatkan data student dari database
        $cources = Cources::all();

        // panggil view dan kirim data ke view
        return view('admin.contents.cources.index', [
            'cources' => $cources
        ]);
    }
    // method untuk menampilkan form tambah courses
    public function create(){
        // dapatkan data course dari courses
        

        return view('admin.contents.cources.create' );
        
    }

    // method untuk menyimpan data courses
    public function store(Request $request)
    {
       // validasi data yg diterima
       $request->validate([
        'name' => 'required',
        'category' => 'required',
        'desc' => 'required',
       ]);

       // simpam ke database
       Cources::create([
        'name' => $request->name,
        'category' => $request->category,
        'desc' => $request->desc,
       ]);

       // arahkan ke halaman daftar courses index
       return redirect('/admin/cource')->with('pesan', 'Berhasil menambahkan data');

    }

    // method untuk menampilkan halaman edit
    public function edit ($id){
        // cari courses berdasarkan id
        $cource = Cources::find($id); // SELECT * FROM courses WHERE id = $id;

        // kirim courses ke view edit
        return view('admin.contents.cources.edit', [
          'cource' => $cource,
        ]);
    }

       // METHOD MENYIMPAN HASIL UPDATE
       public function update($id, Request $request){
        // cari courses berdasarkan id
        $cource = Cources::find($id); // SELECT * FROM courses WHERE id = $id;

        // validasi data yg diterima
       $request->validate([
        'name' => 'required',
        'category' => 'required',
        'desc' => 'required',
       ]);

       //simpan perubahan
       $cource->update([
        'name' => $request->name,
        'category' => $request->category,
        'desc' => $request->desc,
       ]);

       // arahkan ke halaman daftar courses index
       return redirect('/admin/cource')->with('pesan', 'Berhasil mengedit data');

       }

       // method untuk menghapus courses
       public function destroy($id){
        // cari courses berdasarkan id
        $cource = Cources::find($id); // SELECT * FROM courses WHERE id = $id;

        // hapus courses
        $cource->delete();

        // arahkan ke halaman daftar courses index
       return redirect('/admin/cource')->with('pesan', 'Berhasil mengedit data');

       }
}
