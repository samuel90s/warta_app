@extends('layouts.app_master')

@section('content')
    <div class="container">
        <h1>Edit Petugas Keamanan</h1>
        <form method="POST" action="{{ route('petugas.update', $petugas->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ $petugas->nik }}">
            </div>
            <div class="form-group">
                <label for="id_perumahan">ID Perumahan</label>
                <input type="text" class="form-control" id="id_perumahan" name="id_perumahan"
                    value="{{ $petugas->id_perumahan }}">
            </div>
            <div class="form-group">
                <label for="sk_satpam">SK Satpam</label>
                <input type="text" class="form-control" id="sk_satpam" name="sk_satpam"
                    value="{{ $petugas->sk_satpam }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
