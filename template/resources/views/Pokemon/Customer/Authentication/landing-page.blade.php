<!DOCTYPE html>
<html lang="en">
  <head>
  <script>
  document.querySelectorAll('a.nav-link').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
</script>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <title>Cuba - Premium Admin Template</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="icon" href="{{ asset('assets/svg/landing-icons.svg') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
  </head>
  <body class="landing-page">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper landing-page">
      <!-- Page Body Start            -->
      <div id="home" class="landing-home">
        <div class="container-fluid">
          <div class="sticky-header">
            <header>                       
              <nav class="navbar navbar-b navbar-dark navbar-trans navbar-expand-xl fixed-top nav-padding" id="sidebar-menu"><a class="navbar-brand p-0" href="#"><img class="img-fluid" src="{{ asset('assets/images/landing/landing_logo.png') }}" alt=""></a>
                <button class="navbar-toggler navabr_btn-set custom_nav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>
                <div class="navbar-collapse justify-content-center collapse hidenav" id="navbarDefault">
                  <ul class="navbar-nav navbar_nav_modify" id="scroll-spy">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#activities">Activities</a></li>
                    <li class="nav-item"><a class="nav-link" href="#feedbacks">Customer Review</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faqs">FAQs</a></li>
                  </ul>
                </div>
                <div class="buy-btn rounded-pill"><a class="nav-link js-scroll" href="{{ route('login') }}"> Log in as Employee </a></div>
              </nav>
            </header>
          </div>
          <div class="row justify-content-center"style="background-image: url('{{ asset('assets/images/jensonheader.jpg') }}'); background-size: cover; background-position: center;">
            <div class="col-lg-8 col-sm-10">
              <div class="content text-center">
                <div>
                <h6 class="content-title"><img class="arrow-decore" src="{{ asset('assets/images/landing/decore/arrow.svg') }}" alt=""><span class="sub-title">A Nature's Escape for Relaxation and Adventure </span></h6>
                  <h1 class="wow fadeIn" id="home"> <span> Hacienda JenSon Farm Resort </span> </h1>
                  <p class="mt-3 wow fadeIn">Immerse yourself in the beauty of nature while enjoying our premium amenities and unforgettable experiences. Perfect for families, adventurers, and events of all kinds.</p><br/><br/>
                  <!-- Button container with flexbox centering -->
                    <div class="d-flex justify-content-center mt-4">
                      <a class="buy-btn rounded-pill" href="{{ route('customer-login') }}" style="padding: 20px 40px; width: 200px; height: 65px; font-size: 18px; text-align: center; color: #ffffff;">
                        Book Now!
                      </a>
                    </div>
                  <div class="btn-grp mt-4"><a class="wow pulse" href="{{ route('index')}}" target="_blank" data-bs-placement="top" title="HTML"> <img src="{{ asset('assets/images/landing/icon/html/html.png') }}" alt=""></a><a class="wow pulse" href="https://angular.pixelstrap.com/cuba/" target="_blank" data-bs-placement="top" title="Angular 13"> <img src="{{ asset('assets/images/landing/icon/angular/angular.png') }}" alt=""></a><a class="wow pulse" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank" data-bs-placement="top" title="Vue 2.6.10"> <img src="{{ asset('assets/images/landing/icon/vue/vue.png') }}" alt=""></a><a class="wow pulse" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank" data-bs-placement="top" title="React Redux"><img src="{{ asset('assets/images/landing/icon/react/react.png') }}" alt=""></a><a class="wow pulse" href="https://laravel.pixelstrap.com/cuba/dashboard/index" target="_blank" data-bs-placement="top" title="Laravel 9"> <img src="{{ asset('assets/images/landing/icon/laravel/laravel.png') }}" alt=""></a><a class="wow pulse" href="https://cubadjango.pixelstrap.com/" target="_blank" data-bs-placement="top" title="Django 4.0.4"> <img src="{{ asset('assets/images/landing/icon/django/django.png') }}" alt=""></a><a class="wow pulse" href="http://cubaflask.pixelstrap.com/" target="_blank" data-bs-placement="top" title="Flask 2.2.2"> <img src="{{ asset('assets/images/landing/stroke-icon/7.svg') }}" alt=""></a><a class="wow pulse" href="https://react.pixelstrap.com/cuba-context/" target="_blank" data-bs-placement="top" title="React Context"><img src="{{ asset('assets/images/landing/icon/react/react.png') }}" alt=""></a><a class="wow pulse" href="javascript:void(0)" data-bs-placement="top" title="Coming soon"> <img src="{{ asset('assets/images/landing/stroke-icon/8.svg') }}" alt=""></a><a class="wow pulse" href="https://codeigniter.pixelstrap.com/cuba/public/" target="_blank" data-bs-placement="top" title="Codeigniter"> <img src="{{ asset('assets/images/landing/icon/codeigniter/codeigniter-icon.png') }}" alt=""></a><a class="wow pulse" href="https://cuba-nodejs-pixelstrap.herokuapp.com/" target="_blank" data-bs-placement="top" title="Node"> <img src="{{ asset('assets/images/landing/stroke-icon/10.svg') }}" alt=""></a><a class="wow pulse" href="javascript:void(0)" data-bs-placement="top" title="Coming soon"> <img src="{{ asset('assets/images/landing/stroke-icon/11.svg') }}" alt=""></a></div>
                </div>
              </div>
            </div>
            <div class="col-xl-7 col-lg-8 col-md-10">               
              <img class="screen1 img-fluid" src="{{ asset('assets/images/landing/screen1.png') }}" alt=""></div>
          </div>
        </div>
      </div>

      <!-- START OF ACTIVITIES  -->
      <section id="activities" class="section-space feature-section">
        <div class="container">
          <div class="row"> 
            <div class="col-sm-12 wow pulse">
              <div class="landing-title">
                <h5 class="sub-title">Why Choose Hacienda JenSon Farm Resort?</h5>
                <h1>Introducing our  <span class="gradient-13"> ACTIVITIES! </span></h1>
            </div>

          <div class="image-gallery">
            <div class="gallery-item">
              <img src="{{ asset('assets/images/campsite.jpg') }}" alt="Gallery Image 1">
            </div>
            <div class="gallery-item">
              <img src="{{ asset('assets/images/atv.jpg') }}" alt="Gallery Image 2">
            </div>
            <div class="gallery-item">
              <img src="{{ asset('assets/images/event.jpg') }}" alt="Gallery Image 3">
            </div>
          </div>

          <div class="row flex-nowrap g-4" style="overflow-x: auto; flex-wrap: nowrap;"> 
            <div class="col-xxl-3 col-lg-4 col-sm-6"> 

              <div class="feature-box common-card bg-feature-1">
                <div class="feature-icon"> <img src="{{ asset('assets/images/landing/feature-icon/1.svg') }}" alt=""></div>
                <h5>Campsite</h5>
                <p class="mb-0 f-light">Spend a magical night under the stars with modern camping facilities. </p>
              </div>
            </div>

            <div class="col-xxl-3 col-lg-4 col-sm-6"> 
              <div class="feature-box common-card bg-feature-2">
                <div class="feature-icon"> <img src="{{ asset('assets/images/landing/feature-icon/2.svg') }}" alt=""></div>
                <h5>ATV Tours </h5>
                <p class="mb-0 f-light">Explore the beautiful terrain of our farm with thrilling ATV rides, guided by our experienced staff.</p>
              </div>
            </div>

            <div class="col-xxl-3 col-lg-4 col-sm-6"> 
              <div class="feature-box common-card bg-feature-3">
                <div class="feature-icon"> <img src="{{ asset('assets/images/landing/feature-icon/3.svg') }}" alt=""></div>
                <h5>Event Venue </h5>
                <p class="mb-0 f-light">Host your next event at our versatile event place, ideal for weddings, conferences, and team-building activities.</p>
              </div>
            </div>
          </div>

          <div class="image-gallery">
            <div class="landing-title">
                  <h2><span class="gradient-13"> Family-friendly </span> amenities and adventurous experiences for all ages.</h2>
            </div>
            <div class="gallery-item">
              <img src="{{ asset('assets/images/farm.jpg') }}" alt="Gallery Image 4">
            </div>
            <div class="gallery-item">
              <img src="{{ asset('assets/images/relax.jpg') }}" alt="Gallery Image 5">
            </div>
            <div class="gallery-item">
              <img src="{{ asset('assets/images/jensonheader.jpg') }}" alt="Gallery Image 6">
            </div>
          </div>

          <div class="row flex-nowrap g-4" style="overflow-x: auto; flex-wrap: nowrap;">
            <div class="col-xxl-3 col-lg-4 col-sm-6"> 
                <div class="feature-box common-card bg-feature-4">
                  <div class="feature-icon"> <img src="{{ asset('assets/images/landing/feature-icon/4.svg') }}" alt=""></div>
                  <h5>Farm Tour </h5>
                  <p class="mb-0 f-light">Discover the wonders of farm life, from tending to crops to learning about sustainable farming practices, and enjoy hands-on activities.</p>
                </div>
              </div>

              <div class="col-xxl-3 col-lg-4 col-sm-6"> 
                <div class="feature-box common-card bg-feature-5">
                  <div class="feature-icon"> <img src="{{ asset('assets/images/landing/feature-icon/5.svg') }}" alt=""></div>
                  <h5>Relaxation Areas </h5>
                  <p class="mb-0 f-light">Take in the scenic views while lounging in our peaceful garden areas, perfect for reading, unwinding, or enjoying nature.</p>
                </div>
              </div>
              <div class="col-xxl-3 col-lg-4 col-sm-6"> 
                <div class="feature-box common-card bg-feature-6">
                  <div class="feature-icon"> <img src="{{ asset('assets/images/landing/feature-icon/6.svg') }}" alt=""></div>
                  <h5>Swimming Pool </h5>
                  <p class="mb-0 f-light">Take a refreshing dip in our pristine swimming pool, perfect for a relaxing swim or fun family time. </p>
                </div>
              </div>
          </div>
        </div>
      </section>

      <!-- START OF WORDS -->
      <section class="section-space components-section cuba-demo-section">
        <div class="container">
          <ul class="decoration">
            <li class="flower-gif">
              <div class="mesh-loader">
                <div class="set-one">
                  <div class="circle"></div>
                  <div class="circle"></div>
                </div>
                <div class="set-two">
                  <div class="circle"></div>
                  <div class="circle"></div>
                </div>
              </div>
            </li>
          </ul>
          <div class="row">
            <div class="col-sm-12 wow pulse">
              <div class="cuba-demo-content">
                <div class="couting">
                  <h2>90+</h2>
                </div>
                <div class="landing-title">
                  <h5 class="sub-title">Usable Components</h5>
                  <h2><span class="gradient-8">UI components </span>is first class</h2>
                  <p>
                    The UI components will facilitate you in developing the most user-friendly, 
                    interactive websites and applications with cutting-edge design features.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row component_responsive g-3 mb-3" data-jarallax-element="0 100">
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/1.svg') }}" alt="">
                <h6 class="m-0 Pt-4">Hacienda JenSon</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/2.svg') }}" alt="">
                <h6 class="m-0">Farm Resort Getaway</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/3.svg') }}" alt="">
                <h6 class="m-0">Nature Retreat</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/4.svg') }}" alt="">
                <h6 class="m-0">Family Friendly</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/5.svg') }}" alt="">
                <h6 class="m-0">Nature Camp</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/6.svg') }}" alt="">
                <h6 class="m-0">ATV Adventures </h6>
              </div>
            </div>
          </div>
          <div class="row component_responsive g-3 mb-3" data-jarallax-element="0 -150">
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/7.svg') }}" alt="">
                <h6 class="m-0">Event Venue</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/8.svg') }}" alt="">
                <h6 class="m-0">Farm Life Experience</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/9.svg') }}" alt="">
                <h6 class="m-0">Eco-friendly</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/10.svg') }}" alt="">
                <h6 class="m-0">Relaxation</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/11.svg') }}" alt="">
                <h6 class="m-0">Outdoor Activities </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/12.svg') }}" alt="">
                <h6 class="m-0">Campsite Rentals </h6>
              </div>
            </div>
          </div>
          <div class="row component_responsive g-3 mb-3" data-jarallax-element="0 100">
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/13.svg') }}" alt="">
                <h6 class="m-0">Corporate Event Venue </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/14.svg') }}" alt="">
                <h6 class="m-0">Romantic Getaway  </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/15.svg') }}" alt="">
                <h6 class="m-0"> High Rating </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/16.svg') }}" alt="">
                <h6 class="m-0">Open Space </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/17.svg') }}" alt="">
                <h6 class="m-0">Pet Friendly </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/18.svg') }}" alt="">
                <h6 class="m-0">Sustainable Tourism </h6>
              </div>
            </div>
          </div>
          <div class="row component_responsive g-3 mb-3" data-jarallax-element="0 -150">
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/19.svg') }}" alt="">
                <h6 class="m-0">Escapade </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/20.svg') }}" alt="">
                <h6 class="m-0">Fresh Air </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/21.svg') }}" alt="">
                <h6 class="m-0">Vacations </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/22.svg') }}" alt="">
                <h6 class="m-0">Scenic Farm </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/23.svg') }}" alt="">
                <h6 class="m-0">Countryside  </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/24.svg') }}" alt="">
                <h6 class="m-0">Peaceful</h6>
              </div>
            </div>
          </div>
          <div class="row component_responsive g-3" data-jarallax-element="0 100">
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/25.svg') }}" alt="">
                <h6 class="m-0">Hacienda Escape</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/26.svg') }}" alt="">
                <h6 class="m-0">Outdoor Relaxation Spots</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/27.svg') }}" alt="">
                <h6 class="m-0">All in One  </h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/28.svg') }}" alt="">
                <h6 class="m-0">Authentic Experience</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/29.svg') }}" alt="">
                <h6 class="m-0"> ATV Trail Rides</h6>
              </div>
            </div>
            <div class="col-xxl-2 col-lg-3 col-md-4 col-6 component-col-set">
              <div class="component-hover-effect"><img src="{{ asset('assets/images/landing/icon/30.svg') }}" alt="">
                <h6 class="m-0">Bonding Activities</h6>
              </div>
            </div>
          </div>
        </div>
      </section>

      
      <!-- START OF CUSTOMER REVIEWS PT. 1 -->
      <section id="feedbacks" class="section-space customer-support"> 
        <div class="container"><br/><br/><br/>
          <div class="row justify-content-center"> 
            <div class="col-sm-12"> 
              <div class="landing-title text-center">
              <div class="landing-title">
                <h5 class="sub-title">Best Customer Rating</h5>
                <h1><span class="gradient-13"> Customer Reviews! </span></h1>
            </div>
                <div class="rating-title gap-2"><img class="decore-1" src="{{ asset('assets/images/landing/decore/arrow-3.svg') }}" alt="">
                  <ul class="d-flex ratings gap-1">
                    <li> <i class="fa fa-star"></i></li>
                    <li> <i class="fa fa-star"></i></li>
                    <li> <i class="fa fa-star"></i></li>
                    <li> <i class="fa fa-star"></i></li>
                    <li> <i class="fa fa-star"></i></li>
                  </ul>
                  <h6 class="rating-title mb-0">4.5 <span class="f-light">(2,2022 rating)</span></h6>
                </div><br/>
                <h2> <span class="gradient-1"> Thousands </span> of customers love us! </h2>
              </div>
            </div>

            <!-- overall review  -->
            <div class="col-xxl-10">
              <div class="row customer-wrap">
                <div class="col-md-3 col-6">
                  <div class="customer-wrapper">
                    <div class="customer-box"> <img src="{{ asset('assets/images/landing/customers/1.svg') }}" alt="">
                      <h6 class="f-light mb-0 mt-2">Top rated Resort</h6>
                    </div><img class="outline-box" src="{{ asset('assets/images/landing/decore/arrow-style-1.svg') }}" alt="">
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="customer-wrapper">
                    <div class="customer-box"> <img src="{{ asset('assets/images/landing/customers/2.svg') }}" alt="">
                      <h6 class="f-light mb-0 mt-2">Popular Getaway Destination</h6>
                    </div><img class="outline-box" src="{{ asset('assets/images/landing/decore/arrow-style-2.svg') }}" alt="">
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="customer-wrapper">
                    <div class="customer-box"> <img src="{{ asset('assets/images/landing/customers/3.svg') }}" alt="">
                      <h6 class="f-light mb-0 mt-2">Easy Booking Process</h6>
                    </div><img class="outline-box" src="{{ asset('assets/images/landing/decore/arrow-style-3.svg') }}" alt="">
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="customer-wrapper">
                    <div class="customer-box"> <img src="{{ asset('assets/images/landing/customers/4.svg') }}" alt="">
                      <h6 class="f-light mb-0 mt-2">Unforgettable Guest Experience</h6>
                    </div><img class="outline-box" src="{{ asset('assets/images/landing/decore/arrow-style-4.svg') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="bottom-section-grad">
      
      <!-- START OF CUSTOMER REVIEWS PT. 2 -->
      <section class="section-space about-section"> 
          <div class="container-fluid fluid-space">
            <div class="row"> 
              <div class="col-sm-12">

                <div class="landing-title text-center">
                  <h5 class="sub-title">Best Customer Feedback</h5>
                  <h2> You <span class="gradient-10"> matter. </span></h2>
                  <p>Read what our guests have to say about their unforgettable experiences at our farm resort.</p>
                </div><br/>
              </div>
              <div class="col-sm-12"> 
                <div class="testimonial-slider"> 
                  <div class="testimonial-box common-card"> 

                  <!-- review 1  -->
                    <div class="rating-content"> 
                      <ul class="d-flex ratings gap-1">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                      <h6 class="mb-0">Family-Friendly</h6>
                    </div>
                    <p class="f-light">"Our family had an unforgettable time at Hacienda JenSon Farm Resort! The kids loved the ATV tour, and we had a fantastic time at the campsite. The staff went out of their way to make us feel at home. Highly recommend it!"</p>
                    <div class="text-end mt-2"> 
                      <h5><i> Veritas Cruz </h5><span class="font-primary">CUSTOMER</i></span>
                    </div>
                    <div class="customer-img"><img src="{{ asset('assets/images/user1.jpg') }}" alt="user1"></div>
                  </div>

                  <!-- review 2  -->
                  <div class="testimonial-box common-card"> 
                    <div class="rating-content"> 
                      <ul class="d-flex ratings gap-1">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                      <h6 class="mb-0">Romantic Getaway</h6>
                    </div>
                    <p class="f-light">"A perfect weekend getaway! The resort is peaceful, and the event venue was stunning for our anniversary celebration. The food was delicious, and the service was exceptional. We will definitely return!"</p>
                    <div class="text-end mt-2"> 
                      <h5>Juday and Matt Batumbakal</h5><span class="font-primary">CUSTOMER</span>
                    </div>
                    <div class="customer-img"><img src="{{ asset('assets/images/user2.jpg') }}" alt="user2"></div>
                  </div>

                  <!-- review 3  -->
                  <div class="testimonial-box common-card"> 
                    <div class="rating-content"> 
                      <ul class="d-flex ratings gap-1">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                      <h6 class="mb-0">Outdoor Adventure</h6>
                    </div>
                    <p class="f-light">"Hacienda JenSon is a hidden gem! The hiking trails were beautiful, and we even got to enjoy a peaceful fishing day. The spacious grounds and friendly staff made our stay relaxing and enjoyable."</p>
                    <div class="text-end mt-2"> 
                      <h5> Maria Sigma </h5><span class="font-primary">CUSTOMER</span>
                    </div>
                    <div class="customer-img"><img src="{{ asset('assets/images/user3.jpg') }}" alt="user3"></div>
                  </div>

                  <!-- review 4  -->
                  <div class="testimonial-box common-card"> 
                    <div class="rating-content"> 
                      <ul class="d-flex ratings gap-1">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                      <h6 class="mb-0">Relaxation </h6>
                    </div>
                    <p class="f-light">"What a wonderful place! The pool was a great place to unwind, and the kids loved the campfire nights. The whole experience felt so rejuvenating. We'll be back for sure!"
                    </p>
                    <div class="text-end mt-2"> 
                      <h5>Maris Racal and Anthony Jennings</h5><span class="font-primary">CUSTOMER</span>
                    </div>
                    <div class="customer-img"><img src="{{ asset('assets/images/user4.jpg') }}" alt="user4"></div>
                  </div>

                  <!-- review 5  -->
                  <div class="testimonial-box common-card"> 
                    <div class="rating-content"> 
                      <ul class="d-flex ratings gap-1">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                      <h6 class="mb-0">Corporate Retreat</h6>
                    </div>
                    <p class="f-light">"We hosted our company retreat here, and it was a hit! The event venue was perfect for our conference, and the resort provided plenty of activities for team-building. Excellent service all around!"
                    </p>
                    <div class="text-end mt-2"> 
                      <h5>Baddie Maddie </h5><span class="font-primary">CUSTOMER</span>
                    </div>
                    <div class="customer-img"><img src="{{ asset('assets/images/user5.jpg') }}" alt="user5"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        
        <!-- 2. START OF ABOUT -->
        <section id="about" class="section-space premium-wrap">
          <div class="container"> 
            <ul class="decoration">
              <li class="flower-gif">
                <div class="mesh-loader">
                  <div class="set-one">
                    <div class="circle"></div>
                    <div class="circle"></div>
                  </div>
                  <div class="set-two">
                    <div class="circle"></div>
                    <div class="circle"></div>
                  </div>
                </div>
              </li>
              <li class="wavy-gif">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 251 38">
                  <path fill="none" stroke-width="10" stroke-miterlimit="10" d="M0,9C17.93,9,17.93,29,35.85,29S53.78,9,71.71,9s17.92,20,35.85,20S125.49,9,143.42,9s17.93,20,35.86,20S197.21,9,215.14,9,233.07,29,251,29"></path>
                </svg>
              </li>
            </ul>
            <div class="row justify-content-center">
              <div class="col-sm-12"> 
                <div class="landing-title">
                  <h5 class="sub-title">Dedicated to sustainable and eco-friendly tourism practices.</h5>
                  <h1> <span class="gradient-3"> ABOUT </span>  </h1>
                  <p>Operating for over 3 years, Hacienda JenSon Farm Resort has been a top destination for nature lovers and event planners.</p>
                </div><br/></br>
                <div class="vector-image"> <img src="{{ asset('assets/images/landing/vectors/1.svg') }}" alt=""></div>
              </div>
              <div class="col-xxl-8">
                <div class="row g-lg-5 g-3">
                  <div class="col-md-3 col-6">
                    <div class="benefit-box pink">
                      <svg>
                        <use href="{{ asset('assets/svg/landing-icons.svg#tag') }}"></use>
                      </svg>
                      <h2 class="mb-0">300+</h2>
                      <h6 class="mb-0">Annual Bookings</h6>
                    </div>
                  </div>
                  <div class="col-md-3 col-6">
                    <div class="benefit-box purple">
                      <svg>
                        <use href="{{ asset('assets/svg/landing-icons.svg#ratings') }}"></use>
                      </svg>
                      <h2 class="mb-0">2,022</h2>
                      <h6 class="mb-0">5 Stars Ratings</h6>
                    </div>
                  </div>
                  <div class="col-md-3 col-6">
                    <div class="benefit-box red">
                      <svg>
                        <use href="{{ asset('assets/svg/landing-icons.svg#user_circle') }}"></use>
                      </svg>
                      <h2 class="mb-0">20+</h2>
                      <h6 class="mb-0">Unique Activities</h6>
                    </div>
                  </div>
                  <div class="col-md-3 col-6">
                    <div class="benefit-box warning">
                      <svg>
                        <use href="{{ asset('assets/svg/landing-icons.svg#gear') }}"></use>
                      </svg>
                      <h2 class="mb-0">3</h2>
                      <h6 class="mb-0">Years of Excellence</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- START OF FAQS  -->
        <section id="faqs" class="faq-section section-space" id="faq">
          <div class="container">
            <div class="row"> 
              <div class="col-sm-12">
                <div class="landing-title text-center">
                  <h5 class="sub-title">Frequently Ask Question</h5>
                  <h2>Do you have  <span class="gradient-11">any Question? </span>Look Here</h2>
                  <p>You can freely reach out to us at any time with any questions! We'd always be happy to serve you.</p>
                </div>
              </div>

              <!-- FAQ 1  -->
              <div class="col-sm-12"> 
                <div class="accordion" id="faqaccordion">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq1">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true" aria-controls="faqOne">How do I make a reservation?</button>
                    </h2>
                    <div class="accordion-collapse collapse show" id="faqOne" aria-labelledby="faq1" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Simply visit our booking page, select your desired dates, and complete the reservation form. You'll receive a confirmation email once your booking is confirmed. 
                      </div>
                    </div>
                  </div>

                  <!-- FAQ 2  -->
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq2">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">Can I bring my pet?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqTwo" aria-labelledby="faq2" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                      Pets are welcome in select areas of the resort, but please notify us ahead of time to ensure we can accommodate your furry friend.
                      </div>
                    </div>
                  </div>

                  <!-- FAQ 3  -->
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq3">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">What amenities are available on the propery?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqThree" aria-labelledby="faq3" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                      Our resort offers a variety of amenities, including free Wi-Fi, on-site dining, guided tours, outdoor activities, and an event venue.
                      </div>
                    </div>
                  </div>

                  <!-- FAQ #4  -->
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq4">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFour" aria-expanded="false" aria-controls="faqFour">Can I book the event venue for a special occasion?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqFour" aria-labelledby="faq4" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">Absolutely! Our event venue is perfect for weddings, birthdays, corporate events, and more. Contact our events team to discuss your needs and book your date.</div>
                    </div>
                  </div>

                  <!-- FAQ 5 -->
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq5">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFive" aria-expanded="false" aria-controls="faqFive">Is Wi-Fi available at the resort?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqFive" aria-labelledby="faq5" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">Yes, we offer free Wi-Fi throughout the resort, so you can stay connected while enjoying your time in nature.</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- <footer class="footer-bg">
        <div class="container">
          <div class="landing-center ptb50">
            <div class="feature-content">
              <ul> 
                <li> 
                  <h4>Trending Template</h4><img src="{{ asset('assets/images/jensonheader.jpg') }}" alt="leaf golden">
                </li>
                <li> 
                  <h4>Overall Best rated Template</h4><img src="{{ asset('assets/images/jensonheader.jpg') }}" alt="leaf golden">
                </li>
                <li> 
                  <h4>Weekly Best Seller</h4><img src="{{ asset('assets/images/jensonheader.jpg') }}" alt="leaf golden">
                </li>
              </ul>
            </div>
            <div class="landing-title">
              <h2>Build a <span class="gradient-13">stunning site </span>today</h2>
            </div>
            <div class="feature-content">
              <ul> 
                <li> 
                  <h4>Trending Template</h4><img src="{{ asset('assets/images/jensonheader.jpg') }}" alt="leaf golden">
                </li>
                <li> 
                  <h4>Overall Best rated Template</h4><img src="{{ asset('assets/images/jensonheader.jpg') }}" alt="leaf golden">
                </li>
                <li> 
                  <h4>Weekly Best Seller</h4><img src="{{ asset('assets/images/jensonheader.jpg') }}" alt="leaf golden">
                </li>
              </ul>
            </div>
          </div>
          <div class="sub-footer row g-2">
            <div class="col-md-6"> 
              <h6 class="mb-0">Copyright © 2022 Cuba, All rights reserved.</h6>
            </div>
            <div class="col-md-6"> 
              <ul> 
                <li> 
                  <h6 class="mb-0">Find us on</h6>
                </li>
                <li> <a href="https://www.facebook.com/"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="https://twitter.com/login"> <i class="fa fa-twitter"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer> -->
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/landing_sticky.js') }}"></script>
    <script src="{{ asset('assets/js/landing.js') }}"></script>
    <script src="{{ asset('assets/js/jarallax_libs/libs.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/js/landing-slick.js') }}"></script>
    <!-- Plugins JS Ends-->
  </body>
</html>