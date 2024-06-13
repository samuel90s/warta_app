@extends('layouts.app_master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Ketua RW</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('ketuarw.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nama_ketua_rw">Nama Ketua RW</label>
                        <input type="text" class="form-control" id="nama_ketua_rw" name="nama_ketua_rw"
                            value="{{ old('nama_ketua_rw') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="telepon_ketua_rw">Telepon Ketua RW</label>
                        <input type="text" class="form-control" id="telepon_ketua_rw" name="telepon_ketua_rw"
                            pattern="62\d{11}" placeholder="62xxxxxxxxxxx" value="{{ old('telepon_ketua_rw') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="id_perumahan">Perumahan</label>
                        <select class="form-control" id="id_perumahan" name="id_perumahan" required>
                            @foreach ($perumahans as $perumahan)
                                <option value="{{ $perumahan->id_perumahan }}">{{ $perumahan->nama_perumahan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('ketuarw.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
