<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') || request()->is('home') ? 'active' : '' }}" href="/">
               <i class="bi bi-house-door fs-4"></i>
                <span class="menu-title">Home</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('parsadidarshan*') ? 'active' : '' }}" href="/parsadidarshan">
               <i class="bi bi-pen fs-4"></i>
                <span class="menu-title">Prasadi Darshan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('testimonials*') ? 'active' : '' }}" href="/testimonials">
                <i class="bi bi-person fs-4"></i>
                <span class="menu-title">Testimonials</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('bookings*') ? 'active' : '' }}" href="/bookings">
               <i class="bi bi-card-list fs-4"></i>
                <span class="menu-title">Booking</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('donation*') ? 'active' : '' }}" href="/donation">
               <i class="bi bi-cash-coin fs-4"></i>
                <span class="menu-title">Donation</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('yajman*') ? 'active' : '' }}" href="/yajman">
                <i class="bi bi-person fs-4"></i>
                <span class="menu-title">Yajman</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('acharya*') ? 'active' : '' }}" href="/acharya">
                <i class="bi bi-person fs-4"></i>
                <span class="menu-title">Acharyas</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('eventgallery*') ? 'active' : '' }}" href="/eventgallery">
                <i class="bi bi-columns-gap fs-5"></i>
                <span class="menu-title">Event Gallery</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('photogallery*') ? 'active' : '' }}" href="/photogallery">
                <i class="bi bi-columns-gap fs-5"></i>
                <span class="menu-title">Photo Gallery</span>
            </a>
        </li>



         <li class="nav-item">
            <a class="nav-link {{ request()->is('aboutus*') ? 'active' : '' }}" href="/aboutus">
                <i class="bi bi-clock-history fs-4"></i>
                <span class="menu-title">Our Timing</span>
            </a>
        </li>

         <li class="nav-item">
            <a class="nav-link {{ request()->is('pages*') ? 'active' : '' }}" href="/pages">
                <i class="bi bi-file-earmark fs-4"></i>
                <span class="menu-title">Pages</span>
            </a>
        </li>

         <li class="nav-item">
            <a class="nav-link {{ request()->is('settings*') ? 'active' : '' }}" href="/settings">
                <i class="bi bi-gear fs-4"></i>
                <span class="menu-title">Setting</span>
            </a>
        </li>
    </ul>
</nav>

<style>
/* Sidebar Active State Styling */
.nav-item{
    padding: 0px !important;
}
.sidebar .nav-link.active {
    background: linear-gradient(135deg, #5d1a1e 0%, #7d2428 100%) !important;
    color: #ffffff !important;
    border-radius: 0;

    /* margin: 0px 8px; */
    box-shadow: 0 4px 12px rgba(93, 26, 30, 0.4);
    transform: translateX(2px);
    transition: all 0.3s ease;
}

.sidebar .nav-link.active i {
    color: #ffffff !important;
}

.sidebar .nav-link.active .menu-title {
    font-weight: 600;
    color: #ffffff !important;
}

/* Enhanced hover effects */
.sidebar .nav-link:hover:not(.active) {
    background: rgba(93, 26, 30, 0.1) !important;
    /* border-radius: 8px; */
    /* margin: 2px 8px; */
    transform: translateX(1px);
    transition: all 0.3s ease;
}

.sidebar .nav-link {
    padding: 12px 16px !important;
    transition: all 0.3s ease;
    border-radius: 8px;
}

/* Icon styling for active state */
.sidebar .nav-link.active i {
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
}
</style>
