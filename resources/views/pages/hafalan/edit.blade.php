@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="text-center">Edit Hafalan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('hafalan.update', $item->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                                <option value="">-- Pilih Kelas --</option>
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
                        <div class="form-group siswa_id">
                            <label for="siswa_id">Siswa</label>
                            <select name="siswa_id" id="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror">

                            </select>
                            @error('siswa_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kitab_id">Kitab</label>
                            <select name="kitab_id" id="kitab_id" class="form-control @error('kitab_id') is-invalid @enderror">
                                <option value="">-- Pilih Kitab --</option>
                                @foreach ($data_kitab as $kitab)
                                    <option @if($kitab->id == $item->kitab_id) selected @endif  value="{{ $kitab->id }}">{{ $kitab->nama }}</option>
                                @endforeach
                            </select>
                            @error('kitab_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bab_id">Bab</label>
                            <select name="bab_id" id="bab_id" class="form-control @error('bab_id') is-invalid @enderror">
                                
                            </select>
                            @error('bab_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ayat">Ayat</label>
                            <input type="text" name="ayat" class="form-control @error('ayat') is-invalid @enderror" id="ayat" value="{{ $item->ayat ?? old('ayat') }}">
                            @error('ayat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea name="catatan" id="catatan" cols="30" rows="3" class="form-control @error('catatan') is-invalid @enderror">{{ $item->catatan ?? old('catatan') }}</textarea>
                            @error('catatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ $item->tanggal->translatedFormat('Y-m-d') ?? old('tanggal') }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <a href="{{ route('hafalan.index') }}" class="btn btn-sm btn-warning">Kembali</a>
                            <button class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(function(){
        var kelas_id = $('#kelas_id').val();
        $.ajax({
            url: '{{ url('siswa') }}' + '/' + kelas_id + '/get',
            type: 'GET',
            dateType: 'JSON',
            success : function(data)
            {
                var siswa = {{ $item->siswa_id }};
                $('select[name="siswa_id"]').append('<option>--Pilih Siswa--</option>')
                $.each(data, function(key, value){
                    $('select[name="siswa_id"]').append(new Option(value['nama'],value['id']));
                    if(value['id'] == siswa){
                    $("#siswa_id option[value="+siswa+"]").prop("selected", true)
                    }
                })
            }
        })

        var kitab_id = $('#kitab_id').val();
        console.log(kitab_id);
        $.ajax({
            url: '{{ url('bab') }}' + '/' + kitab_id + '/get',
            type: 'GET',
            dateType: 'JSON',
            success : function(data){
                var bab = {{ $item->bab_id }};
                $('select[name="bab_id"]').empty();
                $('select[name="bab_id"]').append('<option>--Pilih Bab--</option>')
                $.each(data, function(key, value){
                    $('select[name="bab_id"]').append(new Option(value['nama'],value['id']));
                    if(value['id'] == bab){
                        $("#bab_id option[value="+bab+"]").prop("selected", true)
                    }
                })
            }
        })

        $('#kelas_id').on('change', function(){
            var kelas_id = $(this).val();
            $.ajax({
                url: '{{ url('siswa') }}' + '/' + kelas_id + '/get',
                type: 'GET',
                dateType: 'JSON',
                success : function(data)
                {
                    var siswa_id = $('.siswa_id');
                    siswa_id.removeClass('d-none');

                    $('select[name="siswa_id"]').empty();
                    $('select[name="siswa_id"]').append('<option>--Pilih Siswa--</option>')
                    $.each(data, function(key, value){
                        console.log(key);
                        $('select[name="siswa_id"]').append(new Option(value['nama'],value['id']));
                    })
                }
            })
        })

        $('#kitab_id').on('change', function(){
            var kitab_id = $(this).val();
            $.ajax({
                url: '{{ url('bab') }}' + '/' + kitab_id + '/get',
                type: 'GET',
                dateType: 'JSON',
                success : function(data)
                {
                    var kitab_id = $('.bab_id');
                    kitab_id.removeClass('d-none');

                    $('select[name="bab_id"]').empty();
                    $('select[name="bab_id"]').append('<option>--Pilih Bab--</option>')
                    $.each(data, function(key, value){
                        console.log(key);
                        $('select[name="bab_id"]').append(new Option(value['nama'],value['id']));
                    })
                }
            })
        })
    })
</script>
@endpush