<header class="fixed-top bg-white">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- start logo -->
            @include('layouts.include.logo',['width'=>'30%'])
            <!-- end logo -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            About us
                        </a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">
                                Log in
                            </a>
                        </li>
                        <li class="nav-item get-started">
                            <a class="btn btn-danger" href="{{route('register')}}">
                                Get Started <i class="bi bi-arrow-right"></i>
                            </a>
                        </li>
                    @else

                        <li class="nav-item dropdown auth-link ml-2 ">
                            <a class="nav-link dropdown-toggle bg-danger text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li>
                                    <a class="dropdown-item" href="{{route('admin.dashboard')}}">
                                        <i class="bi bi-speedometer"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-gear"></i> Settings
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{route('logout')}}">
                                        <i class="bi bi-box-arrow-left"></i> Sign out
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
