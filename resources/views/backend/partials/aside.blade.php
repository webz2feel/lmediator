<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="index.html#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="index.html#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link active">
                        <i class="icon-home4"></i>
                        <span>
									Dashboard
								</span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Posts</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Posts">
                        <li class="nav-item"><a href="" class="nav-link active">All Posts</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Add New</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Categories</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Tags</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="index.html#" class="nav-link"><i class="icon-color-sampler"></i> <span>Pages</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Pages">
                        <li class="nav-item"><a href="" class="nav-link">All Pages</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Add New</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="icon-comments"></i>
                        <span> Comments </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="index.html#" class="nav-link"><i class="icon-color-sampler"></i> <span>Access</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Access">
                        <li class="nav-item"><a href="{{route('admin.permission.index')}}" class="nav-link">View Permissions</a></li>
                        <li class="nav-item"><a href="{{route('admin.role.index')}}" class="nav-link">View Roles</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="index.html#" class="nav-link"><i class="icon-color-sampler"></i> <span>Users</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Users">
                        <li class="nav-item"><a href="" class="nav-link">All Users</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Add New</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Your Profile</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="changelog.html" class="nav-link">
                        <i class="icon-list-unordered"></i>
                        <span>logs</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /main navigation -->
    </div>
    <!-- /sidebar content -->
</div>