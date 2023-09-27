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
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{route('admin.dashboard')}}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Realestate</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Property Type</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all_type')}}" class="nav-link">All Type</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add_type')}}" class="nav-link">Add Type</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#amenitie" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Amenities</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="amenitie">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all_amenitie')}}" class="nav-link">All Amenities</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add_amenitie')}}" class="nav-link">Add Amenities</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#groupName" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Group Name</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="groupName">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all_group_name')}}" class="nav-link">All Group Name</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add_group_name')}}" class="nav-link">Add Group Name</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Components</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                <i class="link-icon" data-feather="feather"></i>
                <span class="link-title">UI Kit</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                    </li>
                </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Role & Permission</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">Role & Permission</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all_permission')}}" class="nav-link">All Permission</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add_permission')}}" class="nav-link">Add Permission</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('all_roles')}}" class="nav-link">All Roles</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add_roles_permission')}}" class="nav-link">Add Roles Permission</a>
                        </li>
                    </ul>
                </div>
            </li>            
            <li class="nav-item nav-category">All Roles</li>
            <li class="nav-item">
                <a href="{{ route('all_roles') }}" target="_blank" class="nav-link">
                <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">All Roles</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                <i class="link-icon" data-feather="hash"></i>
                <span class="link-title">Documentation</span>
                </a>
            </li>
            </ul>
        </div>
    </nav>