@extends('home.app')

@section('content')
<main id="main">
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Profile Sekolah</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Profile
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->

    <!-- ======= Agent Single ======= -->
    <section class="agent-single">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-12 section-md-t3">
                            <div class="agent-info-box">
                                <div class="agent-title">
                                    <div class="title-box-d">
                                        <h3 class="title-d">
                                            Sejarah Singkat

                                        </h3>
                                    </div>
                                    <img width="100" src="{{ asset('storage') .'/'.$settings['LOGO'] }}" alt="">
                                </div>
                                <div class="agent-content mb-3">
                                    <p class="content-d color-text-a">
                                        {!! $settings['ABOUT'] !!}
                                    </p>
                                    <div class="info-agents color-a">
                                        <p>
                                            <strong>Phone: </strong>
                                            <span class="color-text-a"> {{ $settings['PHONE'] }} </span>
                                        </p>
                                        <p>
                                            <strong>Email: </strong>
                                            <span class="color-text-a"> {{ $settings['EMAIL'] }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="socials-footer">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a target="_blank" href="{{ $settings['FB'] }}" class="link-one">
                                                <i class="bi bi-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a target="_blank" href="{{ $settings['IG'] }}" class="link-one">
                                                <i class="bi bi-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a target="_blank" href="{{ $settings['TW'] }}" class="link-one">
                                                <i class="bi bi-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Agent Single -->
</main>
@endsection