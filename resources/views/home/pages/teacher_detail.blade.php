@extends('home.app')

@section('content')
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{ $teacher->name }}</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Detail
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single -->

    <!-- ======= Agent Single ======= -->
    <section class="agent-single">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="agent-avatar-box">
                                <img src="{{ asset('storage') .'/'.$teacher->image }}" alt="" class="agent-avatar img-fluid">
                            </div>
                        </div>
                        <div class="col-md-5 section-md-t3">
                            <div class="agent-info-box">
                                <div class="agent-title">
                                    <div class="title-box-d">
                                        <h3 class="title-d">
                                            {{ $teacher->name }}
                                            <h5>{{ $teacher->lesson }}</h5>
                                        </h3>
                                    </div>
                                </div>
                                <div class="agent-content mb-3">
                                    <p class="content-d color-text-a">
                                        {{ $teacher->bio }}
                                    </p>
                                    <div class="info-agents color-a">
                                        <p>
                                            <strong>Phone: </strong>
                                            <span class="color-text-a"> {{ $teacher->phone }} </span>
                                        </p>
                                        <p>
                                            <strong>Email: </strong>
                                            <span class="color-text-a"> {{ $teacher->email }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="socials-footer">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a target="_blank" href="{{ $teacher->fb }}" class="link-one">
                                                <i class="bi bi-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a target="_blank" href="{{ $teacher->ig }}" class="link-one">
                                                <i class="bi bi-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a target="_blank" href="{{ $teacher->tw }}" class="link-one">
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

</main><!-- End #main -->
@endsection