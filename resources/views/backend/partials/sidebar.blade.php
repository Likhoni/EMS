<nav class="navbar navbar-expand-lg bg-dark" style="padding-left: 50px;">
    <div class="container-fluid">
        <a class="nav-link active" href="{{route('admin.home.page')}}" style="color: white;">
            <svg class="bi"><use xlink:href="#house-fill"/></svg>
            Home Page
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('admin.event.list')}}" style="color: white;">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        Events
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.package.list')}}" style="color: white;">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        Packages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.food.list')}}" style="color: white;">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        Foods
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.decoration.list')}}" style="color: white;">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        Decorations
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.package.service.list')}}" style="color: white;">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        Packages Service
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.customer.list')}}" style="color: white;">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.booking')}}" style="color: white;">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        Bookings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.appointment.details')}}" style="color: white;">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        Appointment
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.logout')}}" style="color: white;">
                        <svg class="bi"><use xlink:href="#door-closed"/></svg>
                        Log out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
