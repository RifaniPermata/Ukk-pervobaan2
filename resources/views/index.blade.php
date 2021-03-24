@extends('layouts.LayoutIndex')

@section('css')
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <style type="text/css">
      .margin{
          margin-top: -150px;
      }
      .mg{
        margin-top: -50px;
      }
    </style>
@endsection

@section('title', 'PERAKAT - Pengaduan Masyarakat')

@section('content')
{{-- Section Header --}}

<section class="header">

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top container" id="navbar" style="background: #cb4c3c !important">

        <a class="navbar-brand" href="#"><img src="assets/images/logo.png" style="max-width: 50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <p class="nav-link text-white" style="font-size: 1rem;"><b>PERAKAT</b><br> Pengaduan masyarakat</p>
            </li>

          </ul>
            @if (Auth::guard('masyarakat')->check() && Auth::guard('masyarakat')->user()->email_verified_at == null)
                {{-- <div class="row"> --}}
                    <div class="col card bg-warning">
                        <div class="card-body">
                            Cek email <span class="font-weight-bold ">{{ Auth::guard('masyarakat')->user()->email }}</span>
                            untuk mengkonfirmasi dan melindungi akun Anda serta agar dapat mengirimkan pengaduan di website ini. Jika belum ada email, maka klik tombol verifikasi berikut kemudian cek kembali email.
                            <form action="{{ route('pekat.sendVerification') }}" method="POST" style="display: inline-block">
                                @csrf
                                <button type="submit" class="btn btn-danger d-inline">Verifikasi Sekarang</button>
                            </form>
                        </div>
                    </div>
                {{-- </div> --}}
        @endif

          <div >
             @if(Auth::guard('masyarakat')->check())
           {{--   <div class="d-inline">
                <a href="{{ route('view.index') }}" class="btn text-white">Home</a>             
             </div>
             <div class="d-inline">
                <a href="{{ route('laporan') }}" class="btn text-white">Laporan</a>             
             </div> --}}
             {{-- --}}
              <div class="d-inline dropdown">
                <a href="#" class="btn text-white dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">{{ Auth::guard('masyarakat')->user()->nama }}</a>  
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a href="{{ route('view.index') }}" class="dropdown-item"><i class="fa fa-home mr-1"></i>Home</a>       
                <a href="{{ route('laporan') }}" class="dropdown-item"><i class="fa fa-bullhorn mr-1"></i>Laporan</a>             
                  <hr class="dropdown-divider">
                  <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out mr-1"></i>Log Out</a>   
             </div>
             {{-- <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
             @else
            {{-- @guest --}}
              <div class="d-inline">
                <button class="btn d-inline text-white" data-toggle="modal" data-target="#loginModal">Masuk</button>
              </div>
              <div class="d-inline">
                <a href="{{ route('formRegister') }}" class="btn text-white">Daftar</a>

              </div>
        {{--     @else
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


{{-- Section Card Pengaduan --}}
 <main>
    <section>

          <div class="jumbotron" style="background-image: url('assets/images/bg.jpg');background-position:center;min-height: 440px;">

            <div class="row " style="margin-top: 100px;">
              @if(Auth::guard('masyarakat')->check())
                  <div class="text-center container mg">
                      <h1 class="medium text-white">Layanan Pengaduan Masyarakat Online</h1>
                      <h5 class="italic text-white mb-5 " style="color: #fff !important">Selamat Datang,{{ Auth::guard('masyarakat')->user()->nama }}. Di website pengaduan layanan masyarakat kecamatan Pagaden.<br>Sampaikan keluhan anda langsung kepada pihak berwenang</h5>
                      <h4 class="italic text-white"></h4>
                  </div>
                {{--  --}}
              @else
              <div class="col-md-6 text-center my-auto align-middle container">
                <h6 class="display-4 text-white" style="color: #fff !important">Layanan Pengaduan Masyarakat Online</h6>
              </div>
              @endauth
              @if(Auth::guard('masyarakat')->check())
              <div class="d-none">
                @else
              <div class="col-md-5 ml-auto">
                <h3 class="mx-5 text-white text-center p-1">Daftar Lewat</h3> 
                   	<div class="social-auth-links text-center row mb-3">
                        <div class="col-md-6 ">
                            <a href="{{ route('social.login', 'facebook') }}" class="btn btn-block btn-primary">
                               <i class="fa fa-facebook mr-1"></i>Facebook
                            </a>  
                        </div>
                        <div class="col-md-6  ">
                            <a href="{{ route('social.login', 'google') }}" class="btn btn-block btn-danger">
                            	<i class="fa fa-google mr-1"></i>Google+
                            </a>
                        </div>                          
                    </div> 
                <p class="p-2 text-white text-center">- atau -</p>
                <form method="POST" action="{{ route('formRegister') }}">
                    @csrf
                    <div class="form-group">
                    	<label for="nik" style="color: #fff !important">NIK</label>
                        <input type="number"  value="{{ old('nik') }}" required name="nik" placeholder="NIK" class="form-control @error('nik') is-invalid @enderror">
                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
	                <div class="form-group">
	                    <label for="nama" style="color: #fff !important">Nama Lengkap</label>
	                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}"  autocomplete="name" required placeholder="Nama Lengkap" autofocus>
	                    @error('nama')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
	                </div>
	                <div class="form-group">
	                	<label for="username_register" style="color: #fff !important">Username</label>
                        <input type="text" name="username_register" required value="{{ old('username_register') }}"  placeholder="Username" class="form-control @error('username_register') is-invalid @enderror">
                        @error('username_register')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
	                <div class="form-group">
	                    <label for="email" style="color: #fff !important">Email</label>
	                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="youremail@gmail.com" name="email" value="{{ old('email') }}" required  autocomplete="email">
	                    @error('email')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
                  	</div>
                  	<div class="form-group">
	                	<label for="telp" style="color: #fff !important">No. Telp</label>
                        <input type="number" name="telp"  value="{{ old('telp') }}" required placeholder="No. Telp" class="form-control @error('telp') is-invalid @enderror">
                        @error('telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
				  	       <div class="row">
                      	<div class="col-md-6">
                            <div class="form-group">
                                <label for="register_password" style="color: #fff !important">register_password</label>
                                <input id="register_password" type="password" class="form-control @error('register_password') is-invalid @enderror" name="register_password" required autocomplete="new-password" placeholder="********">
                                @error('register_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                  
                      	</div>
                      	<div class="col-md-6">
                          <div class="form-group">
                            <label for="password-confirm" style="color: #fff !important">Konfirmasi Password</label>
                            <input id="password-confirm" type="password" class="form-control" required name="password_confirmation" required autocomplete="new-password" placeholder="********">
                          </div>
                      	</div>
                  	</div>
                  
                  <button type="submit" class="btn btn-primary btn-block text-white ml-auto" style="color: #fff !important">Daftar</button>
                </form>
              </div>
              @endauth
            </div>
          </div>
    </section>
</main>

<!-- MODAL LOGIN -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title container" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mx-5 text-center">Masuk Lewat</p> 
                   	<div class="social-auth-links text-center row mb-3">
                        <div class="col-md-6 ">
                            <a href="{{ route('social.login', 'facebook') }}" class="btn btn-block btn-primary">
                               <i class="fa fa-facebook mr-1"></i>Facebook
                            </a>  
                        </div>
                        <div class="col-md-6  ">
                            <a href="{{ route('social.login', 'google') }}" class="btn btn-block btn-danger">
                            	<i class="fa fa-google mr-1"></i>Google+
                            </a>
                        </div>                          
                    </div> 
                	<p class="p-2 text-center">- atau -</p>
                     <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="login-username" >Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="login-username" placeholder="username" autocomplete="username" value="{{ old('username') }}" autofocus name="username">    
                            @error('username')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror                     
                        </div>
                        <div class="form-group">
                            <label for="login-password" >Password</label>
                            <input type="password"  class="form-control @error('password') is-invalid @enderror" id="login-password" autocomplete="current-password"  value="{{ old('password') }}" name="password" placeholder="********">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror                       
                        </div>
                        <div class="modal-footer ">
          					        <button type="submit" class="btn btn-primary">Masuk</button>
          					    </div>
                      
                    </form>
                </div>
                @if (Session::has('pesan'))
                <div class="alert alert-danger mt-2">
                    {{ Session::get('pesan') }}
                </div>
                @elseif(Session::has('berhasil'))
                  <div class="alert alert-success mt-2">
                    {{ Session::get('berhasil') }}
                </div>
                @endif
            </div>
        </div>
    </div>

<!-- cara melakukan pengaduan -->
    @if(Auth::guard('masyarakat')->check())
    <div class="container margin">
      <div class="d-md-flex flex-row justify-content-around bd-highlight mb-3">
        <div class="p-2 bd-highlight card ml-auto mr-auto mb-3" style="width: 13rem">
          <i class="fa fa-sign-in fa-5x text-center rounded-circle p-1 mx-5 text-white" aria-hidden="true" style="background: red;"></i>
          <div class="card-body text-center">
            <h5>1. Masuk</h5>
            <p class="card-text">
              Masuk ke akun anda, jika belum punya akun maka Daftar terlebih dahulu. 
            </p>
          </div>
        </div>
        <div class="p-2 bd-highlight card ml-auto mr-auto mb-3" style="width: 13rem">
          <i class="fa fa-pencil-square-o fa-5x text-center " aria-hidden="true"></i>
          <div class="card-body text-center">
            <h5>2.Tulis Laporan</h5>
            <p class="card-text">
              Klik menu laporan, kemudian tulis laporan keluhan Anda dengan jelas.
            </p>
          </div>
        </div>
        <div class="p-2 bd-highlight card ml-auto mr-auto mb-3" style="width: 13rem">
          <i class="fa fa-refresh fa-spin fa-5x text-center rounded-circle p-1 mx-5 text-white" aria-hidden="true" style="background: yellow;"></i>
          <div class="card-body text-center">
            <h5>3. Proses Verifikasi</h5>
            <p class="card-text">
              Tunggu sampai laporan Anda di verifikasi.
            </p>
          </div>
        </div>
        <div class="p-2 bd-highlight card ml-auto mr-auto mb-3" style="width: 13rem">
          <i class="fa fa-puzzle-piece fa-5x text-center" aria-hidden="true"></i>
          <div class="card-body text-center">
            <h5>4. Tindak Lanjut</h5>
            <p class="card-text">
              Laporan Anda sedang dalam tindak lanjut.
            </p>
          </div>
        </div>
        <div class="p-2 bd-highlight card ml-auto mr-auto mb-3" style="width: 13rem">
          <i class="fa fa-check-square-o fa-5x text-center rounded-circle p-3 mx-5 text-white" style="background: green;" aria-hidden="true"></i>
          <div class="card-body text-center">
            <h5>5. Selesai</h5>
            <p class="card-text">
              Laporan pengaduan telah selesai ditindak.
            </p>
          </div>
        </div>
      </div>
    </div>
    @else
        <div class="container ">
      <div class="d-md-flex flex-row justify-content-around bd-highlight mb-3">
        <div class="p-2 bd-highlight card ml-auto mr-auto mb-3" style="width: 13rem">
          <i class="fa fa-sign-in fa-5x text-center rounded-circle p-1 mx-5 text-white" aria-hidden="true" style="background: red;"></i>
          <div class="card-body text-center">
            <h5>1. Masuk</h5>
            <p class="card-text">
              Masuk ke akun anda, jika belum punya akun maka Daftar terlebih dahulu. 
            </p>
          </div>
        </div>
        <div class="p-2 bd-highlight card ml-auto mr-auto mb-3" style="width: 13rem">
          <i class="fa fa-pencil-square-o fa-5x text-center " aria-hidden="true"></i>
          <div class="card-body text-center">
            <h5>2.Tulis Laporan</h5>
            <p class="card-text">
              Klik menu laporan, kemudian tulis laporan keluhan Anda dengan jelas.
            </p>
          </div>
        </div>
        <div class="p-2 bd-highlight card ml-auto mr-auto mb-3" style="width: 13rem">
          <i class="fa fa-refresh fa-spin fa-5x text-center rounded-circle p-1 mx-5 text-white" aria-hidden="true" style="background: yellow;"></i>
          <div class="card-body text-center">
            <h5>3. Proses Verifikasi</h5>
            <p class="card-text">
              Tunggu sampai laporan Anda di verifikasi.
            </p>
          </div>
        </div>
        <div class="p-2 bd-highlight card ml-auto mr-auto mb-3" style="width: 13rem">
          <i class="fa fa-puzzle-piece fa-5x text-center" aria-hidden="true"></i>
          <div class="card-body text-center">
            <h5>4. Tindak Lanjut</h5>
            <p class="card-text">
              Laporan Anda sedang dalam tindak lanjut.
            </p>
          </div>
        </div>
        <div class="p-2 bd-highlight card ml-auto mr-auto mb-3" style="width: 13rem">
          <i class="fa fa-check-square-o fa-5x text-center rounded-circle p-3 mx-5 text-white" style="background: green;" aria-hidden="true"></i>
          <div class="card-body text-center">
            <h5>5. Selesai</h5>
            <p class="card-text">
              Laporan pengaduan telah selesai ditindak.
            </p>
          </div>
        </div>
      </div>
    </div>
    @endauth
    {{-- Section Hitung Pengaduan --}}
  <section>
      <div class="bg-danger mt-5 p-3">
          <div class="text-center">
              <h5 class="medium text-white mt-3">JUMLAH LAPORAN</h5>
              <h2 class="medium text-white">{{$pengaduanAll}}</h2>
          </div>
      </div>
    
  </section>
  
@endsection

@section('js')
    <script>

      @error('username')
        $('#loginModal').modal('show')
      @enderror
      @error('password')
        $('#loginModal').modal('show')
      @enderror
      // hide navbar
      var prevScrollpos = window.pageYOffset;
       window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
    // }if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    //   document.getElementById("navbar").style.top = "0";
    } else {
      document.getElementById("navbar").style.top = "-150px";
    }
      prevScrollpos = currentScrollPos;
  }
  @if (Session::has('pesan'))
   $('#loginModal').modal('show');
   @elseif(Session::has('berhasil'))
      $('#loginModal').modal('show');
    @endif
    </script>
   
@endsection