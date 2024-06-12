@extends('layouts.app_master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Petugas Keamanan</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('petugas.update', $petugas->id_petugas_keamanan) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $petugas->nama }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ $petugas->alamat }}">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ $petugas->tanggal_lahir }}">
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="pria" {{ $petugas->jenis_kelamin == 'pria' ? 'selected' : '' }}>Pria</option>
                            <option value="wanita" {{ $petugas->jenis_kelamin == 'wanita' ? 'selected' : '' }}>Wanita
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" pattern="62\d{11}"
                            placeholder="62xxxxxxxxxxx" value="{{ $petugas->telepon }}">
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" pattern="\d{16}"
                            value="{{ $petugas->nik }}" required>
                    </div>

                    <div class="form-group">
                        <label for="id_perumahan">Perumahan</label>
                        <select class="form-control" id="id_perumahan" name="id_perumahan">
                            @foreach ($perumahans as $perumahan)
                                <option value="{{ $perumahan->id_perumahan }}"
                                    {{ $petugas->id_perumahan == $perumahan->id_perumahan ? 'selected' : '' }}>
                                    {{ $perumahan->nama_perumahan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sk_satpam">SK Satpam (PDF atau DOCX)</label>
                        <input type="file" class="form-control" id="sk_satpam" name="sk_satpam" accept=".pdf,.docx">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
