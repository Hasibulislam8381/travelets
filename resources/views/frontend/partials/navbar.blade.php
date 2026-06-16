<nav>
    <a href="{{ route('home') }}" class="nav-logo">
        <img src="{{ asset('frontend/images/logo.png') }}" alt="Vromonkonna Logo" class="logo-img">
    </a>
    <ul class="nav-links">
        <li><a href="{{ route('travels.index') }}"
                class="{{ request()->routeIs('travels.*') ? 'active' : '' }}">Travel</a></li>
        <li><a href="{{ route('training.index') }}"
                class="{{ request()->routeIs('training.*') ? 'active' : '' }}">Training</a></li>
        <li><a href="{{ route('dormatory.index') }}"
                class="{{ request()->routeIs('dormatory.*') ? 'active' : '' }}">Dormitory</a></li>
        <li><a href="#social">Social Act</a></li>
        <li><a href="{{ route('souvenirs.index') }}"
                class="{{ request()->routeIs('souvenirs.*') ? 'active' : '' }}">Souvenirs</a></li>
        <li><a href="#about">About</a></li>
    </ul>
    <a href="#book" class="btn-book">Book Now</a>
</nav>
