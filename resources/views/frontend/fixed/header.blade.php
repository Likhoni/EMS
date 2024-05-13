<nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
  <div class="container-fluid p-0">
    <!-- logo -->
    <a class="navbar-brand" href="index.html">
      <img src="{{url('templateImage/logo.png')}}" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('home.page')}}">Home<span></span></a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link" href="#!" data-toggle="dropdown">Events<i class="fa fa-angle-down"><span></span></i></a>
          <!-- Dropdown list -->
          <ul class="dropdown-menu">
            @foreach($events as $data)
            <li><a class="dropdown-item" href="">{{$data->name}}</a></li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('create.appointment')}}">Appointment<span></span></a>
        </li>
        
        @auth('customerGuard')
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}"><span></span>Logout</a>
        </li>
        @endauth
        <!-- <li class="nav-item dropdown">
          <a class="nav-link" href="#!" data-toggle="dropdown">News <i class="fa fa-angle-down"></i><span>/</span>
          </a>
          Dropdown list
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="news.html">News without sidebar</a></li>
            <li><a class="dropdown-item" href="news-right-sidebar.html">News with right sidebar</a></li>
            <li><a class="dropdown-item" href="news-left-sidebar.html">News with left sidebar</a></li>
            <li><a class="dropdown-item" href="news-single.html">News Single</a></li>

            <li class="dropdown dropdown-submenu dropleft">
              <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0501" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>
    
              <ul class="dropdown-menu" aria-labelledby="dropdown0501">
                <li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
                <li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact<span>/</span></a>
        </li> -->
      </ul>
      @auth('customerGuard')

      <a href="{{route('view.profile',auth('customerGuard')->user()->id)}}" class="ticket" style="color:black;">
        <img src="{{url('/templateImage/icon/profileIcon.webp')}}" width="30" height="24" alt="profile">{{auth('customerGuard')->user()->name}}
      </a>

      @endauth

      @guest('customerGuard')
      <a style="color:black;" href="{{route('login')}}" class="ticket">Login<a style="color:black;" class="ticket">|</a></a>

      <a style="color:black;" href="{{route('registration')}}" class="ticket">Registration</a>

      @endguest

    </div>
  </div>
</nav>