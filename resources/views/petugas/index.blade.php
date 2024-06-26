@extends('layouts.app_master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Daftar Petugas Keamanan</h1>

        <div class="mb-4">
            <a href="{{ route('petugas.create') }}" class="btn btn-success">Tambah Petugas</a>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Petugas Keamanan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">ID Perumahan</th>
                                <th scope="col">SK Satpam</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($petugas as $p)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->nik }}</td>
                                    <td>{{ $p->telepon }}</td>
                                    <td>{{ $p->jenis_kelamin }}</td>
                                    <td>{{ $p->perumahan->nama_perumahan ?? 'Tidak Terdaftar' }}</td>
                                    <td>
                                        @if ($p->sk_satpam)
                                            <a href="{{ Storage::url('sk_satpam/' . $p->sk_satpam) }}" target="_blank">Lihat
                                                Dokumen</a>
                                        @else
                                            Tidak Ada
                                        @endif
                                    </td>
                                    <td>{{ $p->created_at }}</td>
                                    <td>{{ $p->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('petugas.edit', $p->id_petugas_keamanan) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('petugas.destroy', $p->id_petugas_keamanan) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    "paging": true,
                    "searching": true
                });
            });
        </script>
    @endpush
@endsection
