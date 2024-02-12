@php($debug_text_color = config('app.debug') ? 'text-dark' : '')
@php($debug_navbar_color = config('app.debug') ? 'navbar-light bg-warning' : 'navbar-dark bg-primary')

<nav class="navbar navbar-expand-md {{ $debug_navbar_color }} shadow-sm pe-3">
    <a class="navbar-brand {{ $debug_text_color }} m-0 text-center"
       style="width: 15rem;"
       href="{{ route('home') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto"></ul>
        <ul class="navbar-nav ms-auto">
            @auth
                @can('user-list')
                    <li><a class="nav-link {{ $debug_text_color }}"
                           href="{{ route('users.index') }}">Users</a></li>
                @endcan
                @can('role-list')
                    <li><a class="nav-link {{ $debug_text_color }}"
                           href="{{ route('roles.index') }}">Roles</a></li>
                @endcan
                @can('permission-list')
                    <li><a class="nav-link {{ $debug_text_color }}"
                           href="{{ route('permissions.index') }}">Permissions</a></li>
                @endcan
                @canany(['user-list', 'role-list', 'permission-list'])
                    <li class="nav-item py-2 py-lg-1 col-12 col-lg-auto">
                        <div class="vr d-none d-lg-flex h-100 mx-lg-2 {{ $debug_text_color }}"></div>
                        <hr class="d-lg-none my-2 text-white-50">
                    </li>
                @endcanany
                <li class="nav-item dropdown">
                    <a id="navbarDropdown"
                       class="nav-link dropdown-toggle {{ $debug_text_color }}" href="#"
                       role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item py-2 py-lg-1 col-12 col-lg-auto d-none d-sm-block">
                    <div class="vr d-none d-lg-flex h-100 mx-lg-2 {{ $debug_text_color }}"></div>
                    <hr class="d-lg-none my-2 text-white-50">
                </li>
            @endauth
            <li class="nav-item dropdown">
                <button
                    class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center {{ $debug_text_color }}"
                    id="bd-theme"
                    type="button"
                    aria-expanded="false"
                    data-bs-toggle="dropdown"
                    data-bs-display="static"
                    aria-label="Toggle theme (auto)">
                    <i class="bi bi-circle-half me-1 theme-icon-active">
                        <use href="#circle-half"></use>
                    </i>
                    <span class="d-lg-none ms-2" id="bd-theme-text">{{ __('Toggle theme') }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text">
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="light" aria-pressed="false">
                            <i class="bi bi-circle-half me-2 theme-icon">
                                <use href="#sun-fill"></use>
                            </i>
                            {{ __('Light') }}
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="dark" aria-pressed="false">
                            <i class="bi bi-moon-stars-fill me-2 theme-icon">
                                <use href="#moon-stars-fill"></use>
                            </i>
                            {{ __('Dark') }}
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center active"
                                data-bs-theme-value="auto" aria-pressed="false">
                            <i class="bi bi-circle-half me-2 theme-icon">
                                <use href="#circle-half"></use>
                            </i>
                            {{ __('Auto') }}
                        </button>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
