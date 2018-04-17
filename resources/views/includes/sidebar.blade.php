
<!-- ##### SIDEBAR MENU ##### -->
<div class="kt-sideleft">
    <label class="kt-sidebar-label">Панель навигации</label>
    <ul class="nav kt-sideleft-menu">
        @foreach($sidebarItems as $item)
        <li class="nav-item">
            <a href="{{ $item['route'] }}" class="nav-link with-sub">
                <i class="{{ $item['icon'] }}"></i>
                <span>{{ $item['title'] }}</span>
            </a>
            @if (array_key_exists('submenu', $item))
            <ul class="nav-sub">
                @foreach($item['submenu'] as $itemSubmenu)
                <li class="nav-item"><a href="{{ $itemSubmenu['route'] }}" class="nav-link">{{ $itemSubmenu['title'] }}</a></li>
                @endforeach
            </ul>
            @endif

        </li><!-- nav-item -->
        @endforeach


    </ul>
</div><!-- kt-sideleft -->