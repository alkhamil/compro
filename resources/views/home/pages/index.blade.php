@extends('home.app')

@section('content')

<!-- ======= Intro Section ======= -->
<div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">
        @foreach ($banners as $item)
        <div class="swiper-slide carousel-item-a intro-item bg-image"
            style="background-image: url({{ asset('storage') .'/'.$item->image }})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">
                                        {{ $item->name }}
                                    </p>
                                    <h1 class="intro-title mb-4 ">
                                        {{ $item->desc }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div><!-- End Intro Section -->


<main id="main">

    <!-- ======= Latest News Section ======= -->
    <section class="section-news section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Berita Terbaru</h2>
                        </div>
                        <div class="title-link">
                            <a href="{{ url('blog') }}">Semua Berita
                                <span class="bi bi-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="news-carousel" class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($blogs as $item)
                    <div class="carousel-item-c swiper-slide">
                        <div class="card-box-b card-shadow news-box">
                            <div class="img-box-b">
                                <img src="{{ asset('storage') .'/'.$item->image }}" alt="" class="img-b img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-header-b">
                                    <div class="card-title-b">
                                        <h2 class="title-2">
                                            <a href="{{ route('home.blog_detail', $item->id) }}">{{ $item->title }}</a>
                                        </h2>
                                    </div>
                                    <div class="card-date">
                                        <span class="date-b">{{ date('d M. Y', strtotime($item->created_at)) }}</span><br>
                                        <b>Dibuat oleh: {{ isset($item->user->fullname) ? $item->user->fullname : '-' }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End carousel item -->
                    @endforeach
                </div>
            </div>

            <div class="news-carousel-pagination carousel-pagination"></div>
        </div>
    </section><!-- End Latest News Section -->

    <!-- ======= Agents Section ======= -->
    <section class="section-agents section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Daftar Guru / Pengajar</h2>
                        </div>
                        <div class="title-link">
                            <a href="{{ url('teacher') }}">Semua Guru
                                <span class="bi bi-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
        </div>
    </section><!-- End Agents Section -->



</main><!-- End #main -->

@endsection