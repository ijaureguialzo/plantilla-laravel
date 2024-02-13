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
        <span class="d-md-none ms-2" id="bd-theme-text">{{ __('Toggle theme') }}</span>
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
