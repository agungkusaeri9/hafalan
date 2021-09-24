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
                        <h6>Data Bab</h6>
                        <a href="{{ route('bab.create') }}" class="btn btn-sm btn-primary">Tambah Bab</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped display responsive nowrap" id="table">
                            <thead>
                                <tr>
                                    <th width="10px" class="text-center">No.</th>
                                    <th>Nama Kitab</th>
                                    <th>Bab</th>
                                    <th width="140" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->kitab->nama }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('bab.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                                            <form action="{{ route('bab.destroy', $item->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
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