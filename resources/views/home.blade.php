<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion de citas</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('/') }}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/demo.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="{{ url('/') }}/assets/vendor/js/helpers.js"></script>
    <script src="{{ url('/') }}/assets/js/config.js"></script>
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Aside -->
            @include('modulos.aside')

            <div class="layout-page">
                <!-- Nav -->
                @include('modulos.nav')
                <div class="content-wrapper">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <!-- Contenido dinamico -->
                            @yield('contenido-dinamico')

                            <div class="row">
                                <div class="col-lg-8 mb-4 order-0">
                                  <div class="card">
                                    <div class="d-flex align-items-end row">
                                      <div class="col-sm-7">
                                        <div class="card-body">
                                          <h5 class="card-title text-primary">Bienvenido 🎉</h5> 
                                          <p class="mb-4">Accede a todos los apartados.</span> Registra nuevos Doctores, pacientes y sobre todo consultas.</p>
                              
                                          <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> -->
                                        </div>
                                      </div>
                                      <div class="col-sm-5 text-center text-sm-left">
                                        <div class="card-body pb-0 px-0 px-md-4">
                                          <img src="{{asset('assets/img/illustrations/man-with-laptop-light.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                        </div>
                    @include('modulos.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
</body>
<script src="{{ url('/') }}/assets/vendor/libs/jquery/jquery.js"></script>
<script src="{{ url('/') }}/assets/vendor/libs/popper/popper.js"></script>
<script src="{{ url('/') }}/assets/vendor/js/bootstrap.js"></script>
<script src="{{ url('/') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{ url('/') }}/assets/vendor/js/menu.js"></script>
<script src="{{ url('/') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="{{ url('/') }}/assets/js/main.js"></script>
<script src="{{ url('/') }}/assets/js/dashboards-analytics.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
@stack('scripts')
</html>
