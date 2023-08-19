<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | By Code Info</title>
  <link rel="stylesheet" href="{{asset('admin/admindashboard.css')}}" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="" alt="">
          <span class="nav-item">DashBoard</span>
        </a></li>
        <li><a href="">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a></li>
        <li><a href="">
          <i class="fas fa-user"></i>
          <span class="nav-item">Profile</span>
        </a></li>
        
        <li><a href="">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Settings</span>
        </a></li>
        <li><a href="">
          <i class="fas fa-question-circle"></i>
          <span class="nav-item">Help</span>
        </a></li>
        <li><a href="" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
        <h1>Admin Panel</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills">
        
        <div class="card">
          <i class="fas fa-building"></i>
          <h3>Add Apartments</h3>
          <p>Join Over 1 million Apartments.</p>
          <form>
            <button type="submit" formaction="/add">Get Started</button>
          </form>
        </div>
        
        <div class="card">
          <i class="fas fa-history"></i>
          <h3>History</h3>
          <p>Check Records.</p>
          <form>
            <button type="submit" formaction="#">Get Started</button>
          </form>
        </div>
        <div class="card">
          <i class="material-icons">info</i>
          <h3>About</h3>
          <p>Learn More.</p>
          <button>Get Started</button>
        </div>
        <div class="card">
          <i class="fab fa-app-store-ios"></i>
          <h3>DevOps</h3>
          <p>Join for development.</p>
          <button>Get Started</button>
        </div>
      </div>

      
    </section>
  </div>
</body>
</html>
