<!-- ======= Header/Navbar ======= -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false"
            aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="navbar-brand text-brand d-flex align-items-center" style="gap: 10px" href="{{ url('/') }}">
            <img src="{{ asset('storage') .'/'.$settings['LOGO'] }}" width="50" alt="logo">
            {{ $settings['APP_NAME'] }}
        </a>

        <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link @if (request()->is('/')) active @endif" href="{{ url('/') }}">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if (request()->is('profile')) active @endif" href="{{ url('/profile') }}">Profile</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if (request()->is('information')) active @endif" href="{{ url('/information') }}">Informasi Sekolah</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if (request()->is('blog')) active @endif" href="{{ url('/blog') }}">Berita</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link @if (request()->is('contact')) active @endif" href="{{ url('/contact') }}">Kontak</a>
                </li>
            </ul>
        </div>

    </div>
</nav><!-- End Header/Navbar -->