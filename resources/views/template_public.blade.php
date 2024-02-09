<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Gestion de Cursos</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ url('/') }}/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/demo.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <script src="{{ url('/') }}/assets/vendor/js/helpers.js"></script>
    <script src="{{ url('/') }}/assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                    <a class="navbar-brand" href="#"><i class='bx bxs-user-circle mb-1'></i> @php
                        echo session('patient')
                    @endphp</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><i class='bx bxs-home mb-1'></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <i class='bx bxs-book-bookmark mb-1'></i> Programa tu cita</a>
                        </li>
                        </ul>
                        {{-- isset(), empty() --}}
                        @if (!empty(session('patient')))
                            <form action="{{route('cerrar_sesion')}}" method="POST">
                                @method('GET')
                                <button class="btn btn-danger"><i class='bx bx-user-x'></i>Cerrar Sesion</button>
                            </form>
                        @else
                            <a href="{{url('/Login')}}" class="btn btn-info"><i class='bx bxs-user-check'></i>Iniciar Sesion</a>
                        @endif
                    </div>
                    </div>
                </nav>
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Promociones /</span> Disponibles</h4>
                                        <!-- Grid Card -->
                                        <div class="row mb-5">
                                            <div class="col-md-6 col-lg-4 mb-3">
                                              <div class="card h-100">
                                                <img class="card-img-top" src="{{asset('assets/img/elements/d.jpg')}}" alt="Card image cap" />
                                                <div class="card-body">
                                                  <h5 class="card-title">Descuentos de temporada</h5>
                                                  <p class="card-text">
                                                    Por inicio de año estaremos enlistando los descuentos del mes.
                                                  </p>
                                                  <button class="btn btn-primary"><i class='bx bxs-detail'></i> Ver más...</button>
                                                        @if (!empty(session('patient')))
                                                            <button class="btn btn-secondary"><i class='bx bxs-badge-check'></i> Agendar Cita
                                                            </button>
                                                        @endif
                                                </div>
                                              </div>
                                            </div>                      
                    <!--/ Card layout -->
                </div>
                <!-- / Content -->
                    <!-- Footer -->
                    @include('modulos.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('/') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ url('/') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ url('/') }}/assets/vendor/js/menu.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/masonry/masonry.js"></script>
    <script src="{{ url('/') }}/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>