@extends('layouts.app_master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Petugas Keamanan</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('petugas.update', $petugas->id) }}">
                    @csrf
                    @method('PUT') <!-- Gunakan method PUT untuk mengirimkan permintaan ke endpoint update -->

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $petugas->nik }}">
                    </div>
                    <div class="form-group">
                        <label for="id_perumahan">Perumahan</label>
                        <select class="form-control" id="id_perumahan" name="id_perumahan">
                            @foreach ($perumahans as $perumahan)
                                <option value="{{ $perumahan->id_perumahan }}"
                                    {{ $perumahan->id_perumahan == $petugas->id_perumahan ? 'selected' : '' }}>
                                    {{ $perumahan->nama_perumahan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sk_satpam">SK Satpam</label>
                        <input type="text" class="form-control" id="sk_satpam" name="sk_satpam"
                            value="{{ $petugas->sk_satpam }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
