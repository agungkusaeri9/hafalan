@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="text-center">Tambah Bab</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('bab.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kitab">Kitab</label>
                            <select name="kitab_id" id="kitab" class="form-control @error('kitab_id') is-invalid @enderror">
                                @foreach ($data_kitab as $kitab)
                                    <option value="{{ $kitab->id }}">{{ $kitab->nama }}</option>
                                @endforeach
                            </select>
                            @error('kitab_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Bab</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <a href="{{ route('bab.index') }}" class="btn btn-sm btn-warning">Kembali</a>
                            <button class="btn btn-sm btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection