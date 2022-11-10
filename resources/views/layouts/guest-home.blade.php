<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Trang chủ</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/themes/FlexStart/assets/img/favicon.png" rel="icon">
  <link href="/themes/FlexStart/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/themes/FlexStart/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/themes/FlexStart/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/themes/FlexStart/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/themes/FlexStart/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/themes/FlexStart/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/themes/FlexStart/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/themes/FlexStart/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.11.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top header-scrolled">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">


      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown"><a href="javascript:void(0)"><span>Dành cho phụ huynh</span><i
                class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="">Danh sách gia sư</a></li>
              <li><a href="">Liên hệ</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="javascript:void(0)"><span>Dành cho gia sư</span><i
                class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('classes.index') }}">Danh sách lớp</a></li>
              <li><a href="">Danh sách trung tâm</a></li>
              <li><a href="">Đăng ký làm gia sư</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="javascript:void(0)"><span>Kết nối</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="https://www.facebook.com/groups/timkiemgiasuhanoi">Nhóm GIA SƯ HÀ NỘI</a></li>
              <li><a href="#">Fanpage Lớp mới</a></li>
            </ul>
          </li>
          {{-- <li><a class="nav-link scrollto" href="#contact">Đăng nhập</a></li> --}}
          <li><a class="getstarted" href="">Đăng nhập</a></li>
          <li></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <h3 class="text-success"><i class="bi bi-telephone-fill"></i><i> 0969 757 418</i></h3>
    </div>
  </header><!-- End Header -->

  @yield('main')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="/themes/FlexStart/assets/img/logo-lopmoi.png" alt="">
              <span>LopMoi</span>
            </a>
            <p>Mang lại giá trị đích thực cho các gia sư. Mang lại giá trị đích thực cho các gia sư. Mang lại giá trị
              đích thực cho các gia sư.</p>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Các trang:</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="/">Trang chủ</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/danh-sach-lop">Danh sách lớp</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/danh-sach-cac-trung-tam">Các trung tâm</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/tao-cv-gia-su">Tạo CV</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/bai-viet">Blog</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Liên kết ngoài</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Group GIA SƯ HÀ NỘI</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Fanpage Lớp Mới</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Kênh youtube Lớp mới</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Liên hệ</h4>
            <p>
              Số nhà 32, Ngõ 1<br>
              Vân Côn, Hoài Đức<br>
              Hà Nội<br><br>
              <strong>SĐT:</strong> 0969 757 418<br>
              <strong>Email:</strong> hotro.lopmoi@gmail.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>LopMoi</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">Nguyễn Đình Tuấn</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/themes/FlexStart/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/themes/FlexStart/assets/vendor/aos/aos.js"></script>
  <script src="/themes/FlexStart/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/themes/FlexStart/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/themes/FlexStart/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/themes/FlexStart/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/themes/FlexStart/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/themes/FlexStart/assets/js/main.js"></script>

</body>

</html>
