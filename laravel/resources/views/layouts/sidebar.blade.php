<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 15rem;">
    <ul class="nav nav-pills flex-column mb-auto">
        @for ($i = 0; $i < 1; $i++)
            <li class="text-uppercase pt-2 pb-1 fw-semibold"
                style="font-size: .75em;">{{ __('Administrator') }}</li>
            <li class="nav-item">
                <a href="/" target="_blank"
                   class="btn px-3 nav-link text-light w-100 text-start hover-background">
                    <div class="d-flex">
                        <i class="bi bi-house me-2"></i>
                        <span>{{ __('Home') }}</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="/" target="_blank"
                   class="btn px-3 nav-link text-light w-100 text-start hover-background-active">
                    <div class="d-flex">
                        <i class="bi bi-clipboard me-2"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="/" target="_blank"
                   class="btn px-3 nav-link text-light w-100 text-start hover-background">
                    <div class="d-flex">
                        <i class="bi bi-compass me-2"></i>
                        <span>{{ __('Test') }}</span>
                    </div>
                </a>
            </li>
        @endfor
        <li class="text-uppercase pt-2 pb-1 fw-semibold"
            style="font-size: .75em;">{{ __('User') }}</li>
        <li class="nav-item">
            <button
                    class="btn btn-toggle dropdown-toggle px-3 nav-link collapsed text-light w-100 text-start hover-background"
                    data-bs-toggle="collapse" data-bs-target="#dash-collapse" aria-expanded="true">
                <i class="bi bi-list me-1"></i>
                <span>{{ __('Desplegable') }}</span>
            </button>
            <div class="collapse" id="dash-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-1 ms-4">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light">
                            <div class="d-flex">
                                <span class="hover-link">{{ __('Dashboard') }}</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light">
                            <div class="d-flex">
                                <span class="hover-link">{{ __('Home') }}</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-light">
                            <div class="d-flex">
                                <span class="hover-link">{{ __('Dashboard') }}</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item mb-2">
            <button
                    class="btn btn-toggle dropdown-toggle px-3 nav-link collapsed text-light w-100 text-start hover-background-active"
                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                <i class="bi bi-rocket me-1"></i>
                <span>{{ __('Desplegable 2') }}</span>
            </button>
            <div class="collapse" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-1 ms-4">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light">
                            <div class="d-flex">
                                <i class="bi bi-clipboard me-2"></i>
                                <span class="hover-link">{{ __('Dashboard') }}</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light">
                            <div class="d-flex">
                                <i class="bi bi-house me-2"></i>
                                <span class="hover-link">{{ __('Home') }}</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-light">
                            <div class="d-flex">
                                <i class="bi bi-clipboard me-2"></i>
                                <span class="hover-link">{{ __('Dashboard') }}</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
