<li class="nav-item {{ isset($last) ? 'mb-2' : '' }}">
    <a href="{{ $route }}"
       @isset($target)
           target="{{ $target }}"
       @endisset
       class="nav-link text-light {{ request()->fullUrlIs($route) ? 'hover-background-active' : '' }}">
        <div class="d-flex">
            @isset($icon)
                <i class="bi {{ $icon }} me-2"></i>
            @endisset
            <span class="hover-link">{{ $text }}</span>
        </div>
    </a>
</li>
