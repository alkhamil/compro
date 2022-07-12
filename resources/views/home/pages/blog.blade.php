@extends('home.app')

@section('content')
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Daftar Berita</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Daftar Berita
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->

    <!-- =======  Blog Grid ======= -->
    <section class="news-grid grid">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $item)
                <div class="col-md-4">
                    <div class="card-box-b card-shadow news-box">
                        <div class="img-box-b">
                            <img src="{{ asset('storage') .'/'.$item->image }}" alt="" class="img-b img-fluid">
                        </div>
                        <div class="card-overlay">
                            <div class="card-header-b">
                                <div class="card-title-b">
                                    <h2 class="title-2">
                                        <a href="{{ route('home.blog_detail', $item->title) }}">{{ $item->title }}</a>
                                    </h2>
                                </div>
                                <div class="card-date">
                                    <span class="date-b">{{ date('d M. Y', strtotime($item->created_at)) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </section><!-- End Blog Grid-->

</main><!-- End #main -->
@endsection