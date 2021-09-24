@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="text-center">Edit Siswa</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('siswa.update', $item->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" value="{{ $item->nis ?? old('nis') }}">
                            @error('nis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $item->nama ?? old('nama') }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas_id" id="kelas" class="form-control @error('kelas_id') is-invalid @enderror">
                                @foreach ($data_kelas as $kelas)
                                    <option @if($kelas->id == $item->kelas_id) selected @endif value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ $item->alamat ?? old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="">Jenis Kelamin</label>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="L" value="L" name="jenis_kelamin" @if($item->jenis_kelamin === 'L') checked @endif>
                                    <label class="form-check-label" for="L">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="P" value="L" name="jenis_kelamin" @if($item->jenis_kelamin === 'P') checked @endif>
                                    <label class="form-check-label" for="P">Perempuan</label>
                                </div>
                            </div>
                            @error('jenis_kelamin')
                                <div class="col-12">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp">Nomor Hp</label>
                            <input type="text" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp" value="{{ $item->nomor_hp ?? old('nomor_hp') }}">
                            @error('nomor_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-warning">Kembali</a>
                            <button class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection