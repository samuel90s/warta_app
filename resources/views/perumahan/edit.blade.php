@extends('layouts.app_master')

@section('title', 'Edit Perumahan')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Perumahan</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('perumahan.update', $perumahan->id_perumahan) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_perumahan">Nama Perumahan</label>
                        <input type="text" class="form-control" id="nama_perumahan" name="nama_perumahan"
                            value="{{ $perumahan->nama_perumahan }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ $perumahan->alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $perumahan->email }}">
                    </div>
                    <div class="form-group">
                        <label for="pengembang">Pengembang</label>
                        <input type="text" class="form-control" id="pengembang" name="pengembang"
                            value="{{ $perumahan->pengembang }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
