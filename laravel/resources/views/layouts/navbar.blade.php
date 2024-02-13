@php($debug_text_color = config('app.debug') ? 'text-dark' : '')
@php($debug_navbar_color = config('app.debug') ? 'navbar-light bg-warning' : 'navbar-dark bg-primary')

<nav class="navbar navbar-expand-md {{ $debug_navbar_color }} shadow-sm">
    <a class="navbar-brand {{ $debug_text_color }} m-0 text-start ps-3 text-md-center ps-md-0"
       style="width: 15rem;"
       href="{{ route('home') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler border-0" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <i class="bi bi-list {{ $debug_text_color }}"></i>
    </button>
    <div class="collapse navbar-collapse mx-3" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto"></ul>
        <ul class="navbar-nav ms-auto">
            @auth
                @can('user-list')
                    <li><a class="nav-link {{ $debug_text_color }}"
                           href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
                @endcan
                @can('role-list')
                    <li><a class="nav-link {{ $debug_text_color }}"
                           href="{{ route('roles.index') }}">{{ __('Roles') }}</a></li>
                @endcan
                @can('permission-list')
                    <li><a class="nav-link {{ $debug_text_color }}"
                           href="{{ route('permissions.index') }}">{{ __('Permissions') }}</a></li>
                @endcan
                @canany(['user-list', 'role-list', 'permission-list'])
                    @include('layouts.navbar.navbar-separator')
                @endcanany
                <li class="nav-item dropdown">
                    <a id="navbarDropdown"
                       class="nav-link dropdown-toggle {{ $debug_text_color }}" href="#"
                       role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @include('layouts.navbar.navbar-separator')
            @endauth
            @include('layouts.navbar.theme-selector')
        </ul>
    </div>
</nav>
