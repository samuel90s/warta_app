@extends('layouts.app_master')

@section('title', 'Perumahan')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Daftar Perumahan</h1>

        <div class="mb-4">
            <a href="{{ route('perumahan.create') }}" class="btn btn-success">Add Perumahan</a>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Data Perumahan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Perumahan</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Pengembang</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Perumahan</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Pengembang</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($perumahans as $perumahan)
                                <tr>
                                    <td>{{ $perumahan->nama_perumahan }}</td>
                                    <td>{{ $perumahan->alamat }}</td>
                                    <td>{{ $perumahan->email }}</td>
                                    <td>{{ $perumahan->pengembang }}</td>
                                    <td>{{ $perumahan->created_at }}</td>
                                    <td>{{ $perumahan->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('perumahan.edit', $perumahan->id_perumahan) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('perumahan.destroy', $perumahan->id_perumahan) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
