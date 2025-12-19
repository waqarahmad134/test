<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('index') }}" class="sidebar-logo">
            <img src="{{ asset('public/assets/images/logo.png') }}" alt="site logo" width="100" class="light-logo">
            <img src="{{ asset('public/assets/images/logo-light.png') }}" alt="site logo" width="100" class="dark-logo">
            <img src="{{ asset('public/assets/images/logo-icon.png') }}" alt="site logo" width="43" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="">
                <a href="{{ route('index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('cases.index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Manage Institution</span>
                </a>
            </li>
            <li>
                <a href="{{ route('cats.index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Manage Category</span>
                </a>
            </li>
            <li>
                <a href="{{ route('subcats.index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Manage Subcategory</span>
                </a>
            </li>
            <li>
                <a href="{{ route('judges.index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Manage Judges</span>
                </a>
            </li>
            <li>
                <a href="{{ route('ps.index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Manage Police Stations</span>
                </a>
            </li>
           
            
            
            
            <!-- <li class="sidebar-menu-group-title">User Management</li> -->
            <!-- <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Users</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('users.index') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> All Users</a>
                    </li>
                    <li>
                        <a href="{{ route('users.index', ['role' => 'admin']) }}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Admin List</a>
                    </li>
                    <li>
                        <a href="{{ route('users.index', ['role' => 'police']) }}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Police List</a>
                    </li>
                    <li>
                        <a href="{{ route('users.index', ['role' => 'court']) }}"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Court List</a>
                    </li>
                    <li>
                        <a href="{{ route('users.index', ['role' => 'prosecution']) }}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Prosecution List</a>
                    </li>
                </ul>
            </li> -->
           
            <li>
                <a href="{{ route('settings') }}">
                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                    <span>Settings</span>
                </a>
            </li>
            
        </ul>
    </div>
</aside>