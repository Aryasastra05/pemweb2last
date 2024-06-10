<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Cources;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // method untuk menampilkan halaman student
    public function index(){
        // mendapatkan data student dari database
        $students = Student::all();

        

        // panggil view dan kirim data ke view
        return view('admin.contents.student.index', [
            'students' => $students
        ]);
    }
    // method untuk menampilkan form tambah student
    public function create(){
        // dapatkan data course dari database
        $courses = Cources::all();

        return view('admin.contents.student.create', [
            'courses' => $courses

        ]);
        
    }

    // method untuk menyimpan data student
    public function store(Request $request)
    {
       // validasi data yg diterima
       $request->validate([
        'name' => 'required',
        'nim' => 'required|numeric',
        'major' => 'required',
        'class' => 'required',
        'course_id' => 'nullable|numeric',
       ]);

       // simpam ke database
       Student::create([
        'name' => $request->name,
        'nim' => $request->nim,
        'major' => $request->major,
        'class' => $request->class,
        'course_id' => $request->course_id,
       ]);

       // arahkan ke halaman daftar student index
       return redirect('/admin/student')->with('pesan', 'Berhasil menambahkan data');

    }

    // method untuk menampilkan halaman edit
    public function edit ($id){
        $courses = Cources::all();
        
        // cari student berdasarkan id
        $student = Student::find($id); // SELECT * FROM students WHERE id = $id;

        // kirim student ke view edit
        return view('admin.contents.student.edit', [
          'student' => $student, 'courses' => $courses
        ]);
    }

    // METHOD MENYIMPAN HASIL UPDATE
    public function update($id, Request $request){
        // cari student berdasarkan id
        $student = Student::find($id); // SELECT * FROM students WHERE id = $id;

        // validasi data yg diterima
       $request->validate([
        'name' => 'required',
        'nim' => 'required|numeric',
        'major' => 'required',
        'class' => 'required',
        'course_id' => 'nullable|numeric',
       ]);

       // simpan perubahan
       $student->update([
        'name' => $request->name,
        'nim' => $request->nim,
        'major' => $request->major,
        'class' => $request->class,
        'course_id' => $request->course_id,
       ]);

       // arahkan ke halaman daftar student index
       return redirect('/admin/student')->with('pesan', 'Berhasil mengedit student');

    }

      // method untuk menghapus student
      public function destroy($id){
         // cari student berdasarkan id
         $student = Student::find($id); // SELECT * FROM students WHERE id = $id;

         //hapus student
         $student->delete();

          // arahkan ke halaman daftar student index
       return redirect('/admin/student')->with('pesan', 'Berhasil mengedit student');
      }
}
