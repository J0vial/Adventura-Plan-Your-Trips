@extends('default_template')
@section('template')

@include('navbar')
<!-- Header -->
<header id="header" class="header">
    <div class="header-content">
        
    </div> <!-- end of header-content -->
</header> <!-- end of header -->
<!-- end of header -->
<select id='spot'>
    <option value="">
        --Select Spot --
    </option>
    @foreach($data as $place)
    <option value="{{$place->id}}">
        {{$place->name}} 
    </option>
    @endforeach    
</select>

<select id='transportation_type'>
    <option value="">
        --transportation type --
    </option>
</select>
<select id='Transportation'>
    <option value="">
        --Select transportation-- 
    </option>
</select>
<select id='hotels'>
    <option value="">
        --Select Hotels--
    </option>
</select>
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
            $('#spot').change(function(){
                let cid = $(this).val();
                $.ajax({
                    url:'/gettransportType',
                    type:'post',
                    data:'cid='+cid+'&_token={{csrf_token()}}',
                    success:function(result){
                        $('#transportation_type').html(result)
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#transportations').change(function(){
                let tid = $(this).val();
                $.ajax({
                    url:'/gettransport',
                    type:'post',
                    data:'tid='+tid+'&_token={{csrf_token()}}',
                    success:function(result){
                        $('#transportation').html(result)
                    }
                });
            });
        });
    </script>
@endsection