@extends('default_template')
@section('template')

@include('navbar')
<!-- Header -->
<link href="{{ asset('trip_planner/style.css') }}" rel="stylesheet">
<header id="header" class="header">
    <div class="header-content">
        
        
        @if(Session::has('saved'))
        <div class = "alert alert-success">{{session::get('saved')}}</div>
        @endif

        @if(Session::has('sorry'))
        <div class = "alert alert-danger">{{session::get('sorry')}}</div>
        @endif

        <form action="{{route('confirm')}}" method="POST">
                

            @csrf
            
            <h4 style="color:aliceblue;font-size: 30px;margin-right: 150px;margin-top:10px;">DISTRICT </h4>
            <div class="select">
                <select class="form-select" name='place' aria-label="Default select example" id='place' >
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
                <select class="form-select" name='spot' aria-label="Default select example" id='spot' value="{{ old('spot')}}">
                    <option value="">
                        -- Spots --
                    </option>
                </select>
            </div>

            <h4 style="color:aliceblue;font-size: 30px;margin-right: 150px;margin-top:15px;"> HOTEL </h4>
            <div class="select">
                <select class="form-select" name='hotel' aria-label="Default select example" id='hotels'>
                    <option value="">
                        --Select Hotels--
                    </option>
                </select>
            </div>

            <h4 style="color:aliceblue;font-size: 30px;margin-right: 150px;margin-top:15px;"> DAY STAYS </h4>
            <input type="number" placeholder="stays night number" name = "num" />

            <h4 style="color:aliceblue;font-size: 30px;margin-right: 150px;margin-top:15px;"> FROM [Your Current Position] </h4>
            <div class="select">
                <select class="form-select" name='from' aria-label="Default select example" id='from'>
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
                <select class="form-select"  name='transp' aria-label="Default select example" id='transportation'>
                    <option value="">
                    -- Trasnportation --
                    </option>
                </select>
            </div>

            <h4 style="color:aliceblue;font-size: 30px;margin-right: 150px;margin-top:15px;"> FOR RETURN</h4>
            <div class="select">            
                <select class="form-select" name='rtransp' aria-label="Default select example" id='rtransportation'>
                    <option value="">
                    -- Return Trasnportation --
                    </option>
                </select>

            </div>

            <button style='margin-top:2%;font-size: 15px;'class="btn-solid-lg page-scroll">Confirm </button>
            
            
        </form>
        
        <button id="showPlansButton" style='margin-top:2%;font-size: 15px;'class="btn-solid-lg page-scroll"> Show Plans </button>
        
    </div> <!-- end of header-content -->
</header> <!-- end of header -->
<!-- end of header -->
<div id="yourPlans" style="display: none;">
    <h1>Your Plans</h1>
    <table class="table table-striped">
        <thead >
            <tr>
                <th scope="col">Place</th>
                <th scope="col">Spot</th>
                <th scope="col">Hotel Information</th>
                <th scope="col">Staying</th>
                <th scope="col">Transportation</th>
                <th scope="col">Return Transportation</th>
                <th scope="col">Total Cost</th>
                <th scope="col">Action</th>
                
            </tr>
        </thead>
            
        <tbody>
            
            @foreach($all_plan as $plan)
            @php
                $return_hotel_parts = explode(' - ', $plan->hotel_info);
                $total_parts = count($return_hotel_parts);

                if (is_null($return_hotel_parts)){
                    $total_cost =  floatval($plan->tcost) +  floatval($plan->rtcost);
                }else{
                    $total_cost =  floatval($return_hotel_parts[$total_parts-1]) +  floatval($plan->tcost) +  floatval($plan->rtcost);
                }

            @endphp
            <tr>
                
                <td>{{$plan->dis_name}}</td>
                <td>{{$plan->spot_name}}</td>
                @if(!empty($plan->hotel_info))
                    <td>
                    
                        @for ($i = 0; $i < $total_parts; $i++)
                            @if ($i == 0)
                                <b>Hotel Name :</b>  {{ $return_hotel_parts[$i] }}<br>
                            @elseif ($i == 1 )
                                <b>Room Type :</b>   {{ $return_hotel_parts[$i] }}<br>
                            @elseif ($i == 2 )
                                <b>Bed Type :</b>  {{ $return_hotel_parts[$i] }}<br>
                            @else
                                <b>Cost:</b>   {{ $return_hotel_parts[$i] }} TK<br>
                            @endif
                        @endfor
                    </td>
                    <td>{{$plan->dayStays}} Nights</td>
                @else
                    <td></td>
                    <td></td>
                @endif
                
                
                
                <td><b>{{$plan->transport_name}}</b> - ({{$plan->transport_type}}) <br> 
                <b>Cost: </b>{{$plan->tcost}}  </td>
                <td><b>{{$plan->return_transport_name}}</b> - ( {{$plan->return_transport_type}} )<br> 
                <b>Cost: </b>{{$plan->rtcost}} TK </td>
                
                <td>{{$total_cost}} TK</td>
                <td> 
                    
                    <button name='delete'  class="btn btn-danger delete-button" value="{{$plan->plan_id}}">Delete</button>
                    

                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
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
        {{$all_plan->links('pagination::bootstrap-5')}}
    </div>
    
</div>




@include('footer')
<!-- Scripts -->

    <script  src="{{ asset('home_page/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script  src="{{ asset('home_page/js/popper.min.js') }}"></script> <!-- Popper tooltip library for Bootstrap -->
    <script  src="{{ asset('home_page/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script  src="{{ asset('home_page/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script  src="{{ asset('home_page/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script  src="{{ asset('home_page/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
    <script  src="{{ asset('home_page/js/morphext.min.js') }}"></script> <!-- Morphtext rotating text in the header -->
    <script  src="{{ asset('home_page/js/isotope.pkgd.min.js') }}"></script> <!-- Isotope for filter -->
    <script  src="{{ asset('home_page/js/validator.min.js') }}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script  src="{{ asset('home_page/js/scripts.js') }}"></script><!-- Custom scripts --> 
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
                        
                        $('#hotels').html(result)
                        
                    }
                });
            });
            
            $('.delete-button').click(function() {
                
                let cid = $(this).val();
                $.ajax({
                    url: '/delete',
                    method: 'post',
                    data: 'cid='+cid+'&_token={{csrf_token()}}',
                    success: function(result) {
                        
                        loadTableData();
                        
                    },
                    
                });
            });
           
            function loadTableData() {
                $.ajax({
                    url: '/gettabledata', // Replace with the actual route that returns table data
                    type: 'get',
                    success: function(data) {
                        // Replace the table body with the updated data
                        $('#yourPlans').html(data);
                    },
                    
                });
            }
            
        });
        // Delete function
        
        function showForm() {
            
            document.getElementById('yourPlans').style.display = 'block';
        }
        document.getElementById('showPlansButton').addEventListener('click', showForm);

     
    </script>
    
    
        
@endsection