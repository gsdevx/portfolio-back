<div x-transition.opacity :class="headerFixed ? 'position-fixed top-0 animate__animated animate__fadeIn' : ''" class="header container-fluid d-flex flex-row flex-wrap align-items-center justify-content-center py-3 mb-4 border-bottom">
    <ul id="menu" class="nav d-flex flex-row justify-content-center gap-3">
        <li class="position-relative">
            <a class="nav-link px-2 link-dark {{ request()->routeIs('profile') ? 'link-active' : '' }}" href="{{ route('profile') }}">О себе</a>
        </li>

        <li class="position-relative">
            <a class="nav-link px-2 link-dark {{ request()->routeIs('work-cases.index') ? 'link-active' : '' }}" href="{{ route('work-cases.index') }}">Кейсы</a>
        </li>
    </ul>
</div>
