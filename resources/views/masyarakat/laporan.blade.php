@extends('layouts.LayoutIndex')

@section('css')
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">

<style type="text/css">
.photo {
    width: 70px;
    height: 70px;
    float: left;
    border-radius: 50%;
    margin-right: 16px;
}
.laporan-top {
    padding-top: 16px;
}
.margin{
    margin-top: -300px;
}
.laporan-top .profile {
    width: 50px;
    height: 50px;
    float: left;
    border-radius: 50%;
    margin-right: 16px;
}


</style>
@endsection
@section('title', 'PERAKAT - Pengaduan Masyarakat')

@section('content')
{{-- Section Header --}}
<section class="header">
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top container" id="navbar" style="background: #cb4c3c !important">
        <a class="navbar-brand" href="#"><img src="{{asset('assets/images/logo.png')}}" style="max-width: 50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <p class="nav-link text-white" style="font-size: 1rem;"><b>PERAKAT</b><br> Pengaduan masyarakat</p>
            </li>

          </ul>

          <div >

          	 @if(Auth::guard('masyarakat')->check())
            <div class="d-inline dropdown">
                <a href="#" class="btn text-white dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">{{ Auth::guard('masyarakat')->user()->nama }}</a>  
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="{{ route('view.index') }}" class="dropdown-item"><i class="fa fa-home mr-1"></i>Home</a>       
                    <a href="{{ route('laporan') }}" class="dropdown-item"><i class="fa fa-bullhorn mr-1"></i>Laporan</a>             
                      <hr class="dropdown-divider">
                      <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out mr-1"></i>Log Out</a>   
                 </div>
            </div>
          	 @else
            {{-- @guest --}}
              <div class="d-inline">
                <button class="btn d-inline text-white" data-toggle="modal" data-target="#loginModal">Masuk</button>
              </div>
              <div class="d-inline">
                <a href="{{ route('formRegister') }}" class="btn text-white">Daftar</a>

              </div>
{{--             @else
              <div class="d-inline">
                <a href="#" class="btn text-white" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="#" method="POST" class="d-none">
                  @csrf
                </form>
              </div> --}}
            {{-- @endguest --}}
             @endauth
            
            
          </div>
        </div>
      </nav>

</section>
 <main>
    <section>
        <div class="jumbotron" style="background-image: url({{asset('assets/images/bg.jpg')}}); min-height: 550px; background-position: center;">
            <div class="text-center mt-5 container">
                      <h1 class="medium text-white">Layanan Pengaduan Masyarakat Online</h1>
                      <h5 class="italic text-white mb-5 " style="color: #fff !important">Selamat Datang,{{ Auth::guard('masyarakat')->user()->nama }}. Di website pengaduan layanan masyarakat kecamatan Pagaden.<br>Sampaikan keluhan anda langsung kepada pihak berwenang</h5>
                  </div>
        </div>
    </section>
</main>
{{-- Section Card --}}
<div class="container">
    <div class="row justify-content-between margin" >
        <div class="col-lg-8 col-12 col  card pt-4 pb-4">
            <div class="content content-top">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                @if (Session::has('pengaduan'))
                    <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                @endif
                <div class="card p-3 mb-4 card-header mt-2 text-center"><b>TULIS LAPORAN DISINI</div>
                <form action="{{ route('pengaduan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <input type="file" name="foto" class="form-control pb-2">
                    </div>
                    <div class="form-group pt-2">
                        <textarea name="lokasi_kejadian" id="latlang" rows="3" class="form-control mb-3" placeholder="Lokasi Kejadian" required>{{ old('lokasi_kejadian') }}</textarea>
                    </div>
                    <div class="form-group pt-2">
                        <div class="input-group mb-3">
                            <select name="kategori_kejadian" class="custom-select" id="inputGroupSelect01" required>
                                <option value="" selected>Pilih Kategori Kejadian</option>
                                <option value="jalan">Jalan Berlubang</option>
                                <option value="bansos">Bantuan Sosial</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control" rows="4" required>{{ old('isi_laporan') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-block btn-success mt-2">Kirim</button>
                </form>
            </div>
        </div>
        <div class="col-lg-12 col card">
            <div class="content content-bottom mt-2">
                <div>
                    <img src="{{ asset('assets/images/user_default.svg') }}" alt="user profile" class="photo">
                    <div class="self-align">
                        <h5>{{ Auth::guard('masyarakat')->user()->nama }}</h5>
                        <p class="text-dark">{{ Auth::guard('masyarakat')->user()->username }}</p>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <p class="italic mb-0">Terverifikasi</p>
                            <div class="text-center">
                                {{ $hitung[0] }}
                            </div>
                        </div>
                        <div class="col">
                            <p class="italic mb-0">Proses</p>
                            <div class="text-center">
                                {{ $hitung[1] }}
                            </div>
                        </div>
                        <div class="col">
                            <p class="italic mb-0">Selesai</p>
                            <div class="text-center">
                                {{ $hitung[2] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-8">
            <a class="d-inline tab {{ $siapa != 'me' ? 'tab-active' : ''}} mr-4" href="{{ route('laporan') }}">
                Semua
            </a>
            <a class="d-inline tab {{ $siapa == 'me' ? 'tab-active' : ''}}" href="{{ route('laporan', 'me') }}">
                Laporan Saya
            </a>
            <hr>
        </div>
        @foreach ($pengaduan as $k => $v)
        <div class="col-lg-8 clearfix">
            <div class="card p-3 mb-2">
                <div class="laporan-top">
                    <img src="{{ asset('assets/images/user_default.svg') }}" alt="profile" class="profile">
                    <div class="d-flex justify-content-between">
                        <div class="">
                                <p class="mb-0">{{ $v->user->nama }}</p>
                                @if ($v->status == '0')
                                    <span class="text-danger">Pending</span>
                                @elseif($v->status == 'proses')
                                    <span class="text-warning">{{ ucwords($v->status) }}</span>
                                @else
                                    <span class="text-success">{{ ucwords($v->status) }}</span>
                                @endif
                                    <p>{{ $v->lokasi_kejadian }}</p>
                        </div>
                        <div>
                            <p>{{ $v->tgl_pengaduan->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
                <div class="laporan-mid">
                    <div class="judul-laporan">
                        {{ $v->judul_laporan }}
                    </div>
                    <p>{{ $v->isi_laporan }}</p>
                </div>
                <div class="laporan-bottom">
                    @if ($v->foto != null)
                    <center>
                        <img src="{{ Storage::url($v->foto) }}" style="max-width: 441px" width="90%" alt="{{ 'Gambar '.$v->judul_laporan }}" class="gambar-lampiran">
                    </center>
                    @endif
                </div>
            </div>

            @if ($v->tanggapan != null)
            <div class="float-right" style="width: 90%">
                <div class="card mb-2 p-2 admin-">
                    <div>
                        @if($v->tanggapan->petugas->level == 'admin')

                         <img src="{{ asset('assets/dist/img/user.jpeg') }}" alt="user profile" class="photo d-inline mb-2" style="max-width: 50px; max-height: 50px">
                        @else
                            <img src="{{ asset('assets/dist/img/petugas.png') }}" alt="user profile" class="photo d-inline mb-2" style="max-width: 50px; max-height: 50px">
                        @endif
                        <span class="">{{ $v->tanggapan->petugas->nama_petugas }}</span>
                    </div>
                    <p class="pl-2">{{ $v->tanggapan->tanggapan }}</p>
                </div>
            </div>
            @endif

        </div>
        @endforeach
    </div>
</div>
{{-- Footer --}}
{{-- 	<footer class="text-center p-4 text-white bg-secondary ml-auto">
      © 2021 PERAKAT | By
      <a href="#" class="text-blue-200" target="_blank">Rifani</a>
    </footer> --}}
    @endsection

