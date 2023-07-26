@extends('default_template')

@section('template')
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="{{ asset('home_page/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('home_page/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('home_page/css/swiper.css') }}" rel="stylesheet">
	<link href="{{ asset('home_page/css/magnific-popup.css') }}" rel="stylesheet">
	<link href="{{ asset('home_page/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('dash_board/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('spot/style.css') }}" rel="stylesheet">
    
	
	<!-- Favicon  -->
    <link rel="icon" href="{{ asset('home_page/images/favicon.png') }}">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    
    

    @include('navbar')


    <!-- Header -->
    @if ($boolean==True)
    <header id="header" class="header"style="margin-bottom: 10px;">
    @else
    <header id="header" class="header" >
    @endif
        <div class="header-content" >
            <div class="container" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Search for the Spots</h1>
                        <form action="">
                            <div class="input-box" style="margin-left:100px; margin-top:50px">
                                <i class="uil uil-search"></i>
                                <input   name ="search" type="search" placeholder="Search here..." />
                                <button class="button">Search</button>
                            </div>
                        </form>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
             
            
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->
    
        @if($boolean==True)
            
        
            @foreach($spots as $spot)
                <div class="container" style="margin-left:250px; margin-top:50px;"> 
                    <div class="col-md-9 col-md-pull-3" >
                        <section class="search-result-item" >
                            <a class="image-link" href="#"><img class="image" src="store_pics/{{$spot->pictures}}">
                            </a>
                            <div class="search-result-item-body">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h4 class="search-result-item-heading"><a href="#">john doe</a></h4>
                                        <p class="info">New York, NY 20188</p>
                                        <p class="description">Not just usual Metro. But something bigger. Not just usual widgets, but real widgets. Not just yet another admin template, but next generation admin template.</p>
                                    </div>
                                    <div class="col-sm-3 text-align-center">
                                        <p class="value3 mt-sm">$9, 700</p>
                                        <p class="fs-mini text-muted">PER WEEK</p><a class="btn btn-primary btn-info btn-sm" href="#">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <hr style="background-color: black; width:53%; margin-left:20%;">
            @endforeach
        
        @endif
    
   
    @include('footer')



    
    	
    <!-- Scripts -->
    <script src="{{ asset('home_page/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ asset('home_page/js/popper.min.js') }}"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="{{ asset('home_page/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="{{ asset('home_page/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ asset('home_page/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ asset('home_page/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ asset('home_page/js/morphext.min.js') }}"></script> <!-- Morphtext rotating text in the header -->
    <script src="{{ asset('home_page/js/isotope.pkgd.min.js') }}"></script> <!-- Isotope for filter -->
    <script src="{{ asset('home_page/js/validator.min.js') }}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{ asset('home_page/js/scripts.js') }}"></script> <!-- Custom scripts -->   
    <script src="{{ asset('dash_board/js/style.js') }}"></script>
@endsection