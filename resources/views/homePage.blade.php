@extends('default_template')

@section('template')
<link href="{{ asset('home_page/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('home_page/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{ asset('home_page/css/swiper.css')}}" rel="stylesheet">
	<link href="{{ asset('home_page/css/magnific-popup.css')}}" rel="stylesheet">
	<link href="{{ asset('home_page/css/styles.css')}}" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    
	
    

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

        <!-- Image Logo -->
        <h1 style="color: whitesmoke;">ADVENTURA</h1>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="spots">SPOTS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#services">TRIP PLAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#callMe">HOTELS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#projects">REVIEW</a>
                </li>

                
            </ul>
            
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-container">
                            <h1>PLAN YOUR <span id="js-rotating">TRIPS, HOTELS, DESTINATIONS</span></h1>
                            <P></P>
                            <a class="btn-solid-lg page-scroll" href="login">REGISTRATION / LOGIN</a>
                        </div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->
    <script src="{{ asset('home_page/js/jquery.min.js')}}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ asset('home_page/js/popper.min.js')}}"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="{{ asset('home_page/js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
    <script src="{{ asset('home_page/js/jquery.easing.min.js')}}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ asset('home_page/js/swiper.min.js')}}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ asset('home_page/js/jquery.magnific-popup.js')}}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ asset('home_page/js/morphext.min.js')}}"></script> <!-- Morphtext rotating text in the header -->
    <script src="{{ asset('home_page/js/isotope.pkgd.min.js')}}"></script> <!-- Isotope for filter -->
    <script src="{{ asset('home_page/js/validator.min.js')}}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{ asset('home_page/js/scripts.js')}}"></script> <!-- Custom scripts -->
    
@endsection