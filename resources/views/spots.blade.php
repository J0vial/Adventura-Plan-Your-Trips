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
                                    <p class="info"><i class='fa-solid fa-map-location'>&nbsp;</i>{{$spot->disName}}</p>
                                    <p class="description" style=" --max-lines:3; display:-webkit-box; overflow:hidden;-webkit-box-orient:vertical; -webkit-line-clamp:var(--max-lines); ">{{$spot->description}}</p>
                                    @if(Session::has('save_com'))
                                        <div class = "alert alert-success">{{session::get('save_com')}}</div>
                                    @endif
                                    <form action="{{ route('add_comment',['id' => Session::get('loginId'),'spot_id'=>$spot->id]) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="message-text" class="col-form-label">Comment:</label>
                                                    <textarea class="form-control" name ='message_text' id="message_text"></textarea>
                                                </div>
                                                <div class="col">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-primary">Add Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </form>
                                    <a href=""  class="detail-btn2" data-toggle="modal" data-target="#exampleModal" data-id="{{$spot->id}}">See all Comments</a>
                                    
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

    
    <!-- Button trigger modal name  -->
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
                            <h4><u>Transports</u></h4>
                            <p id="spot-transp"></p>  
                            <p id="spot-type"></p>
                        </div>
                    </div>
                </div>
                
                <h4><u>Description</u></h4>
                <p id="spot-desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
            </div>
          </div>
        </div>
    </div> 

    <!-- Button trigger modal comments  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id='comments-container'>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="comment-widgets">
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="comment-text w-100">
                                <h6 id='name' class="font-medium"></h6> <span id ='text' class="m-b-15 d-block"></span>
                                <div class="comment-footer"> <span class="text-muted float-right" id='time'></span> </div>
                            </div>
                        </div> <!-- Comment Row -->
                        
                    </div> <!-- Card -->
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            
            $('.detail-btn').click(function() {
                const id = $(this).attr('data-id');
                
                $.ajax({
                    url: 'spot_pop/'+id,
                    type: 'GET',
                    data: {
                        "id": id
                    },
                success:function(data) {
                    
                    
                    $('#spot-title').html(data[0].name);
                    $('#spot-img').attr('src', 'store_pics/'+data[0].pictures);
                    $('#spot-dist').html(data[0].disName);  
                    $('#spot-desc').html(data[0].description);

                   const groupedTransports = {};
                    for (const item of data) {
                        const key = item.transportName;
                        if (groupedTransports[key]) {
                            groupedTransports[key].push(item.transport_type);
                        } else {
                            groupedTransports[key] = [item.transport_type];
                        }
                    }
                    
                    
                    let transportsHtml = '';
                    
                    for (const key in groupedTransports) {
                        
                        const transportTypes = groupedTransports[key].join(', ');
                        
                        transportsHtml += `<span>${key}(${transportTypes})</span><br>`;
                        
                    }

                    $('#spot-transp').html(transportsHtml);


                    
                }
                })
            });
            $('.detail-btn2').click(function(event) {
                event.preventDefault();
                const id = $(this).attr('data-id');
                
                $.ajax({
                    url: 'view_comment/'+id,
                    type: 'GET',
                    data: {
                        "id": id
                    },
                success:function(data) {
                    $('#text').empty();
                    $('#name').empty();
                    $('#time').empty();
                    
                    $('#text').html(data[0].destination_review);
                    $('#name').html(data[0].uname);
                    $('#time').html(data[0].time_difference);
                }
                })
            });
        });

    </script>
    
@endsection