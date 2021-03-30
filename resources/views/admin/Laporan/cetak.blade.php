<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style type="text/css">
        @page { size: 21cm 33cm landscape; }
    </style>
    <title>Laporan Pengaduan</title>
</head>
    <body>
        <div class="text-center">

            <h5>Laporan Pengaduan Masyarakat di Kecamatan Pagaden</h5>
        <!-- <img src="{{ config('app.url') }}/assets/images/logo.png" style="max-width: 100px"> -->            
            <!-- <h6>@rfni_p</h6> -->
        </div>
        <div class="container mt-2">
            <table class="table table-striped table-bordered">
                <thead class="text-center table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Masyarakat</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Isi Laporan</th>
                        <th>Lokasi Kejadian</th>
                        <th>Nama Petugas</th>
                        <th>Tanggapan Dari</th>
                        <th>Tanggal Tanggapan</th>
                        <th>Isi Tanggapan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $k => $v)
                        <tr>
                            <td>{{ $k += 1 }}</td>
                            <td>{{ $v->user->nama }}</td>
                            <td>{{ tanggalIndonesia($v->tgl_pengaduan) }}</td>
                            <td style="max-width: 10px">{{ $v->isi_laporan }}</td>
                            <td>{{ $v->lokasi_kejadian }}</td>
                            <td>{{ $v->tanggapan->petugas->nama_petugas ?? '' }}</td>
                            <td>{{ $v->tanggapan->petugas->level ?? '' }}</td>
                            <td>{{ tanggalIndonesia($v->tanggapan->tgl_tanggapan ?? '' )}}</td>
                            <td>{{ $v->tanggapan->tanggapan ?? '' }}</td>
                            <td>{{ $v->status == '0' ? 'Pending' : ucwords($v->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>