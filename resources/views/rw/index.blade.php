@extends('layouts.app_master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Daftar Ketua RW</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ketua RW</h6>
                <a href="{{ route('ketuarw.create') }}" class="btn btn-primary btn-sm float-right">Tambah Ketua RW</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Ketua RW</th>
                                <th>Nomor Telepon</th>
                                <th>Perumahan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ketuaRw as $ketuaRw)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ketuaRw->nama_ketua_rw }}</td>
                                    <td>{{ $ketuaRw->telepon_ketua_rw }}</td>
                                    <td>{{ $ketuaRw->perumahan->nama_perumahan }}</td>
                                    <td>
                                        <a href="{{ route('ketuarw.edit', $ketuaRw->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('ketuarw.destroy', $ketuaRw->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
