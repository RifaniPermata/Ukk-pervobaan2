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

        <a class="navbar-brand" href="#"><img src="{{ config('app.url') }}/assets/images/logo.png" style="max-width: 50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <p class="nav-link text-white" style="font-size: 1rem;"><b>PERAKAT</b><br> Pengaduan masyarakat</p>
            </li>

          </ul>
        </div>
  </nav>

</section>


{{-- Section Card Pengaduan --}}
 <main>
    <section>

          <div class="jumbotron mb-0 rounded-0" style="background-image: url('{{config('app.url')}}/assets/images/bg.jpg');background-position:center;min-height: 640px;">
            <div class="row justify-content-center" style="margin-top: 100px">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        Verifikasi Email Berhasil
                    </div>
                    <div class="card-body">
                        <p>Sekarang Anda bisa mengirimkan pengaduan di website PERAKAT. Dan akun Anda sudah aman sekarang.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('view.index') }}" class="float-right btn btn-primary">Masuk ke Akun</a>
                        
                    </div>
                </div>
            </div>
        </div>
          </div>
    </section>
</main>
  
@endsection
