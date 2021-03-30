<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="nav-link pl-1 pr-1 leading-none ">
                <img src="{{asset('img/avatar/avatar-3.jpeg')}}" alt="user-img" class="avatar-xl rounded-circle mb-1">
                <span class="pulse bg-success" aria-hidden="true"></span>
            </div>
            <div class="user-info">
                <h6 class=" mb-1 text-dark">Alica Nestle</h6>
                <span class="text-muted app-sidebar__user-name text-sm"> Web-Designer</span>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li>
            <a class="side-menu__item" href="{{route('dashboard')}}"><i class="side-menu__icon fa fa-laptop"></i><span
                    class="side-menu__label">Dashboard</span></a>
        </li>

        <li>
            <a class="side-menu__item" href="{{route('customer.index')}}"><i
                    class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Customers</span></a>
        </li>

        <li>
            <a class="side-menu__item" href="{{route('service.index')}}"><i class="side-menu__icon fa fa-cogs"></i><span
                    class="side-menu__label">Services</span></a>
        </li>

        <li>
            <a class="side-menu__item" href="{{route('bill.index')}}"><i class="side-menu__icon fa fa-cogs"></i><span
                    class="side-menu__label">Bills</span></a>
        </li>

    </ul>
</aside>
