@extends('admin.main')
@section('content')
<div class="pagetitle">
      <h1>Student</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"></li>
          <li class="breadcrumb-item active">Student</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
            <a href="/admin/student/create" class="btn btn-primary m-3">+ Student</a>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>NIM</th>
                        <th>Major</th>
                        <th>Class</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>


                    @foreach($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->nim }}</td>
                        <td>{{ $student->major }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{!! $student->course -> name ?? '<span class="badge bg-danger">Belum Mengikuti Course</span>' !!}</td>
                        <td class="d-flex">
                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                            <form action="/admin/student/delete/{{ $student->id }} " method="post">
                              @method('DELETE')
                              @csrf
                          
                              <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" >Delete</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </div>
      </div>
    </section>
@endsection