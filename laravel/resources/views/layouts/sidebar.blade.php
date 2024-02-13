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
                'route' => route('home'),
                'text' => __('Dashboard'),
                'icon' => 'bi-clipboard',
                'active' => true,
            ])
            @include('layouts.sidebar.nav-item', [
                'route' => route('home'),
                'text' => __('Test'),
                'icon' => 'bi-compass',
                'target' => '_blank',
                'last' => true,
            ])
            @include('layouts.sidebar.nav-title', [
                'text' => __('User'),
            ])
            <li class="nav-item">
                @include('layouts.sidebar.dropdown', [
                    'text' => __('Desplegable 1'),
                    'icon' => 'bi-list',
                    'collapse_id' => 'dash-collapse',
                ])
                <div class="collapse" id="dash-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-1 ms-4">
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => route('home'),
                            'text' => __('Test 1'),
                        ])
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => route('home'),
                            'text' => __('Test 2'),
                            'active' => true,
                        ])
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => route('home'),
                            'text' => __('Test 3'),
                        ])
                    </ul>
                </div>
            </li>
            <li class="nav-item mb-2">
                @include('layouts.sidebar.dropdown', [
                    'text' => __('Desplegable 2'),
                    'icon' => 'bi-cloud',
                    'collapse_id' => 'home-collapse',
                    'active' => true,
                ])
                <div class="collapse" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-1 ms-4">
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => route('home'),
                            'text' => __('Test A'),
                            'icon' => 'bi-archive',
                        ])
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => route('home'),
                            'text' => __('Test B'),
                            'icon' => 'bi-rocket',
                            'target' => '_blank',
                        ])
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => route('home'),
                            'text' => __('Test C'),
                            'icon' => 'bi-apple',
                            'active' => true,
                        ])
                        @include('layouts.sidebar.nav-item-desplegable', [
                            'route' => route('home'),
                            'text' => __('Test D'),
                            'icon' => 'bi-android',
                        ])
                    </ul>
                </div>
            </li>
            @include('layouts.sidebar.nav-title', [
                'text' => __('Other'),
            ])
            @include('layouts.sidebar.nav-item', [
                'route' => route('home'),
                'text' => __('Test'),
                'icon' => 'bi-compass',
                'last' => true,
            ])
        </ul>
    @endauth
</div>
