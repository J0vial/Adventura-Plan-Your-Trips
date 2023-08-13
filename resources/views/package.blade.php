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
    <link href="{{ asset('spot/pop_up.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />            
            

    
	
	<!-- Favicon  -->
    <link rel="icon" href="{{ asset('home_page/images/favicon.png') }}">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    
    

    @include('navbar')


    <!-- Header -->
    
    <header id="header" class="header" >
        <div class="header-content" >
        @if(Session::has('saved'))
            <div class = "alert alert-success">{{session::get('saved')}}</div>
        @endif
            <div class="container" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Find Packages for Your Spots</h1>
                        <form action="">
                            <div class="input-box" style="margin-left:100px; margin-top:50px">
                                <i class="uil uil-search"></i>
                                <input  value="{{$search}}" name ="search" type="search" placeholder="Search here..." />
                                <button class="button">Search</button>
                            </div>
                        </form>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        @if ($count_result == 0)
            <div id='alrt'  style="width:50%;margin-top:5%; margin-left:23%;">
            </div>
            <a class="btn-solid-lg page-scroll" href="package">Show all Data</a>
        @endif
        <script>
            document.getElementById('alrt').innerHTML='<div class="alert alert-danger" style="color:red;"><b>Nothing Found</b></div>'; 
            setTimeout(function() {
                document.getElementById('alrt').innerHTML='';},5000)
        </script>  
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

    
    
        
    
            
    <div class="container" style="margin-left:250px;"> 
        <div class="col-md-9 col-md-pull-3" >
            <section class="search-result-item" >
                
                <div class="search-result-item-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <h4 class="search-result-item-heading">
                                
                            <table class="table" style="margin-left:-30%;">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">Spot</th>
                                    <th scope="col">Hotel</th>
                                    <th scope="col">Transportations</th>
                                    <th scope="col">Day Stays</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (count($package)>0)
                                    @foreach($package as $packages)
                                    <tr>
                                        
                                        <td>{{$packages->spotName}}</td>
                                        <td>{{$packages->hotelName}}</td>
                                        <td>{{$packages->transport_name}}</td>
                                        <td>{{$packages->staying}}</td>
                                        <td>{{$packages->price}}</td>
                                        <form action="{{route('confirm_pack',['id' => $packages->id])}}" method="POST">
        

                                            @csrf

                                            @php
                                                $boolean=false;
                                            @endphp
                                            @foreach($user_pack as $pac)
                                                @if ($pac->packages_id!=$packages->id)
                                                    @php
                                                        $boolean=true;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @if ($boolean==false)
                                                <td><button class="button" >Book</button></td>
                                            @else
                                                <td><button class="button" >Unbook</button></td>
                                            @endif
                                        </form>
                                    </tr>
                                    @endforeach
                                @endif
                                    
                                    
                                </tbody>
                                </table>

                                                
                            </h4>
                            
                            
                        </div>
                    </div>
                </div>
            </section>
            
        </div>
    </div>
    <hr style="background-color: black; width:53%; margin-left:20%;">
    
    <style>
        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #14bf98; 
            border-color: #14bf98; 
        }

        .row{
            --bs-gutter-x: 20rem;
        }
         
    </style>
    
    <div class="row" style="margin-left: 100px;">
        {{$package->links('pagination::bootstrap-5')}}
    </div>

    




        
        
        
        
        
    
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
    <script src="{{ asset('spot/js/script.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    
@endsection