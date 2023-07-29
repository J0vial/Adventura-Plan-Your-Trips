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
            <div class="container" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Search for the Spots</h1>
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
            <a class="btn-solid-lg page-scroll" href="spots">Show all Data</a>
        @endif
        <script>
            document.getElementById('alrt').innerHTML='<div class="alert alert-danger" style="color:red;"><b>Nothing Found</b></div>'; 
            setTimeout(function() {
                document.getElementById('alrt').innerHTML='';},5000)
        </script>  
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

    
    
        
    @if (count($spots)>0)
        @foreach($spots as $spot)
            
            <div class="container" style="margin-left:250px; margin-top:-50px;"> 
                <div class="col-md-9 col-md-pull-3" >
                    <section class="search-result-item" >
                        <a class="image-link" ><img style="margin-top: 15px; margin-left:10px" class="image" src="store_pics/{{$spot->pictures}}">
                        </a>
                        <div class="search-result-item-body">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4 class="search-result-item-heading">
                                        
                                    <a href="" class="detail-btn" data-toggle="modal" data-target="#myModal" data-id="{{ $spot->id }}">{{$spot->name}}</a>
                                        
                                    
                                        
                                    </h4>
                                    <p class="info"><i class='fa-solid fa-map-location'>&nbsp;</i>{{$spot->districtName}}</p>
                                    <p class="description" style=" --max-lines:3; display:-webkit-box; overflow:hidden;-webkit-box-orient:vertical; -webkit-line-clamp:var(--max-lines); ">{{$spot->description}}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <hr style="background-color: black; width:53%; margin-left:20%;">
            
        @endforeach
    @endif
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
        {{$spots->links('pagination::bootstrap-5')}}
    </div>

    <!-- Button trigger modal -->
    <div class="modal" tabindex="-1" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content"style="width: 180%; margin-left:-180px;">
            <div class="modal-header">
              <h5 id="spot-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                        <a class="image-link" ><img style="height: 420px; width:500px;" id='spot-img'  src="">
                        </a>
                        </div>
                        <div class="col">
                            <h4><u>Disctrict</u></h4>
                            <p id="spot-dist"></p> 
                        </div>
                    </div>
                </div>
                
                <h4><u>Description</u></h4>
                <p id="spot-desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
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
    <script>
        $(document).ready(function() {
            $('.detail-btn').click(function() {
                const id = $(this).attr('data-id');
                console.log(id);
                $.ajax({
                    url: 'spot_pop/'+id,
                    type: 'GET',
                    data: {
                        "id": id
                    },
                success:function(data) {
                    console.log(data);
                    $('#spot-title').html(data.name);
                    $('#spot-img').attr('src', 'store_pics/'+data.pictures);
                    $('#spot-dist').html(data.districtName);
                    
                    $('#spot-desc').html(data.description);
                    
                }
                })
            });
        });

    </script>
    
@endsection