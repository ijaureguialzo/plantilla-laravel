<li class="nav-item {{ isset($last) ? 'mb-2' : '' }}">
    <a href="{{ $route }}"
       @isset($target)
           target="{{ $target }}"
       @endisset
       class="nav-link text-light hover-background{{ request()->fullUrlIs($route) ? '-active' : '' }}">
        <div class="d-flex">
            @isset($icon)
                <i class="bi {{ $icon }} me-2"></i>
            @endisset
            <span>{{ $text }}</span>
        </div>
    </a>
</li>
