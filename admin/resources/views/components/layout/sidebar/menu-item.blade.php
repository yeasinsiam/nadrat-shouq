@props(['active' => false, 'hasSubMenu' => false, 'title', 'link' => 'javascript:void(0);', 'iconClass' => null])


<li @class([
    'menu-item',
    'active' => $active,
    'open' => $active && $hasSubMenu,
])>
    <a href="{{ $link }}" @class(['menu-link', 'menu-toggle' => $hasSubMenu])>
        @if ($iconClass)
            <i class="menu-icon tf-icons ti {{ $iconClass }}"></i>
        @endif
        <div data-i18n="{{ $title }}">{{ $title }}</div>
    </a>
    @if ($hasSubMenu)
        <ul class="menu-sub">
            {{ $slot }}
        </ul>
    @endif
</li>
