@extends('home.app')

@section('content')
<main id="main">
    <!-- =======Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Daftar Guru</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Daftar Guru
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->

    <!-- ======= Agents Grid ======= -->
    <section class="agents-grid grid">
        <div class="container">
            <div class="row">
                @foreach ($teachers as $item)
                <div class="col-md-4">
                    <div class="card-box-d">
                        <div class="card-img-d">
                            <img src="{{ asset('storage') .'/'.$item->image }}" alt="" class="img-d img-fluid">
                        </div>
                        <div class="card-overlay card-overlay-hover">
                            <div class="card-header-d">
                                <div class="card-title-d align-self-center">
                                    <h3 class="title-d">
                                        <a href="{{ route('home.teacher_detail', $item->id) }}" class="link-two">
                                            {{ $item->name }}
                                            <h5>{{ $item->lesson }}</h5>
                                        </a>
                                    </h3>

                                </div>
                            </div>
                            <div class="card-body-d">
                                <p class="content-d color-text-a">
                                    {{ $item->bio }}
                                </p>
                                <div class="info-agents color-a">
                                    <p>
                                        <strong>Phone: </strong> {{ $item->phone }}
                                    </p>
                                    <p>
                                        <strong>Email: </strong> {{ $item->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer-d">
                                <div class="socials-footer d-flex justify-content-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a target="_blank" href="{{ $item['fb'] }}" class="link-one">
                                                <i class="bi bi-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a target="_blank" href="{{ $item['ig'] }}" class="link-one">
                                                <i class="bi bi-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a target="_blank" href="{{ $item['tw'] }}" class="link-one">
                                                <i class="bi bi-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $teachers->links() }}
                </div>
            </div>
        </div>
    </section><!-- End Agents Grid-->

</main><!-- End #main -->
@endsection