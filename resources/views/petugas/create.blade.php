@extends('layouts.app_master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Petugas Keamanan</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('petugas.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" pattern="62\d{11}"
                            placeholder="62xxxxxxxxxxx">
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" pattern="\d{16}" required>
                    </div>

                    <div class="form-group">
                        <label for="id_perumahan">Perumahan</label>
                        <select class="form-control" id="id_perumahan" name="id_perumahan">
                            @foreach ($perumahans as $perumahan)
                                <option value="{{ $perumahan->id_perumahan }}">{{ $perumahan->nama_perumahan }}</option>
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
