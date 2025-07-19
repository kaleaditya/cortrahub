<!-- Remove permission conditions from all menu items -->
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Users</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('countries.index') }}" class="nav-link {{ request()->routeIs('countries.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-globe"></i>
        <p>Countries</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('states.index') }}" class="nav-link {{ request()->routeIs('states.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-map"></i>
        <p>States</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('cities.index') }}" class="nav-link {{ request()->routeIs('cities.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-city"></i>
        <p>Cities</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('experiences.index') }}" class="nav-link {{ request()->routeIs('experiences.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>Experiences</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('languages.index') }}" class="nav-link {{ request()->routeIs('languages.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-language"></i>
        <p>Languages</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-box"></i>
        <p>Products</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('cms.index') }}" class="nav-link {{ request()->routeIs('cms.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>CMS</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-tag"></i>
        <p>Roles</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('permissions.index') }}" class="nav-link {{ request()->routeIs('permissions.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-key"></i>
        <p>Permissions</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Profile</p>
    </a>
</li>

<li class="nav-item">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
        </a>
    </form>
</li> 