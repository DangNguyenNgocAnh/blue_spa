<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <img src="{{ Vite::asset('resources/assets/img/logo.png') }}" alt="">
            <span class="d-none d-lg-block">Blue Spa Admin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Languages
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="min-width: 112px !important;">
                    <li><a class="dropdown-item" href="">VietNamese</a></li>
                    <li><a class="dropdown-item" href="">English</a></li>
                    <li><a class="dropdown-item" href="#">Japanese</a></li>
                </ul>
            </div>

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">2</span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have 2 new notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>Lorem Ipsum</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>30 min. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                            <h4>Dicta reprehenderit</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="dropdown-footer">
                        <a href="#">Show all notifications</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->
            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ Vite::asset('resources/assets/img/profile-img.jpg') }}" alt="Profile"
                        class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->fullname}}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><a style="color: black;"
                                href="{{route('users.show',Auth::user())}}">{{Auth::user()->fullname}}</a></h6>
                        <span>{{Auth::user()->roles}}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('users.show',Auth::user())}}">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <button id="show-setting" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="bi bi-gear"></i>
                            <span>Change password</span>
                        </button>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('users.show',Auth::user())}}">
                            <i class="bi bi-house"></i>
                            <span>User homepage</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->
</header><!-- End Header -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content form-setting">
            <div class="modal-header form-setting_header">
                <h5 class="modal-title" id="staticBackdropLabel">Account setting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-justified" type="button" role="tab" aria-controls="home"
                            aria-selected="true">
                            <i class="bi bi-shield-lock"></i>
                            Sercurity
                        </button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-justified" type="button" role="tab" aria-controls="profile"
                            aria-selected="false"></button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab"
                            data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact"
                            aria-selected="false"></button>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="myTabjustifiedContent">
                    <div class="tab-pane fade show active" id="home-justified" role="tabpanel"
                        aria-labelledby="home-tab">
                        <h5 class="setting-content_title">Change Password</h5>
                        <form action="{{route('users.change-pass')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{Auth::user()->id}}">
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-form-label">Current password</label>
                                <div class="col-sm-12">
                                    <input type="password" name="currentPass" class="form-control"
                                        value="{{ old('currentPass') }}">
                                </div>
                                @error('currentPass')
                                <div class="invalidate">{{ $message }}</div>
                                <script>
                                window.onload = function() {
                                    document.getElementById('show-setting').click();
                                }
                                </script>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-form-label">New password</label>
                                <div class="col-sm-12">
                                    <input type="password" name="newPass" class="form-control"
                                        value="{{ old('newPass') }}">
                                </div>
                                @error('newPass')
                                <div class="invalidate">{{ $message }}</div>
                                <script>
                                window.onload = function() {
                                    document.getElementById('show-setting').click();
                                }
                                </script>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-form-label">Confirm Password</label>
                                <div class="col-sm-12">
                                    <input type="password" name="confPass" class="form-control"
                                        value="{{ old('password') }}">
                                </div>
                                @error('confPass')
                                <div class="invalidate">{{ $message }}</div>
                                <script>
                                window.onload = function() {
                                    document.getElementById('show-setting').click();
                                }
                                </script>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-9 col-form-label"></label>
                                <div class="col-sm-3">
                                    <button type="submit" class="col-sm-12 btn btn-outline-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
