    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
            Real<span>Estate</span>
            </a>
            <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">All Data Show</li>
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category text-danger fs-6">Realestate</li>
                @if(Auth::user()->can('type.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Property Type</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                            @if(Auth::user()->can('all_type'))
                            <li class="nav-item">
                                <a href="{{route('all_type')}}" class="nav-link">All Type</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('add_type'))
                            <li class="nav-item">
                                <a href="{{route('add_type')}}" class="nav-link">Add Type</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                @if(Auth::user()->can('amenitie.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#amenitie" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Amenities</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="amenitie">
                        <ul class="nav sub-menu">
                            @if(Auth::user()->can('all_amenitie'))
                            <li class="nav-item">
                                <a href="{{route('all_amenitie')}}" class="nav-link">All Amenities</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('add_amenitie'))
                            <li class="nav-item">
                                <a href="{{route('add_amenitie')}}" class="nav-link">Add Amenities</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                @if(Auth::user()->can('type.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#groupName" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Group Name</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="groupName">
                        <ul class="nav sub-menu">
                        @if(Auth::user()->can('type.menu'))
                            <li class="nav-item">
                                <a href="{{route('all_group_name')}}" class="nav-link">All Group Name</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('type.menu'))
                            <li class="nav-item">
                                <a href="{{route('add_group_name')}}" class="nav-link">Add Group Name</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                <li class="nav-item nav-category text-danger fs-6">Permission Menu</li>
                @if(Auth::user()->can('permission_menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#permission" role="button" aria-expanded="false" aria-controls="permission">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Permission</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="permission">
                        <ul class="nav sub-menu">
                        @if(Auth::user()->can('all_permission'))
                            <li class="nav-item">
                                <a href="{{route('all_permission')}}" class="nav-link">All Permission</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('add_permission'))
                            <li class="nav-item">
                                <a href="{{route('add_permission')}}" class="nav-link">Add Permission</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                <li class="nav-item nav-category text-danger fs-6">Role Permission Menu</li>
                @if(Auth::user()->can('role_permission_menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#role" role="button" aria-expanded="false" aria-controls="role">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Role & Permission</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="role">
                        <ul class="nav sub-menu">
                        @if(Auth::user()->can('all_roles'))
                            <li class="nav-item">
                                <a href="{{route('all_roles')}}" class="nav-link">All Roles</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('add_roles'))
                            <li class="nav-item">
                                <a href="{{route('add_roles_permission')}}" class="nav-link">Add Roles Permission</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('all_roles_permission'))
                            <li class="nav-item">
                                <a href="{{route('all_roles_permission')}}" class="nav-link">All Roles Permission</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                <li class="nav-item nav-category text-danger fs-6">Manage Admin</li>
                @if(Auth::user()->can('admin_menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="admins">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Admin Type</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="admin">
                        <ul class="nav sub-menu">
                            @if(Auth::user()->can('all_admin'))
                            <li class="nav-item">
                                <a href="{{route('all_admin')}}" class="nav-link">All Admin</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('add_admin'))
                            <li class="nav-item">
                                <a href="{{route('add_admin')}}" class="nav-link">Add Admin</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif        
                <li class="nav-item">
                    <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>