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
                        <h1>Search for the Hotels</h1>
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
        
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->
    @if ($count_result == 0)
            <div id='alrt'  style="width:50%;margin-top:5%; margin-left:23%;">
            </div>
            <a class="btn-solid-lg page-scroll" href="hotels">Show all Data</a>
        @endif
        <script>
            document.getElementById('alrt').innerHTML='<div class="alert alert-danger" style="color:red;"><b>Nothing Found</b></div>'; 
            setTimeout(function() {
                document.getElementById('alrt').innerHTML='';},5000)
        </script>  
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

    
    
        
    @if (count($hotels)>0)
        @foreach($hotels as $hotel)
            
            <div class="container" style="margin-left:250px; margin-top:-50px;"> 
                <div class="col-md-9 col-md-pull-3" >
                    <section class="search-result-item" >
                        <a class="image-link" ><img style="margin-top: 15px; margin-left:10px;" class="image" src="store_pics/{{$hotel->pictures}}">
                        </a>
                        <div class="search-result-item-body">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4 class="search-result-item-heading">
                                      
                                    <a >{{$hotel->name}}</a>
                                        
                                    
                                        
                                    </h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <p class="info"><i class='fa-solid fa-map-location'>&nbsp;</i>{{$hotel->disName}} || Near {{$hotel->spotName}}</p>
                                                <p class="info">Room Type : {{$hotel->roomType}} || Bed Type : {{$hotel->betype}}</p>
                                                <p class="info">Available rooms: {{$hotel->rno}} </p>
                                                <p class="info">Cost: {{$hotel->cost}} Taka</p>
                                                <a href="" class="btn-solid-lg page-scroll detail-btn" data-toggle="modal" data-target="#myModal" data-id="{{$hotel->id}}">Map</a>
                                            </div>
                                            <div class="col">
                                                <label for="message-text" class="col-form-label">Comment:</label>
                                                
                                                <textarea class="form-control message-text" name ='message_text' id="message_text"></textarea>
                                                <br>
                                                
                                                <button type="submit" class="btn-solid-lg page-scroll add-button" value='{{$hotel->id}},{{Session::get("loginId")}}'>Add Comment</button>
                                                <br>
                                                <a href=""  class="detail-btn2" data-toggle="modal" data-target="#exampleModal" data-id="{{$hotel->id}}">See all Comments</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
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
        {{$hotels->links('pagination::bootstrap-5')}}
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
                    <iframe id='map' src="" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                   
                </div>
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
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="comment-widgets" id='comments-container'>

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
                    url: 'map_pop/'+id,
                    type: 'GET',
                    data: {
                        "id": id
                    },
                success:function(data) {
                    
                    $('#map').attr('src', data[0].lgla);
                   
                    
                } 
                   
                })
            });

            $('.detail-btn2').click(function(event) {
                event.preventDefault();
                const id = $(this).attr('data-id');
                
                $.ajax({
                    url: 'view_comment_hotel/'+id,
                    type: 'GET',
                    data: {
                        "id": id
                    },
                success:function(data) {
                    $('#comments-container').empty();
                    
                    for (var i = 0; i < data.length; i++) {
                        const commentHtml = ` 
                        
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="comment-text w-100">
                                <h6 class="font-medium">${data[i].uname}</h6>
                                <span class="m-b-15 d-block">${data[i].hotel_review}</span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">${data[i].time_difference}</span>
                                </div>
                            </div>
                        </div>`;
                    $('#comments-container').append(commentHtml);
                }
                }
                })
            });


            $('.add-button').click(function() {
                
                let id = $(this).val().split(",");
                sid=id[0];
                uid = id[1];
                
                let messageTextarea = $(this).closest('.form-group').find('.message-text');
                let message = messageTextarea.val();
                
                if (message.trim() === '') {
                    alert('Please enter a comment before submitting.');
                    return;
                }
                $.ajax({
                    url: 'add_comment_hotel/',
                    method: 'post',
                    data: 'sid='+sid+'&uid='+uid+'&message='+message+'&_token={{csrf_token()}}',
                    success: function(result) {
                        alert('Comment added successfully');

                        messageTextarea.val('');
                        
                        
                    },
                    
                });
            });
        });


    </script>
    
@endsection