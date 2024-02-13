<div class="d-flex flex-column p-3 text-bg-dark col-12 col-sm-2">
    @auth
        <ul class="nav nav-pills flex-column mb-auto">
            @include('layouts.sidebar.nav-title', [
                'text' => __('Administrator'),
            ])
            @include('layouts.sidebar.nav-item', [
                'route' => route('home'),
                'text' => __('Home'),
                'icon' => 'bi-house',
            ])
            @include('layouts.sidebar.nav-item', [
                'route' => route('users.index'),
                'text' => __('Users'),
                'icon' => 'bi-person',
            ])
            @include('layouts.sidebar.nav-item', [
                'route' => route('roles.index'),
                'text' => __('Roles'),
                'icon' => 'bi-person-badge',
            ])
            @include('layouts.sidebar.nav-item', [
                'route' => route('permissions.index'),
                'text' => __('Permissions'),
                'icon' => 'bi-key',
                'last' => true,
            ])
            @include('layouts.sidebar.nav-title', [
                'text' => __('User'),
            ])
            <li class="nav-item">
                @include('layouts.sidebar.dropdown', [
                    'text' => 'Desplegable 1',
                    'icon' => 'bi-list',
                    'collapse_id' => 'dash-collapse',
                ])
                <div class="collapse" id="dash-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-1 ms-4">
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => '#',
                            'text' => 'Test 1',
                        ])
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => '#',
                            'text' => 'Test 2',
                        ])
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => '#',
                            'text' => 'Test 3',
                        ])
                    </ul>
                </div>
            </li>
            <li class="nav-item mb-2">
                @include('layouts.sidebar.dropdown', [
                    'text' => 'Desplegable 2',
                    'icon' => 'bi-cloud',
                    'collapse_id' => 'home-collapse',
                ])
                <div class="collapse" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-1 ms-4">
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => '#',
                            'text' => 'Test A',
                            'icon' => 'bi-archive',
                        ])
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => '#',
                            'text' => 'Test B',
                            'icon' => 'bi-rocket',
                            'target' => '_blank',
                        ])
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => route('home'),
                            'text' => 'Test C',
                            'icon' => 'bi-apple',
                        ])
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => '#',
                            'text' => 'Test D',
                            'icon' => 'bi-android',
                        ])
                    </ul>
                </div>
            </li>
            @include('layouts.sidebar.nav-title', [
                'text' => 'Other',
            ])
            @include('layouts.sidebar.nav-item', [
                'route' => '#',
                'text' => 'Test',
                'icon' => 'bi-compass',
                'last' => true,
            ])
        </ul>
    @endauth
</div>
