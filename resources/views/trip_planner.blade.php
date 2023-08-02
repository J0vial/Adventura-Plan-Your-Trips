@extends('default_template')
@section('template')

@include('navbar')
<!-- Header -->
<link href="{{ asset('trip_planner/style.css') }}" rel="stylesheet">
<header id="header" class="header">
    <div class="header-content">
        <h4 style="color:aliceblue;font-size: 30px;margin-right: 150px;margin-top:10px;">DISTRICT </h4>
        <div class="select">

            <select class="form-select" aria-label="Default select example" id='place'>
                <option value=""> -- Place -- </option>  
                @foreach($data as $place)        
                    <option value="{{$place->disId}}">
                        {{$place->disName}} 
                    </option>
                @endforeach  
            </select> 
        </div>
        <h4 style="color:aliceblue;font-size: 30px;margin-right: 150px;margin-top:15px;">SPOT</h4>
        <div class="select">
            <select class="form-select" aria-label="Default select example" id='spot'>
                <option value="">
                    -- Spots --
                </option>
            </select>
        </div>
        <h4 style="color:aliceblue;font-size: 30px;margin-right: 150px;margin-top:15px;"> HOTEL </h4>
        <div class="select">
            <select class="form-select" aria-label="Default select example" id='hotels'>
                <option value="">
                    --Select Hotels--
                </option>
            </select>
        </div>
        <h4 style="color:aliceblue;font-size: 30px;margin-right: 150px;margin-top:15px;"> FROM [Your Current Position] </h4>
        <div class="select">
            <select class="form-select" aria-label="Default select example" id='from'>
                <option value=""> -- From -- </option>  
                @foreach($data as $place)        
                    <option value="{{$place->disId}}">
                        {{$place->disName}} 
                    </option>
                @endforeach      
            </select>
        </div>
        <h4 style="color:aliceblue;font-size: 30px;margin-right: 150px;margin-top:15px;"> TRANSPORT</h4>
        <div class="select">            
            <select class="form-select" aria-label="Default select example" id='transportation'>
                <option value="">
                -- Trasnportation --
                </option>
            </select>
        </div>
        <h4 style="color:aliceblue;font-size: 30px;margin-right: 150px;margin-top:15px;"> FOR RETURN</h4>
        <div class="select">            
            <select class="form-select" aria-label="Default select example" id='rtransportation'>
                <option value="">
                -- Return Trasnportation --
                </option>
            </select>

        </div>

        <a style='margin-top:2%;font-size: 15px;'class="btn-solid-lg page-scroll" href=""> Confirm </a>
    </div> <!-- end of header-content -->
</header> <!-- end of header -->
<!-- end of header -->

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
    <script>
        $(document).ready(function() {
            // Store original options of #from and #transportation selects
            const originalFromOptions = $('#from').html();
            const originalhotelptions = $('#hotel').html();
            const originalTransportationOptions = $('#transportation').html();

            $('#place').change(function(){
                let cid = $(this).val();
                $.ajax({
                    url:'/getspot',
                    type:'post',
                    data:'cid='+cid+'&_token={{csrf_token()}}',
                    success:function(result){
                        $('#spot').html(result)

                        $('#from').html(originalFromOptions);
                        $('#hotel').html(originalhotelptions);
                        $('#transportation').html(originalTransportationOptions);
                    }
                });
            });

            // this for refresh the function
            $('#spot').change(function() {
                let spotId = $(this).val();
                // Make AJAX call to update the #from select options
                $.ajax({
                    url: '/gettransportType',
                    type: 'post',
                    data: 'spotId=' + spotId + '&_token={{csrf_token()}}',
                    success: function(result) {
                        $('#from').html(originalFromOptions);
                        $('#hotel').html(originalhotelptions);
                        
                        $('#transportation').html(originalTransportationOptions); // Reset #transportation options
                    }
                });
            });

            $('#from').change(function(){
                let fid = $(this).val();
                let cid = $('#spot').val();
                $.ajax({
                    url:'/gettransportType',
                    type:'post',
                    data:'fid='+fid+'&cid='+cid+'&_token={{csrf_token()}}',
                    success:function(result){
                        $('#transportation').html(result)
                        $('#rtransportation').html(result);
                        
                    }
                });
            });
            
            $('#spot').change(function(){
                let hid = $(this).val();
                let cid = $('#spot').val();
                $.ajax({
                    url:'/gethotel',
                    type:'post',
                    data:'hid='+hid+'&cid='+cid+'&_token={{csrf_token()}}',
                    success:function(result){
                        console.log(cid)
                        $('#hotels').html(result)
                        
                    }
                });
            });
        
        });

    </script>
    
@endsection