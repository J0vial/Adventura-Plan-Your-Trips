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
                    <p class="p-heading">Our clients are our partners and we can not imagine a better future for our company without helping them reach their objectives</p>
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
                                        
                                        <img class="card-image" src="storage/{{$item->pictures}}" alt="alternative">
                                        
                                        <div class="card-body">
                                            <div class="testimonial-text">{{ $item->description }}</div>
                                            
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

    

    


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-container about">
                        <h4>Few Words About Aria</h4>
                        <p class="white">We're passionate about delivering the best business growth services for companies just starting out as startups or industry players that have established their market position a long tima ago.</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                
                
               
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2020 <a href="https://inovatik.com">Template by Shakib</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>




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