@extends('layouts.app_master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Daftar Ketua RW</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Ketua RW</th>
                                <th>Telepon</th>
                                <th>Perumahan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ketuaRws as $ketuaRw)
                                <tr>
                                    <td>{{ $ketuaRw->nama_ketua_rw }}</td>
                                    <td>{{ $ketuaRw->telepon_ketua_rw }}</td>
                                    <td>{{ $ketuaRw->perumahan->nama_perumahan }}</td>
                                    <td>
                                        <a href="{{ route('ketuarw.edit', $ketuaRw->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('ketuarw.destroy', $ketuaRw->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <a href="{{ route('ketuarw.create') }}" class="btn btn-primary">Tambah Ketua RW Baru</a>
    </div>
@endsection
