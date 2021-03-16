@extends('layouts.LayoutIndex')

@section('css')
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
@endsection

@section('title', 'PERAKAT - Pengaduan Masyarakat')

@section('content')
{{-- Section Header --}}
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

          <div >
          	 @if(Auth::guard('masyarakat')->check())
             <div class="d-inline">
                <a href="{{ route('view.index') }}" class="btn text-white">Home</a>             
             </div>
          	 <div class="d-inline">
                <a href="{{ route('laporan') }}" class="btn text-white">Laporan</a>          	 	
          	 </div>
          	  <div class="d-inline">
                <a href="{{ route('logout') }}" class="btn text-white">{{ Auth::guard('masyarakat')->user()->nama }}</a>      	 	
          	 </div>
          	 @else
            @guest
              <div class="d-inline">
                <button class="btn d-inline text-white" data-toggle="modal" data-target="#loginModal">Masuk</button>
              </div>
              <div class="d-inline">
                <a href="{{ route('formRegister') }}" class="btn text-white">Daftar</a>

              </div>
            @else
              <div class="d-inline">
                <a href="#" class="btn text-white" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="#" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            @endguest
             @endauth
            
            
          </div>
        </div>
      </nav>
{{-- Section Card Pengaduan --}}
 <main>
    <section>
          <div class="jumbotron" style="background-image: url('assets/images/bg.jpg'); min-height: 635px; background-position: center;">

            <div class="row container" style="margin-top: 100px;">
              @if(Auth::guard('masyarakat')->check())
                <p class="display-3 text-white text-center" style="color: #fff !important">Selamat Datang,{{ Auth::guard('masyarakat')->user()->nama }}. <br> Di Layanan Pengaduan Masyarakat Online</p>
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
                            <a href="#" class="btn btn-block btn-primary">
                               <i class="fa fa-facebook mr-1"></i>Facebook
                            </a>  
                        </div>
                        <div class="col-md-6  ">
                            <a href="#" class="btn btn-block btn-danger">
                            	<i class="fa fa-google mr-1"></i>Google+
                            </a>
                        </div>                          
                    </div> 
                <p class="p-2 text-white text-center">- atau -</p>
                <form method="POST" action="{{ route('formRegister') }}">
                    @csrf
                    <div class="form-group">
                    	<label for="nama" style="color: #fff !important">NIK</label>
                        <input type="number" name="nik" placeholder="NIK" class="form-control">
                    </div>
	                <div class="form-group">
	                    <label for="nama" style="color: #fff !important">Nama Lengkap</label>
	                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="name" placeholder="Nama Lengkap" autofocus>
	                    @error('nama')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
	                </div>
	                <div class="form-group">
	                	<label for="nama" style="color: #fff !important">Username</label>
                        <input type="text" name="username" placeholder="Username" class="form-control">
                    </div>
	                <div class="form-group">
	                    <label for="email" style="color: #fff !important">Email</label>
	                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="youremail@gmail.com" name="email" value="{{ old('email') }}" required autocomplete="email">
	                    @error('email')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
                  	</div>
                  	<div class="form-group">
	                	<label for="nama" style="color: #fff !important">No. Telp</label>
                        <input type="number" name="telp" placeholder="No. Telp" class="form-control">
                    </div>
				  	       <div class="row">
                      	<div class="col-md-6">
                            <div class="form-group">
                                <label for="register-password" style="color: #fff !important">register-password</label>
                                <input id="register-password" type="password" class="form-control @error('register-password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="********">
                                @error('register-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                  
                      	</div>
                      	<div class="col-md-6">
                          <div class="form-group">
                            <label for="password-confirm" style="color: #fff !important">Konfirmasi Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="********">
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
                            <a href="#" class="btn btn-block btn-primary">
                               <i class="fa fa-facebook mr-1"></i>Facebook
                            </a>  
                        </div>
                        <div class="col-md-6  ">
                            <a href="#" class="btn btn-block btn-danger">
                            	<i class="fa fa-google mr-1"></i>Google+
                            </a>
                        </div>                          
                    </div> 
                	<p class="p-2 text-center">- atau -</p>
                     <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="login-username" >Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="login-username" placeholder="username" autocomplete="username" autofocus name="username">    
                            @error('username')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror                     
                        </div>
                        <div class="form-group">
                            <label for="login-password" >Password</label>
                            <input type="password"  class="form-control @error('password') is-invalid @enderror" id="login-password" autocomplete="current-password" name="password" placeholder="********">
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
    <div class="container">
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
    {{-- Section Hitung Pengaduan --}}
    <div class="bg-danger mt-5 p-3">
            <div class="text-center">
                <h5 class="medium text-white mt-3">JUMLAH LAPORAN ANDA SEKARANG</h5>
                <h2 class="medium text-white">10</h2>
            </div>
    </div>
    {{-- Footer --}}
	<footer class="text-center p-4 text-white bg-secondary ml-auto mt-5">
      © 2021 PERAKAT | By
      <a href="#" class="text-blue-200" target="_blank">@rfni_p</a>
    </footer>
    @endsection

@section('js')
    <script>

      @error('username')
        $('#loginModal').modal('show')
      @enderror

       window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("navbar").style.top = "0";
    } else {
      document.getElementById("navbar").style.top = "-70px";
    }
  }
  @if (Session::has('pesan'))
   $('#loginModal').modal('show');
   @elseif(Session::has('berhasil'))
      $('#loginModal').modal('show');
    @endif
    </script>
   

@endsection