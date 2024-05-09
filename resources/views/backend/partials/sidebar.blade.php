<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('admin.home.page')}}">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Home Page
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('admin.event.list')}}">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>  
                Events
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('admin.service.list')}}">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Services
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('admin.booking.details')}}">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Bookings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('admin.payment.details')}}">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Payment
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('admin.appointment.details')}}">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Appointment
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Reports
              </a>
            </li>
           </ul>
          <hr class="my-3">
          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                Settings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('admin.logout')}}">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Log out
              </a>
            </li>
          </ul>
        </div>
    </div>