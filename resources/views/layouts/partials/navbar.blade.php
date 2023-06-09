{{--
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between">

            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="https://www.businesslist.ph/img/ph/j/1541558349-26-purplebug-inc.png" alt="" width="130px" height="30px">
            </a>



            @auth
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth()->user()->name}}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><button class="dropdown-item" type="button">Action</button></li>
                        <li><button class="dropdown-item" type="button">Another action</button></li>
                        <li><a href="{{ route('logout.perform') }}" class="btn dropdown-item">Logout</a></li>
                    </ul>
                </div>
            @endauth

            @guest
            <div class="text-end">
                <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
            </div>
            @endguest
      </div>
    </div> --}}

 <!-- Navbar -->
 <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler" id="sidebarMenuBtn" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
        aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Brand -->
      <a class="navbar-brand ms-3" href="#">
        <img src="https://www.businesslist.ph/img/ph/j/1541558349-26-purplebug-inc.png" alt="" width="" height="30" loading="lazy" />
      </a>



      <!-- Right links -->
        @auth
            <div class="dropdown dropstart me-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    {{auth()->user()->name}}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><button class="dropdown-item" type="button">Action</button></li>
                    <li><button class="dropdown-item" type="button">Another action</button></li>
                    <li><a href="{{ route('logout.perform') }}" class="btn dropdown-item">Logout</a></li>
                </ul>
            </div>
        @endauth

        @guest
            <div class="text-end">
                <a href="{{ route('login.perform') }}" class="btn btn-sm btn-success me-2">Login</a>
                <a href="{{ route('register.perform') }}" class="btn btn-sm btn-warning">Sign-up</a>
            </div>
        @endguest
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
