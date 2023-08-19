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
      <div class="container">
        <div class="row">
          <div class="col">
            <main class="main-container">
              <div class="main-title">
                <p class="font-weight-bold">Users</p>
              </div>

              <div class="main-cards">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone Number</th>
                      <th scope="col">Adress</th>
                      <th scope="col">Action</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($user as $users)
                      @if ($users->user_type == 'user')
                        <tr>
                          <td>{{$users->name}}</td>
                          <td>{{$users->email}}</td>
                          <td>{{$users->phone_num}}</td>
                          <td>{{$users->adress}}</td>
                      
                        
                          <form action="{{ route('delete_user_admin',['id' => $users->id]) }}" method="POST">
                            @csrf
                            <td>
                              <button type='submit'class="btn btn-danger">Delete</button>
                            </td>
                          </form>
                        </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table> 
              </div>

          
            </main>
          </div>
          <div class="col">
            <div class="main-title">
              <p class="font-weight-bold">Update User</p>
            </div>
            <form action="{{ route('update_user')}}" method="post">
              @csrf
              <div class="form-row">
                <div class="form-group">
                  <label for="inputAddress">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Name" name='name'>
                </div>
                <div class="form-group col-md-6">
                  
                  <select class="form-control" name='email' id='email'>
                    <option>--Select email--</option>
                    @foreach($user as $users)
                        @if ($users->user_type == 'user')
                          <option value='{{$users->id}}'>{{$users->email}}</option>
                        @endif
                    @endforeach
                  </select>
                </div>
              </div>     
                
                  
                <div class="form-group">
                  <label for="inputCity">Adress</label>
                    <input type="text" class="form-control" id="adress" placeholder="adress" name='adress'>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputAddress2">Phone No</label>
                    <input type="text" class="form-control" id="num" placeholder="phone no" name='num'>  
                  </div>
                
                    
                </div>
                  
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
            
          
          
        </div>
      <!-- End Main -->

    </div>
    
    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('admin/scripts.js') }}"></script>
  </body>
</html>