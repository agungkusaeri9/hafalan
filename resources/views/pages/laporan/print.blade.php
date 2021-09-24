<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <title>{{ $title ?? 'Beranda' }}</title>
    <style>
        body{
            font-family: sans-serif;
        }
        .header-title{
            font-size: 15px;
            font-weight: 400;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row" style="margin-bottom: 50px">
        <div class="col-12">
            <h5 class="text-center header-title">PONDOK PESANTREN MAUNAH <br> LAPORAN CATATAN HAFALAN SANTRI SANTRIWATI PER BULAN</h5>
        </div>
    </div>
    <div class="row" style="margin-top:50px;font-size:14px">
        <div class="col-6">
            <table class="">
                <tr>
                    <td>Nama</td>
                    <td> : </td>
                    <td>{{ $siswa->nama }}</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td> : </td>
                    <td>{{ $siswa->kelas->nama }}</td>
                </tr>
                <tr>
                    <td>Bulan/Tahun</td>
                    <td> : </td>
                    <td>{{ \Carbon\Carbon::now()->translatedFormat('F') . '/' . \Carbon\Carbon::now()->translatedFormat('Y') }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="text-center" width="10">No</td>
                        <td class="text-center">Kitab</td>
                        <td class="text-center">Bab</td>
                        <td class="text-center">Ayat</td>
                        <td class="text-center">Catatan</td>
                        <td class="text-center">Tanggal</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa->hafalan as $hafalan)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $hafalan->kitab->nama }}</td>
                            <td>{{ $hafalan->bab->nama }}</td>
                            <td>{{ $hafalan->ayat }}</td>
                            <td>{{ $hafalan->catatan }}</td>
                            <td>{{ $hafalan->tanggal->translatedFormat('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>