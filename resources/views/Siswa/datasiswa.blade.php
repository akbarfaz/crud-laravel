@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Siswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
      <div class="card card-info card-outline">
      <div class="card-header">
        <div class="card-tools">
          <a href="{{ route('createsiswa') }}" class="btn btn-success">Tambah Data </a>
            </div>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <tr>
            <th>No</th>
              <th>Nama</th>
              <th>Tanggal Lahir</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
            @foreach ($dtSiswa as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->nama }}</td>
              <td>{{date('d-m-y', strtotime($item->tgllhr))}}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->alamat }}</td>
              <td>
              <form action="{{route('deletesiswa', $item->id)}}" method="POST">@csrf
        <a href="{{route('editsiswa', $item->id)}}" class="btn btn-primary">Edit</a>
          <button class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus data?')">Delete</button>
        </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
        <div class="card-footer">
          {{$dtSiswa->links('pagination::bootstrap-4')}}
        </div>
      </div>
    </div>

    </div>
@endsection