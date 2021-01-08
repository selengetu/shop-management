<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>SHOP SYSTEM</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    
        
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="basic_assets/css/animate.css">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="basic_assets/css/magnific-popup.css">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="basic_assets/css/slick.css">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="basic_assets/css/LineIcons.css">
        
    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="basic_assets/css/font-awesome.min.css">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="basic_assets/css/bootstrap.min.css">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="basic_assets/css/default.css">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="basic_assets/css/style.css">
    
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->    
   
   
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                {{-- <img src="basic_assets/images/logo.svg" alt="Logo"> --}}
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Нүүр хуудас</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">Давуу тал</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">Бидний тухай</a>
                                    </li>
                                    <li class="nav-item">
                                        @auth
                                            <a href="{{ url('/home') }}">Нүүр</a>
                                        @else
                                            <a href="{{ route('login') }}">Нэвтрэх</a>
                                        @endauth</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
        
        <div id="home" class="header-hero bg_cover" style="background-image: url(basic_assets/images/1438480.jpg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center" >
                            <h4 class="header-sub-title wow fadeInUp"  data-wow-duration="1.3s" data-wow-delay="0.2s" style="background-color:#5C7702;">"Banana Fruit" LLC </h4>
                            <h3 class="header-title wow fadeInUp" data-wow-duration="1.3s" style="background-color:#5C7702;" data-wow-delay="0.5s">Европ жимсний импорт, бөөний худалдаа, хүргэлтийн үйлчилгээ</h3>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s">
                            <img src="basic_assets/images/header-hero.png" alt="hero">
                        </div> <!-- header hero image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div> <!-- header hero -->
    </header>
    
    <!--====== HEADER PART ENDS ======-->
    
    <!--====== BRAMD PART START ======-->
    
    <div class="brand-area pt-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-logo d-flex align-items-center justify-content-center justify-content-md-between">
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <img src="basic_assets/images/brand-1.png" alt="brand">
                        </div> <!-- single logo -->
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.2s">
                            <img src="basic_assets/images/brand-2.png" alt="brand">
                        </div> <!-- single logo -->
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.3s">
                            <img src="basic_assets/images/brand-3.png" alt="brand">
                        </div> <!-- single logo -->
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.4s">
                            <img src="basic_assets/images/brand-4.png" alt="brand">
                        </div> <!-- single logo -->
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">
                            <img src="basic_assets/images/brand-5.png" alt="brand">
                        </div> <!-- single logo -->
                    </div> <!-- brand logo -->
                </div>
            </div>   <!-- row -->
        </div> <!-- container -->
    </div>
    
    <!--====== BRAMD PART ENDS ======-->
    
    <!--====== SERVICES PART START ======-->
    
    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title"><span>Өдөр бүр эрүүл цэвэр шинэхэн жимс, ногоо хэрэглэх нь </span>таны эрүүл мэндэд тустай </h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="services-icon">
							<img class="shape" src="basic_assets/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="basic_assets/images/services-shape-2.svg" alt="shape">
                            <i class="lni lni-fresh-juice"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Улаан жүрж</a></h4>
                            <p class="text">Хоол хүнсэндээ улаан жүржийг байнга хэрэглэх нь хоол боловсруулах чадварыг сайжруулж, гэдэсний гүрвэлзэх хөдөлгөөнийг дэмжин  цусан дахь холестеринийг багасдаг  байна.Мөн цусны даралтыг хэвийн болгож зүрх судас, тархины үйл ажиллагааг дэмждэг..</p>
                           
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="services-icon">
                            <img class="shape" src="basic_assets/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="basic_assets/images/services-shape-1.svg" alt="shape">
                            <i class="lni lni-fresh-juice"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Шинэхэн Алим</a></h4>
                            <p class="text">Алимны найрлаганд байдаг шингэц сайтай бодис нь нарийн гэдэсний хямралыг эмчлэхэд сайнаар нөлөөлдөг. Мөн зарим төрлийн хорт хавдраас урьдчилан сэргийлдэг. Цусан дахь инсулины хэмжээг тогтворжуулснаар чихрийн шижин өвчнөөс хамгаалдаг юм байна.</p>
                           
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <img class="shape" src="basic_assets/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="basic_assets/images/services-shape-3.svg" alt="shape">
                            <i class="lni lni-fresh-juice"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#">Ногоон киви</a></h4>
                            <p class="text">Киви жимсийг байгалийн амин дэмийн цуглуулга, эмийн сан гэж нэрлэдэг. Эмч нар бие сулрах, євдєх vед энэ жимсийг идэхийг юуны ємнє зєвлєдєг. Учир нь нэг ширхэг кивид хvний єдрийн хэрэгцээг хангах С витамин байдаг бєгєєд бодисын солилцоонд зайлшгvй кали гадил жимснээс дутахгvй агуулагддаг.</p>
                          
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== SERVICES PART ENDS ======-->
    
    <!--====== ABOUT PART START ======-->
    
    <section id="about" class="about-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title">Бүх төрлийн <span>жимс нарийн ногоо </span></h3>
                        </div> <!-- section title -->
                        <p class="text">Хатаасан жимс, Нэг удаагийн сав баглаа боодол, Нарийн ногоо, Бүдүүн ногоо, Бүх төрлийн хоол амтлагчийг харилцагч нарт зориулан импортлон оруулж ирдэг.</p>
                      
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="basic_assets/images/blog-3.png" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-shape-1">
            <img src="basic_assets/images/about-shape-1.svg" alt="shape">
        </div>
    </section>
    
    <!--====== ABOUT PART ENDS ======-->
    
    <!--====== ABOUT PART START ======-->
    
    <section class="about-area pt-70">
        <div class="about-shape-2">
            <img src="basic_assets/images/about-shape-2.svg" alt="shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-last">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title"><span>Шаардлага хангасан зоорь болон дэлгүүрүүд  </span></h3>
                        </div> <!-- section title -->
                        <p class="text">Манай компани 2005 оноос эхлэн жимс хүнсний ногоог хадгалах агуулах, зоорь, жимс хадгалах стандартын дагуу тохижуулан 2010 оноос эхлэн монголд жишиг хүйтэн агуулахыг ашиглалтанд оруулсан. Одоогийн байдлаар агуулах нь 0 +1 хооронд жимс жимсгэнийг хадгалдаг бөгөөд жимсний хадгалах стандартын дагуу хадгалж байна.</p>
                      
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6 order-lg-first">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="basic_assets/images/blog-1.jpg" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>


    <!--====== ABOUT PART START ======-->
    
    <section class="about-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title"><span>Үргэлж шинэ</span></h3>
                        </div> <!-- section title -->
                        <p class="text">Манай компани 7 хоногт 1 удаа бүх төрлийн нарийн ногоо жимсийг импортлон оруулж ирдэг. Энэ нь манай бараа үргэлж шинэхэнээрээ хэрэглэгчдийн гар дээр хүрдэг гэсэн үг юм.</p>
                        
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="basic_assets/images/blog-2.png" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-shape-1">
            <img src="basic_assets/images/about-shape-1.svg" alt="shape">
        </div>
    </section>
    
    <!--====== ABOUT PART ENDS ======-->

    
    <!--====== ABOUT PART ENDS ======-->
    
   
    
    
    
    
    
    
    <!--====== FOOTER PART START ======-->
    
    <footer id="footer" class="footer-area pt-120">
        <div class="container">
            <div class="subscribe-area wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="subscribe-content mt-45">
                            <h2 class="subscribe-title"><span>Та яг одоо </span> манай дэлгүүрийг зорин  үйлчлүүлээрэй ! </h2>
                        </div>
                    </div>
                    
                 </div> <!-- row -->
            </div> <!-- subscribe area -->
            <div class="footer-widget pb-100">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <a class="logo" href="#">
                                {{-- <img src="basic_assets/images/logo.svg" alt="logo"> --}}
                            </a>
                            <p class="text">Европ жимсний импорт, бөөний худалдаа, хүргэлтийн үйлчилгээ</p>
                            <ul class="social">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                                <li><a href="#"><i class="lni-instagram-filled"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-7">
                        <div class="footer-link d-flex mt-50 justify-content-md-between">
                            <!-- <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                <div class="footer-title">
                                    <h4 class="title">Quick Link</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#">Road Map</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Terms of Service</a></li>
                                    <li><a href="#">Pricing</a></li>
                                </ul>
                            </div> footer wrapper -->
                            <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                                <div class="footer-title">
                                    <h4 class="title">Үндсэн цэс</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#">Нүүр</a></li>
                                    <li><a href="#">Давуу тал</a></li>
                                    <li><a href="#">Бидний тухай</a></li>
                                </ul>
                            </div> <!-- footer wrapper -->
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-5">
                        <div class="footer-contact mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                            <div class="footer-title">
                                <h4 class="title">Холбоо барих</h4>
                            </div>
                            <ul class="contact">
                                <li>Banana Fruit Store</li>
                                <li>email: banana@gmail.com</li>
                                <li>www.bananafruitstore.com</li>
                                <li>Altai khothon Banana store<br>
									Narnii Zam 20/20-1, 4th khoroo, Bayangol district,<br>
									Ulaanbaatar, Mongolia</li>
                            </ul>
                        </div> <!-- footer contact -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright d-sm-flex justify-content-between">
                            <div class="copyright-content">
                                <p class="text">Хөгжүүлсэн JoCaRu Team 2020 он</p>
                            </div> <!-- copyright content -->
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer copyright -->
        </div> <!-- container -->
        <div id="particles-2"></div>
    </footer>
    
    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->   
    
    <!--====== PART START ======-->
    
<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div>
            </div>
        </div>
    </section>
-->
    
    <!--====== PART ENDS ======-->




    <!--====== Jquery js ======-->
    <script src="basic_assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="basic_assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="basic_assets/js/popper.min.js"></script>
    <script src="basic_assets/js/bootstrap.min.js"></script>
    
    <!--====== Plugins js ======-->
    <script src="basic_assets/js/plugins.js"></script>
    
    <!--====== Slick js ======-->
    <script src="basic_assets/js/slick.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="basic_assets/js/ajax-contact.js"></script>
    
    <!--====== Counter Up js ======-->
    <script src="basic_assets/js/waypoints.min.js"></script>
    <script src="basic_assets/js/jquery.counterup.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="basic_assets/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Scrolling Nav js ======-->
    <script src="basic_assets/js/jquery.easing.min.js"></script>
    <script src="basic_assets/js/scrolling-nav.js"></script>
    
    <!--====== wow js ======-->
    <script src="basic_assets/js/wow.min.js"></script>
    
    <!--====== Particles js ======-->
    <script src="basic_assets/js/particles.min.js"></script>
    
    <!--====== Main js ======-->
    <script src="basic_assets/js/main.js"></script>
    
</body>

</html>
