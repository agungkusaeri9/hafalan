@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 mb-3">
            <a href="{{ route('kelas.index') }}" class="nav-link text-dark">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5>Kelas</h5>
                        <div class="display-1">
                            {{ $count['kelas'] }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('siswa.index') }}" class="nav-link text-dark">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5>Siswa</h5>
                        <div class="display-1">
                            {{ $count['siswa'] }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('kitab.index') }}" class="nav-link text-dark">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5>Kitab</h5>
                        <div class="display-1">
                            {{ $count['kitab'] }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection