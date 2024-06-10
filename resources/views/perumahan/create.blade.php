@extends('layouts.app_master')

@section('title', 'Create Perumahan')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Create Perumahan</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('perumahan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_perumahan">Nama Perumahan</label>
                        <input type="text" class="form-control" id="nama_perumahan" name="nama_perumahan">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pengembang">Pengembang</label>
                        <input type="text" class="form-control" id="pengembang" name="pengembang">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
