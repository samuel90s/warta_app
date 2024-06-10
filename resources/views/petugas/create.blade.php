@extends('layouts.app_master')

@section('content')
    <div class="container">
        <h1>Tambah Petugas Keamanan</h1>
        <form method="POST" action="{{ route('petugas.store') }}">
            @csrf
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik">
            </div>
            <div class="form-group">
                <label for="id_perumahan">ID Perumahan</label>
                <input type="text" class="form-control" id="id_perumahan" name="id_perumahan">
            </div>
            <div class="form-group">
                <label for="sk_satpam">SK Satpam</label>
                <input type="text" class="form-control" id="sk_satpam" name="sk_satpam">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
