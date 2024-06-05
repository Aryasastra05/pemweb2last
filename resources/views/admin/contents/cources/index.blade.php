@extends('admin.main')
@section('content')
<div class="pagetitle">
      <h1>Cources</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"></li>
          <li class="breadcrumb-item active">Cources </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
            <a href="/admin/cources/create" class="btn btn-primary m-3">+ Cources</a>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>category</th>
                        <th>desc</th>
                        <th>Action</th>
                    </tr>


                    @foreach($cources as $cource)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cource->name }}</td>
                        <td>{{ $cource->category }}</td>
                        <td>{{ $cource->desc }}</td>
                        <td class="d-flex">
                          <a href="{{ route('cources.edit', $cource->id) }}" class="btn btn-warning">Edit</a>
                          <form action="/admin/cources/delete/{{ $cource->id }} " method="post">
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