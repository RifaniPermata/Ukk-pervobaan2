<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Laporan Pengaduan</title>
</head>
    <body>
        <!-- <img src="{{asset('assets/images/logo.png')}}" style="max-width: 100px"> -->
        <div class="text-center">
            <h5>Laporan Pengaduan Masyarakat</h5>
            <h6>@rfni_p</h6>
        </div>
        <div class="container">
            <table class="table table-striped table-bordered">
                <thead class="text-center table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Isi Laporan</th>
                        <th>Lokasi Kejadian</th>
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
                            <td>{{ $v->tgl_pengaduan->format('d-M-Y') }}</td>
                            <td>{{ $v->isi_laporan }}</td>
                            <td>{{ $v->lokasi_kejadian }}</td>
                            <td>{{ $v->tanggapan->petugas->level ?? '' }}</td>
                            <td>{{ $v->tanggapan->tgl_tanggapan ?? '' }}</td>
                            <td>{{ $v->tanggapan->tanggapan ?? '' }}</td>
                            <td>{{ $v->status == '0' ? 'Pending' : ucwords($v->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>