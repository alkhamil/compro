<!-- ======= Footer ======= -->
<section class="section-footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="widget-a text-center">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">{{ $settings['APP_NAME'] }}</h3>
                    </div>
                    <div class="w-body-a">
                        <p class="w-text-a color-text-a">
                            {{ $settings['ADDRESS'] }}
                        </p>
                    </div>
                    <div class="w-footer-a">
                        <ul class="list-unstyled">
                            <li class="color-a">
                                <span class="color-text-a">Phone :</span> {{ $settings['PHONE'] }}
                            </li>
                            <li class="color-a">
                                <span class="color-text-a">Email :</span> {{ $settings['EMAIL'] }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="socials-a">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a target="_blank" href="{{ $settings['FB'] }}">
                                <i class="bi bi-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a target="_blank" href="{{ $settings['IG'] }}">
                                <i class="bi bi-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a target="_blank" href="{{ $settings['TW'] }}">
                                <i class="bi bi-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="copyright-footer">
                    <p class="copyright color-text-a">
                        &copy; Copyright
                        <span class="color-a">{{ $settings['APP_NAME'] }}</span> All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- End  Footer -->