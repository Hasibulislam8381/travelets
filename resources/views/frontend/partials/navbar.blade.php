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

    <div class="nav-right">
        <a href="#book" class="btn-book">Book Now</a>

        @auth
            {{-- Logged in: Avatar dropdown --}}
            <div class="user-dropdown">
                <button class="user-avatar-btn" id="userDropdownBtn">
                    @if (auth()->user()->avatar)
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}"
                            class="user-avatar-img">
                    @else
                        <div class="user-avatar-placeholder">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    @endif
                </button>
                <div class="dropdown-menu-custom" id="userDropdownMenu">
                    <a href="{{ route('user.profile') }}" class="dropdown-item-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                        </svg>
                        My Profile
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item-custom text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                <polyline points="16 17 21 12 16 7" />
                                <line x1="21" y1="12" x2="9" y2="12" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @else
            {{-- Guest: Login icon --}}
            <a href="{{ route('user.login') }}" class="login-icon-btn" title="Login">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="4" />
                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                </svg>
            </a>
        @endauth
    </div>
</nav>
<script>
    const btn = document.getElementById('userDropdownBtn');
    const menu = document.getElementById('userDropdownMenu');

    if (btn && menu) {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            menu.classList.toggle('show');
        });
        document.addEventListener('click', function() {
            menu.classList.remove('show');
        });
    }
</script>
