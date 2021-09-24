@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('success'))
    <div class="row mt-4">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('success') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Laporan Hafalan</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped display responsive nowrap" id="table">
                            <thead>
                                <tr>
                                    <th width="10px" class="text-center">No.</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th width="140" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_siswa as $siswa)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->nama }}</td>
                                        <td>{{ $siswa->kelas->nama }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('laporan.print', $siswa->id) }}" class="btn btn-secondary btn-sm" target="_blank">Print</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/datatables/css/dataTables.bootstrap4.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('assets/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
$(function(){
    $('#table').DataTable({
        responsive: true
    });
})
</script>
@endpush