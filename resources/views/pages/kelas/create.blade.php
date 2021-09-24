@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="text-center">Tambah Kelas</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('kelas.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Kelas</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <a href="{{ route('kelas.index') }}" class="btn btn-sm btn-warning">Kembali</a>
                            <button class="btn btn-sm btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection