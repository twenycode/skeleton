<div class="d-flex flex-column align-items-center align-items-sm-start">
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">
        <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
                <i class="bi bi-speedometer"></i>
                <span class="ms-1 d-none d-sm-inline">Dashboard
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="bi bi-list"></i>
                <span class="ms-1 d-none d-sm-inline"> Items
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="bi bi-people"></i>
                <span class="ms-1 d-none d-sm-inline"> Clients
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="bi bi-wallet"></i>
                <span class="ms-1 d-none d-sm-inline"> Payment Methods
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="bi bi-wallet"></i>
                <span class="ms-1 d-none d-sm-inline"> History</span>
            </a>
        </li>

        <!-----------------------
        /  ACCESS CONTROL
        ------------------------->
        @canany(['role_view','permission_view','admin_view','user_view'])
            <li class="nav-item">
                <a href="#acl" data-bs-toggle="collapse" class="nav-link align-middle ">
                    <i class="bi bi-shield-check"></i>
                    <span class="ms-1 d-none d-sm-inline">Access Control</span>
                    <span class="caret-icon bi bi-caret-down"></span>
                </a>
                <ul class="collapse nav flex-column ms-1 submenu" id="acl" data-bs-parent="#menu">
                    @permissionTo(['role_view'])
                    <li>
                        <a href="{{route('admin.roles.index')}}" class="nav-link">Roles </a>
                    </li>
                    @endpermissionTo

                    @permissionTo(['permission_view'])
                    <li>
                        <a href="{{route('admin.permissions.index')}}" class="nav-link">Permissions</a>
                    </li>
                    @endpermissionTo

                    @permissionTo(['user_view'])
                    <li class="w-100">
                        <a href="{{route('admin.users.index')}}" class="nav-link">Public Users</a>
                    </li>
                    @endpermissionTo

                    @permissionTo(['admin_view'])
                    <li class="w-100">
                        <a href="{{route('admin.admins.index')}}" class="nav-link">Admin Users</a>
                    </li>
                    @endpermissionTo
                </ul>
            </li>
        @endcanany

        <!-----------------------
        /  MONITORING
        ------------------------->
        @canany(['activity-log_view','authentication-log_view'])
            <li class="nav-item">
                <a href="#ulogs" data-bs-toggle="collapse" class="nav-link align-middle ">
                    <i class="bi bi-activity"></i>
                    <span class="ms-1 d-none d-sm-inline">User Logs</span>
                    <span class="caret-icon bi bi-caret-down"></span>
                </a>
                <ul class="collapse nav flex-column ms-1 submenu" id="ulogs" data-bs-parent="#menu">
                    @permissionTo('activity-log_view')
                    <li>
                        <a href="{{route('admin.activity-logs.index')}}" class="nav-link">Activity Logs</a>
                    </li>
                    @endpermissionTo
                    @permissionTo('authentication-log_view')
                    <li>
                        <a href="{{route('admin.authentication-logs.index')}}" class="nav-link">Authentication Logs</a>
                    </li>
                    @endpermissionTo
                </ul>
            </li>
        @endcanany

        <!-----------------------
        /  SYSTEM SETTINGS
        ------------------------->
        @canany(['backup_view','config_view'])
            <li class="nav-item">
                <a href="#setting" data-bs-toggle="collapse" class="nav-link align-middle ">
                    <i class="bi bi-gear"></i>
                    <span class="ms-1 d-none d-sm-inline">Settings</span>
                    <span class="caret-icon bi bi-caret-down"></span>
                </a>
                <ul class="collapse nav flex-column ms-1 submenu" id="setting" data-bs-parent="#menu">
                    @permissionTo('backup_view')
                    <li>
                        <a href="{{route('admin.backups.index')}}" class="nav-link">Backups</a>
                    </li>
                    @endpermissionTo
                    @permissionTo('config_view')
                    <li>
                        <a href="{{route('admin.configs.index')}}" class="nav-link">Configurations</a>
                    </li>
                    @endpermissionTo
                </ul>
            </li>


        @endcanany
    </ul>
    <hr>
</div>

