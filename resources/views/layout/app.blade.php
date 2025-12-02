<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Deportes - Anthony Morales</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('impact/assets/img/xd.png') }}" rel="apple-touch-icon">
  <link href="{{ asset('impact/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Bootstrap / Vendor CSS -->
  <link href="{{ asset('impact/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('impact/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('impact/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('impact/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('impact/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <!-- File Input -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.4/css/fileinput.min.css">

  <!-- Main CSS -->
  <link href="{{ asset('impact/assets/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page">

  <!-- ====== HEADER ====== -->
  <header id="header" class="header fixed-top">
    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center">
            <a href="mailto:catotantony@gmail.com">catotantony@gmail.com</a>
          </i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+593 959519753</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="https://www.facebook.com/ilyanthoo/" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/i4nthoo/" class="instagram"><i class="bi bi-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="branding d-flex align-items-cente">
      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
          <h1 class="sitename">Hello Athletes</h1>
          <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('deportistas.index') }}" class="active">Athletes</a></li>
            <li><a href="{{ route ('paises.index') }}">Country</a></li>
            <li><a href="{{ route('disciplinas.index') }}">Discipline</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </div>
  </header>

  <!-- ====== HERO ====== -->
  <section id="hero" class="hero section accent-background">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-5 justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2>Welcome to Web Page Athletes</h2>
          <div class="d-flex">
            <a href="{{ route('deportistas.create') }}" class="btn-get-started">Get Started</a>
            <a href="https://youtu.be/wIkfe5WuHWs" class="glightbox btn-watch-video d-flex align-items-center">
              <i class="bi bi-play-circle"></i><span>Watch Video</span>
            </a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2">
          <img src="{{ asset('impact/assets/img/fondo.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- ====== CONTENIDO ====== -->
  <main class="main container py-4">
      @yield('contenido')
  </main>

  <!-- ====== FOOTER ====== -->
  <footer id="footer" class="footer accent-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="#" class="logo d-flex align-items-center">
            <span class="sitename">Impact</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra...</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Privacy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p>United States</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
      <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- ========= SCRIPTS ========= -->

  <!-- jQuery PRIMERO -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <!-- Bootstrap -->
  <script src="{{ asset('impact/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Vendor JS -->
  <script src="{{ asset('impact/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('impact/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('impact/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('impact/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('impact/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('impact/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- php-email-form -->
  <script src="{{ asset('impact/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- File Input -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.4/js/fileinput.min.js"></script>

  <!-- Validate -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/localization/messages_es.min.js"></script>

  <!-- Main JS -->
  <script src="{{ asset('impact/assets/js/main.js') }}"></script>

  @stack('scripts')

  <style>
        .error {
        color: red;
        font-family: 'Montserrat';
        }
        
        .form-control.error {
        border: 1px solid red;
        }
    </style>

  @if (session('success'))
  <script>
    Swal.fire({
        title: '¡ÉXITO!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
  </script>
  @endif

  @if (session('error'))
  <script>
    Swal.fire({
        title: '¡ERROR!',
        text: '{{ session('error') }}',
        icon: 'error',
        confirmButtonText: 'OK'
    });
  </script>
  @endif

</body>
</html>
