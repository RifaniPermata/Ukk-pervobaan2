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
             @else
            {{-- @guest --}}
              <div class="d-inline">
                <button class="btn d-inline text-white" data-toggle="modal" data-target="#loginModal">Masuk</button>
              </div>
              <div class="d-inline">
                <a href="{{ route('formRegister') }}" class="btn text-white">Daftar</a>

              </div>
             @endauth
            
            
          </div>
        </div>
  </nav>
</section>

{{-- Section Card Pengaduan --}}
 <main>
    <section>
          <div class="jumbotron mb-0 rounded-0" style="background-image: url('assets/images/bg.jpg');background-position:center;min-height: 435px;">

            <div class="row justify-content-md-center" style="margin-top: 100px;">
              
              <div class="card p-4 text-dark">
                <div class="title mb-3">
                    <h5 class="text-dark text-center">Sebelum melanjutkan, harap lengkapi data berikut !</h5>
                </div>
                  <div class="col-md-12 ml-auto">
                    <form method="POST" action="{{ route('formRegister') }}">
                        @csrf
                        <div class="form-group">
                        	<label for="nama">NIK</label>
                            <input type="text" name="nik" placeholder="321xxxxxxxxxxxxx" class="form-control">
                        </div>
    	                <div class="form-group">
    	                    <label for="nama">Nama Lengkap</label>
    	                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="name" placeholder="Nama Lengkap" autofocus>
    	                    @error('nama')
    	                        <span class="invalid-feedback" role="alert">
    	                            <strong>{{ $message }}</strong>
    	                        </span>
    	                    @enderror
    	                </div>
    	                <div class="form-group">
    	                	<label for="nama">Username</label>
                            <input type="text" name="username" placeholder="Username" class="form-control">
                        </div>
                      	<div class="form-group">
    	                	<label for="nama">No. Telp</label>
                            <input type="text" name="telp" placeholder="No. Telp" class="form-control">
                        </div>
                      
                      <button type="submit" class="btn btn-primary btn-block text-white ml-auto">Daftar</button>
                    </form>
                  </div>
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
      document.getElementById("navbar").style.top = "-150px";
    }
  }
  @if (Session::has('pesan'))
   $('#loginModal').modal('show');
   @elseif(Session::has('berhasil'))
      $('#loginModal').modal('show');
    @endif
    </script>
   

@endsection