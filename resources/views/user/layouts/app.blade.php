<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

       
        <link href="{{asset('user-panel/assets/img/logo.svg')}}" rel="icon">
  <link href="{{asset('user-panel/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('user-panel/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('user-panel/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('user-panel/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('user-panel/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('user-panel/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('user-panel/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('user-panel/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('user-panel/assets/font/css/all.css')}}">
  <link rel="stylesheet" href="{{asset('user-panel/assets/font/css/all.min.css')}}">
  <!-- Template Main CSS File -->
  <link href="{{asset('user-panel/assets/css/style.css')}}" rel="stylesheet">

        <!-- Scripts -->
        

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
           
        <x-app-user-include></x-app-user-include>
        <x-assidebaruser></x-assidebaruser>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
        <script src="{{asset('user-panel/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('user-panel/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('user-panel/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('user-panel/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('user-panel/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('user-panel/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('user-panel/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('user-panel/assets/vendor/php-email-form/validate.js')}}"></script>

  <script src="{{asset('user-panel/assets/js/main.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function (e) {
  // Show the first tab by default
  $(".tabs-stage .tabcontent").hide();
  $(".tabs-stage .tabcontent:first").show();
  $(".tabs-nav li:first").addClass("tab-active");

  // Change tab class and display content
  $(".tabs-nav a").on("click", function (event) {
    event.preventDefault();
    $(".tabs-nav li").removeClass("tab-active");
    $(this).parent().addClass("tab-active");
    $(".tabs-stage .tabcontent").hide();
    $($(this).attr("href")).show();
  });
});
  </script>

    </body>
</html>
