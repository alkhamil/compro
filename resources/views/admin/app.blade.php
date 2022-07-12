
@php
    $settings = \App\Models\SettingInformation::pluck('value', 'key');
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Panel Admin | {{ $settings['APP_NAME'] }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('storage') . '/' . $settings['PAVICON'] }}" rel="icon">
  <link href="{{ asset('storage') . '/' . $settings['PAVICON'] }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/niceadmin') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('assets/niceadmin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('assets/niceadmin') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('assets/niceadmin') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ asset('assets/niceadmin') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ asset('assets/niceadmin') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('assets/niceadmin') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/niceadmin') }}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @includeIf('admin.partials.header', ['settings' => $settings])
  
  @includeIf('admin.partials.sidebar')

  <main id="main" class="main">

    @yield('content')

  </main><!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/niceadmin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('assets/niceadmin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/niceadmin') }}/assets/vendor/chart.js/chart.min.js"></script>
  <script src="{{ asset('assets/niceadmin') }}/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{ asset('assets/niceadmin') }}/assets/vendor/quill/quill.min.js"></script>
  <script src="{{ asset('assets/niceadmin') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ asset('assets/niceadmin') }}/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ asset('assets/niceadmin') }}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/niceadmin') }}/assets/js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  @yield('script')

</body>

</html>