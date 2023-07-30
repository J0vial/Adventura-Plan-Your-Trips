@extends('default_template')

@section('template')
    
    


   
    @include('navbar')

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
    

    <!-- Testimonials -->
    <div class="slider">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Places</h2>
                    <p class="p-heading">Find your Favourite Spots</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">
                                @foreach ($data as $item)
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        
                                        <img class="card-image" src="store_pics/{{$item->pictures}}" alt="alternative">
                                        
                                        <div class="card-body">
                                            <div class="testimonial-text" style=" --max-lines:5; display:-webkit-box; overflow:hidden;-webkit-box-orient:vertical; -webkit-line-clamp:var(--max-lines);">{{ $item->description }}</div>
                                            
                                        </div>
                                        
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
                                @endforeach
                            </div> <!-- end of swiper-wrapper -->

                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->
        
                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of sliedr-container -->
                    <!-- end of card slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider -->
    <!-- end of testimonials -->

    @include('footer')


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