<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Impact Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/45c38953bc.js" crossorigin="anonymous"></script>
    
  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact
  * Updated: Jan 30 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap");
* {
  font-family: "Poppins", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
  outline: none;
  border: none;
  text-transform: capitalize;
  transition: all 0.2s linear;
}
.header .icons div:hover, .header .icons a:hover {
  color: #00baf2 !important;
}
html {
  font-size: 62.5%;
  overflow-x: hidden;
}

section {
  padding: 2rem 9%;
}

.heading {
  text-align: center;
  background: #00baf2;
}
.heading h1 {
  font-size: 3rem;
  text-transform: uppercase;
  color: #fff;
}
.heading p {
  color: #fff;
  padding-top: 0.7rem;
  font-size: 1.7rem;
}
.heading p a {
  color: #fff;
}
.heading p a:hover {
  color: #333;
}

.title {
  font-size: 3rem;
  color: #333;
  margin-bottom: 2rem;
  text-align: center;
  padding: 0 1rem;
}

.btn {
  display: inline-block;
  margin-top: 1rem;
  padding: 0.8rem 2.8rem;
  font-size: 1.7rem;
  color: #333;
  border: 0.2rem solid #333;
  background: none;
  cursor: pointer;
  border-radius: 0.5rem;
}
.btn:hover {
  background: #333;
  color: #fff;
}

.header {
  position: sticky;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  background: #fff;
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
  display: flex;
  align-items: center;
  padding: 0 9%;
  
}
.header .logo {
  font-size: 2.5rem;
  color: #333;
  font-weight: bolder;
  margin-right: auto;
}
.header .navbar ul {
  list-style: none;
}
.header .navbar ul li {
  position: relative !important;
  float: left;
}
.header .navbar ul li:hover ul {
  display: block;
  text-decoration: none !important;
}
.header .navbar ul li a {
  font-size: 1.7rem;
  color: #666;
  padding: 2rem;
  display: block;
}
.header .navbar ul li a:hover {
  background: #eee;
  color: #00baf2;
}
.header .navbar ul li ul {
  position: absolute;
  left: 0;
  width: 20rem;
  background: #fff;
  display: none;
}
.header .navbar ul li ul li {
  width: 100%;
}
.header .icons div,
.header .icons a {
  font-size: 2.5rem;
  color: #333;
  cursor: pointer;
  margin-left: 2rem;
}
.header .search-form {
  position: absolute;
  top: 99%;
  left: 0;
  right: 0;
  border-top: 0.2rem solid #333;
  background: #fff;
  height: 6rem;
  display: flex;
  align-items: center;
  padding: 2rem;
  -webkit-clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
          clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
}
.header .search-form.active {
  -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
          clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
}
.header .search-form input {
  width: 100%;
  height: 100%;
  padding-right: 1rem;
  font-size: 1.7rem;
  color: #666;
  text-transform: none;
}
.header .search-form label {
  font-size: 2.5rem;
  color: #333;
  cursor: pointer;
}
.header .search-form label:hover {
  color: #00baf2;
}

#menu-btn {
  display: none;
}

@keyframes fadeIn {
  0% {
    transform: translateY(3rem);
    opacity: 0;
  }
}
.home {
  padding: 0;
  position: relative;
}
.home .slide {
  display: flex;
  min-height: 60vh;
  padding: 2rem 7%;
  background-size: cover !important;
  background-position: center !important;
  display: flex;
  align-items: center;
  display: none;
}
.home .slide.active {
  display: flex;
}
.home .slide .content span {
  color: #333;
  display: block;
  font-size: 2rem;
  animation: fadeIn 0.4s linear 0.2s backwards;
}
.home .slide .content h3 {
  color: #333;
  text-transform: uppercase;
  padding: 1rem 0;
  font-size: 6rem;
  animation: fadeIn 0.4s linear 0.4s backwards;
}
.home .slide .content .btn {
  animation: fadeIn 0.4s linear 0.6s backwards;
}
.home #next-slide,
.home #prev-slide {
  position: absolute;
  bottom: 2rem;
  right: 2rem;
  height: 6rem;
  width: 6rem;
  line-height: 5.5rem;
  font-size: 4rem;
  color: #333;
  border: 0.2rem solid #333;
  background: #fff;
  border-radius: 0.5rem;
  cursor: pointer;
  text-align: center;
}
.home #next-slide:hover,
.home #prev-slide:hover {
  background: #333;
  color: #fff;
}
.home #prev-slide {
  right: 9rem;
}

.banner {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(31rem, 1fr));
  gap: 1.5rem;
}
.banner .box {
  position: relative;
  height: 30rem;
  overflow: hidden;
  border-radius: 0.5rem;
}
.banner .box:hover img {
  transform: scale(1.1);
}
.banner .box img {
  height: 100%;
  width: 100%;
  -o-object-fit: cover;
     object-fit: cover;
}
.banner .box .content {
  position: absolute;
  top: 50%;
  right: 2rem;
  transform: translateY(-50%);
}
.banner .box .content span {
  font-size: 1.5rem;
  color: #333;
}
.banner .box .content h3 {
  font-size: 2rem;
  color: #333;
  padding-top: 1rem;
}
.banner .box .content .btn {
  padding: 0.6rem 2rem;
  font-size: 1.5rem;
}

.products .box-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(32rem, 1fr));
  gap: 1.5rem;
}
.products .box-container .box {
  border-radius: 0.5rem;
  text-align: center;
  border: 0.2rem solid #333;
}
.products .box-container .box:hover .image .icons {
  transform: translateY(0);
}
.products .box-container .box .image {
  border-radius: 0.5rem;
  overflow: hidden;
  position: relative;
  height: 25rem;
  width: 100%;
}
.products .box-container .box .image .icons {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  border-bottom: 0.2rem solid #333;
  transform: translateY(-7rem);
}
.products .box-container .box .image .icons a {
  height: 5rem;
  width: 5rem;
  line-height: 5rem;
  font-size: 2rem;
  color: #333;
}
.products .box-container .box .image .icons a:hover {
  background: #333;
  color: #fff;
}
.products .box-container .box .image img {
  height: 100%;
  width: 100%;
  -o-object-fit: cover;
     object-fit: cover;
}
.products .box-container .box .content {
  padding: 1.5rem 0;
}
.products .box-container .box .content h3 {
  font-size: 2rem;
  color: #333;
}
.products .box-container .box .content .stars {
  padding: 1rem 0;
}
.products .box-container .box .content .stars i {
  font-size: 1.4rem;
  color: #00baf2;
}
.products .box-container .box .content .price {
  font-size: 2.2rem;
  color: #333;
}
.products .box-container .box .content .price span {
  font-size: 1.5rem;
  text-decoration: line-through;
  color: #666;
}

.about .row {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  gap: 2rem;
}
.about .row .image {
  flex: 1 1 42rem;
}
.about .row .image img {
  width: 100%;
  border-radius: 0.5rem;
}
.about .row .content {
  flex: 1 1 42rem;
}
.about .row .content h3 {
  font-size: 3.5rem;
  color: #333;
  line-height: 2;
}
.about .row .content p {
  font-size: 1.4rem;
  line-height: 2.5;
  color: #666;
  padding: 1rem 0;
}
.about .icons-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(16rem, 1fr));
  gap: 1.5rem;
  margin-top: 2.5rem;
}
.about .icons-container .icons {
  padding: 3rem 2rem;
  border-radius: 0.5rem;
  border: 0.2rem solid #333;
  text-align: center;
  cursor: pointer;
}
.about .icons-container .icons:hover {
  background: #333;
}
.about .icons-container .icons:hover img {
  filter: invert(1);
}
.about .icons-container .icons:hover h3 {
  color: #fff;
}
.about .icons-container .icons img {
  height: 7rem;
  margin-bottom: 1rem;
}
.about .icons-container .icons h3 {
  font-size: 1.7rem;
  color: #333;
}

.blogs .box-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(32rem, 1fr));
  gap: 1.5rem;
}
.blogs .box-container .box {
  border-radius: 0.5rem;
  overflow: hidden;
  border: 0.2rem solid #333;
}
.blogs .box-container .box:hover .image img {
  transform: scale(1.1);
}
.blogs .box-container .box .image {
  width: 100%;
  height: 25rem;
  overflow: hidden;
}
.blogs .box-container .box .image img {
  height: 100%;
  width: 100%;
  -o-object-fit: cover;
     object-fit: cover;
}
.blogs .box-container .box .content {
  padding: 2rem;
}
.blogs .box-container .box .content h3 {
  font-size: 2rem;
  color: #333;
  line-height: 2;
}
.blogs .box-container .box .content p {
  font-size: 1.4rem;
  line-height: 2.5;
  color: #666;
  padding: 1rem 0;
}
.blogs .box-container .box .content .icons {
  border-top: 0.2rem solid #333;
  padding-top: 2rem;
  margin-top: 2rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.blogs .box-container .box .content .icons a {
  font-size: 1.4rem;
  color: #666;
}
.blogs .box-container .box .content .icons a:hover {
  color: #00baf2;
}
.blogs .box-container .box .content .icons a i {
  padding-right: 0.5rem;
  color: #00baf2;
}

.contact .row {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
}
.contact .row form {
  flex: 1 1 42rem;
  padding: 2rem;
  border-radius: 0.5rem;
  border: 0.2rem solid #333;
}
.contact .row form .box, .contact .row form textarea {
  width: 100%;
  border-bottom: 0.2rem solid #333;
  margin-bottom: 1rem;
  padding: 1rem 0;
  font-size: 1.6rem;
  color: #666;
  text-transform: none;
}
.contact .row form textarea {
  height: 15rem;
  resize: none;
}
.contact .row .map {
  flex: 1 1 42rem;
  border-radius: 0.5rem;
  width: 100%;
}

.login-form form,
.register-form form {
  margin: 1rem auto;
  max-width: 40rem;
  border-radius: 0.5rem;
  border: 0.2rem solid #333;
  padding: 2rem;
  text-align: center;
}
.login-form form h3,
.register-form form h3 {
  font-size: 2.2rem;
  text-transform: uppercase;
  color: #333;
  margin-bottom: 0.7rem;
}
.login-form form .inputBox,
.register-form form .inputBox {
  margin: 1rem 0;
  display: flex;
  border-radius: 0.5rem;
  background: #eee;
  padding: 0.5rem 1rem;
  align-items: center;
  gap: 1rem;
}
.login-form form .inputBox span,
.register-form form .inputBox span {
  color: #666;
  margin-left: 1rem;
  font-size: 2rem;
}
.login-form form .inputBox input,
.register-form form .inputBox input {
  width: 100%;
  padding: 1rem;
  background: none;
  font-size: 1.5rem;
  color: #666;
  text-transform: none;
}
.login-form form .flex,
.register-form form .flex {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 1rem 0;
  margin-top: 1rem;
}
.login-form form .flex label,
.register-form form .flex label {
  font-size: 1.5rem;
  cursor: pointer;
  color: #666;
}
.login-form form .flex a,
.register-form form .flex a {
  font-size: 1.5rem;
  color: #666;
  margin-left: auto;
}
.login-form form .flex a:hover,
.register-form form .flex a:hover {
  color: #00baf2;
}
.login-form form input[type=submit],
.register-form form input[type=submit] {
  background: #333;
  color: #fff;
}
.login-form form input[type=submit]:hover,
.register-form form input[type=submit]:hover {
  background: #00baf2;
}
.login-form form .btn,
.register-form form .btn {
  width: 100%;
}

.shopping-cart .box-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(32rem, 1fr));
  gap: 1.5rem;
  margin-bottom: 2rem;
}
.shopping-cart .box-container .box {
  border-radius: 0.5rem;
  border: 0.2rem solid #333;
  padding: 3rem 2rem;
  position: relative;
  display: flex;
  align-items: center;
  gap: 1.5rem;
}
.shopping-cart .box-container .box .fa-times {
  position: absolute;
  top: 1rem;
  right: 1.5rem;
  font-size: 2.5rem;
  cursor: pointer;
  color: #666;
}
.shopping-cart .box-container .box .fa-times:hover {
  color: #00baf2;
}
.shopping-cart .box-container .box img {
  height: 10rem;
}
.shopping-cart .box-container .box .content h3 {
  font-size: 1.7rem;
  padding-bottom: 0.5rem;
  color: #333;
}
.shopping-cart .box-container .box .content form {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 1rem 0;
}
.shopping-cart .box-container .box .content form span {
  color: #666;
  font-size: 1.5rem;
}
.shopping-cart .box-container .box .content form input {
  width: 8rem;
  font-size: 1.5rem;
  color: #666;
  padding: 0.5rem 1rem;
  border-radius: 0.5rem;
  background: #eee;
}
.shopping-cart .box-container .box .content .price {
  font-size: 2rem;
  color: #333;
}
.shopping-cart .box-container .box .content .price span {
  color: #666;
  font-size: 1.5rem;
  text-decoration: line-through;
}
.shopping-cart .cart-total {
  padding: 2rem;
  border-radius: 0.5rem;
  border: 0.2rem solid #333;
}
.shopping-cart .cart-total h3 {
  margin-bottom: 1rem;
  font-size: 2rem;
  color: #333;
}
.shopping-cart .cart-total h3 span {
  color: #00baf2;
}


.footer .box-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(22rem,1fr));
  gap: 1.5rem;
}
.footer .box-container .box h3 {
  font-size: 2.2rem;
  color: #333;
  padding: 1rem 0;
}
.footer .box-container .box a {
  display: block;
  font-size: 1.4rem;
  color: #666;
  padding: 1rem 0;
}
.footer .box-container .box a:hover {
  color: #00baf2;
}
.footer .box-container .box a:hover i {
  padding-right: 2rem;
}
.footer .box-container .box a i {
  color: #00baf2;
  padding-right: 0.5rem;
}
.footer .box-container .box p {
  font-size: 1.5rem;
  color: #666;
  margin-bottom: 1rem;
}
.footer .box-container .box form input[type=email] {
  width: 100%;
  padding: 1rem 1.2rem;
  border-radius: 0.5rem;
  background: #eee;
  font-size: 1.6rem;
  text-transform: none;
  margin: 0.5rem 0;
}
.footer .credit {
  text-align: center;
  padding: 1rem;
  padding-top: 2.5rem;
  margin-top: 2.5rem;
  font-size: 2rem;
  color: #666;
  border-top: 0.2rem solid #333;
}
.footer .credit span {
  color: #00baf2;
}

@media (max-width: 1200px) {
  html {
    font-size: 55%;
  }
  .header {
    padding: 0 2rem;
  }
  section {
    padding: 2rem;
  }
}
@media (max-width: 768px) {
  #menu-btn {
    display: inline-block;
  }
  .header {
    padding: 2rem;
  }
  .header .navbar {
    position: absolute;
    top: 99%;
    left: 0;
    right: 0;
    background: #fff;
    -webkit-clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
            clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
  }
  .header .navbar.active {
    -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
  }
  .header .navbar ul li {
    width: 100%;
  }
  .header .navbar ul li ul {
    position: relative;
    width: 100%;
  }
  .header .navbar ul li ul li a {
    padding-left: 4rem;
  }
}
@media (max-width: 450px) {
  html {
    font-size: 50%;
  }
  .home .slide .content h3 {
    font-size: 4rem;
  }
  .shopping-cart .box-container .box {
    flex-flow: column;
  }
}/*# sourceMappingURL=style.css.map */

 
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header class="header" style="text-decoration:none;">



        <a href="home.html" class="logo"> SwiftPay<span style="font-size:3rem;" class="fa-brands fa-swift"></span> </a>

        <nav class="navbar">
            <ul>
                <li><a href="home.html">home</a></li>
                <!--<li><a href="#">pages +</a>
                    <ul>
                        <li><a href="about.html">about</a></li>
                        <li><a href="blogs.html">blogs</a></li>
                    </ul>
                </li>-->
                <li><a href="about.php">about</a></li>
                <li><a href="contact-us.php">contact</a></li>
                <li><a href="#">account +</a>
                    <ul>
                        <li><a href="login.php">login</a></li>
                        <li><a href="register.php">register</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" style="display:none;" class="fas fa-search"></div>
            <!--<a href="cart.php" class="fas fa-shopping-cart"></a>-->
            <a href="profile.php" class="fa-regular fa-user"></a>
        </div>

    </header>

  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Welcome to <span>Impact</span></h2>
          <p>Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started">Get Started</a>
            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-easel"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Lorem Ipsum</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-gem"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Sed ut perspiciatis</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-geo-alt"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Magni Dolores</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-command"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Nemo Enim</a></h4>
            </div>
          </div><!--End Icon Box -->

        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
   
    <!-- ======= Clients Section ======= -->
    
    <!-- ======= Stats Counter Section ======= -->
    
    <!-- ======= Call To Action Section ======= -->
    
    <!-- ======= Our Services Section ======= -->
    <section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Services</h2>
          <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
        </div>

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="bi bi-activity"></i>
              </div>
              <h3>Nesciunt Mete</h3>
              <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-broadcast"></i>
              </div>
              <h3>Eosle Commodi</h3>
              <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <h3>Ledo Markt</h3>
              <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-bounding-box-circles"></i>
              </div>
              <h3>Asperiores Commodit</h3>
              <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-calendar4-week"></i>
              </div>
              <h3>Velit Doloremque</h3>
              <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-chat-square-text"></i>
              </div>
              <h3>Dolori Architecto</h3>
              <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section><!-- End Our Services Section -->

    <!-- ======= Testimonials Section ======= -->
    
    <!-- ======= Portfolio Section ======= -->
    
    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Team</h2>
          <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis dolorem dolore earum</p>
        </div>

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
              <h4>Walter White</h4>
              <span>Web Development</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
              <h4>Sarah Jhinson</h4>
              <span>Marketing</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
              <h4>William Anderson</h4>
              <span>Content</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
              <h4>Amanda Jepson</h4>
              <span>Accountant</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>
    </section><!-- End Our Team Section -->

    
    <!-- ======= Contact Section ======= -->
    <!--<section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis dolorem dolore earum</p>
        </div>

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-4">

            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div>

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>
              </div>

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55</p>
                </div>
              </div>

              <div class="info-item d-flex">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h4>Open Hours:</h4>
                  <p>Mon-Sat: 11AM - 23PM</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div> End Contact Form -->

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <!--<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>-->

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <?php //include 'footer.php';?>
</body>

</html>
