<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin/styles.css') }}">
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <span class="material-icons-outlined">search</span>
        </div>
        <div class="header-right">
          <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">email</span>
          <span class="material-icons-outlined">account_circle</span>
        </div>
      </header>
      <!-- End Header -->

    @include('adminDashboard.navbar')

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">Add Packages</p>
        </div>
        @if(Session::has('add'))
            <div id='sess'class="alert alert-success" >{{Session::get('add')}}</div>
        @endif
        <form action="add_pac_admin" method="post">
          @csrf
          
          <select class="form-control" name='hotel' id='hotel' >
            <option>--Select Hotels--</option>
            @foreach($hotel as $hotels)
              <option value='{{$hotels->id}}'>{{$hotels->name}}</option>
            @endforeach
          </select>
          <br>
          
          
          <select class="form-control" name='spot' id='spot'>
            <option>--Select Spots--</option>
            @foreach($spot as $spots)
              <option value='{{$spots->id}}'>{{$spots->name}}</option>
            @endforeach
          </select>
          <br>
          <select class="form-control" name='trans' id='trans'>
            <option>--Select Transportations--</option>
            @foreach($transport as $transports )
              <option value='{{$transports->id}}'>Name: {{$transports->transport_name}} || From:{{$transports->disName}} || To:{{$transports->spotName}} </option>
            @endforeach
          </select>
          
          <br>
          <input class="form-control" type="text" placeholder="Day Stays" name='stay' id='stay'>
          <br>
          <input class="form-control" type="text" placeholder="Price" name='price' id='price'>
          <br>

          <button type="submit" class="btn btn-success">Add Package</button>
        </form>
        <br>
        <br>
        <div class="main-title">
          <p class="font-weight-bold">Packages</p>
        </div>
        @if(Session::has('deleted'))
            <div id='sess' >{{Session::get('deleted')}}</div>
        @endif
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Hotel Name</th>
              <th scope="col">Spot Name</th>
              <th scope="col">Transportation</th>
              <th scope="col">Days Staying</th>
              <th scope="col">Price</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($package as $packages)
            <tr>
              <td>{{$packages->spotName}}</td>
              <td>{{$packages->hotelName}}</td>
              <td>{{$packages->transport_name}}</td>
              <td>{{$packages->staying}}</td>
              <td>{{$packages->price}}</td>
              <form action="{{ route('delete_pac_admin', ['id' => $packages->id]) }}" method="POST">
                @csrf
                <td>
                  <button type='submit'class="btn btn-danger">Delete</button>
                </td>
              </form>
            </tr>
            @endforeach
            </tbody>
          </table>
          <div class="main-title">
            <p class="font-weight-bold">User Packages</p>
          </div>
          <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">User Name</th>
              <th scope="col">Package Id</th>
              <th scope="col">Payment Status</th>
              <th scope="col">Phone Num</th>
              <th scope="col">Transaction ID</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($package as $packages)
            <tr>
              <td>{{$packages->uid}}</td>
              <td>{{$packages->upid}}</td>
              <td>{{$packages->pay}}</td>
              <td>{{$packages->pnum}}</td>
              <td>{{$packages->tran}}</td>
              <form action="{{ route('approve_pac_admin', ['id' => $packages->id]) }}" method="POST">
                @csrf
                @if ($packages->pay != 'approved')
                <td>
                  <button type='submit'class="btn btn-success">Approve</button>
                </td>
                @else
                <td>Confirmed</td>
                @endif
              </form>
            </tr>
            @endforeach
            </tbody>
          </table>
        
      </main>
      <!-- End Main -->
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

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('admin/scripts.js') }}"></script>
  </body>
</html>





