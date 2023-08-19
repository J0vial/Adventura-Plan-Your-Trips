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
          <p class="font-weight-bold">Packages</p>
        </div>

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">District Name</th>
              <th scope="col">Spot Name</th>
              <th scope="col">Transportation</th>
              <th scope="col">Days Staying</th>
              <th scope="col">Price</th>
              <th scope="col">Booking Status</th>
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
            </tr>
            @endforeach
            </tbody>
          </table>

        
      </main>
      <!-- End Main -->

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('admin/scripts.js') }}"></script>
  </body>
</html>





