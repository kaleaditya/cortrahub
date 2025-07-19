<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('countries*') ? 'active' : '' }}" href="{{ route('countries.index') }}">
                <i class="bi bi-globe"></i>
                <span>Countries</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('states*') ? 'active' : '' }}" href="{{ route('states.index') }}">
                <i class="bi bi-geo-alt"></i>
                <span>States</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('cities*') ? 'active' : '' }}" href="{{ route('cities.index') }}">
                <i class="bi bi-building"></i>
                <span>Cities</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('cms*') ? 'active' : '' }}" href="{{ route('cms.index') }}">
                <i class="bi bi-file-text"></i>
                <span>CMS Pages</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <i class="bi bi-people"></i>
                <span>Users</span>
            </a>
        </li>
    </ul>
</aside> 