<header id="header" class="header fixed-top  align-items-center justify-content-between header-big">
    <div class="d-flex align-items-center justify-content-between">
        <div class="logo d-flex align-items-center">
            <a href="{{route('user.dashboard')}}">
                <img src="{{ Vite::asset('resources/assets/img/logo.png') }}" alt="">
            </a>
            <div style="padding-top: 13px;">
                <span class="d-none d-lg-block">Blue Spa</span>
                <p style="font-weight: lighter;">Beauty Center</p>
            </div>
        </div>
    </div>
    <ul class="d-flex align-items-center  justify-content-between"
        style="padding-left: 0px;flex-grow: 1; padding-top: 12px">
        <li class="dropdown-item" style="text-align: center;"><a class="header-item-a"
                href="{{route('dashboard.about')}}">Giới
                thiệu</a></li>
        <div class="dropdown">
            <a class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Gói dịch vụ
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{route('category.listItem',1)}}"> Chăm sóc</a>
                <a class="dropdown-item" href="{{route('category.listItem',2)}}"> Điều trị</a>
                <a class="dropdown-item" href="{{route('category.listItem',3)}}"> Thẩm mỹ</a>
                <a class="dropdown-item" href="{{route('category.listItem',4)}}">Phun xăm</a>
            </div>
        </div>
        <li class="dropdown-item" style="text-align: center;"><a class="header-item-a"
                href="{{route('dashboard.coupon')}}">Mã giảm giá</a>
        </li>
        <li class="dropdown-item" style="text-align: center;"><a class="header-item-a"
                href="{{route('user.apointment')}}">Đặt lịch hẹn</a>
        </li>
    </ul>
    <nav class="header-nav">
        <div>
            <ul class="d-flex align-items-center" style="padding-right: 30px;padding-top: 13px;">
                @if(!Auth::check())
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{route('login')}}">
                    <i class=" ri-login-box-fill" style="font-size: 30px;"></i>
                </a>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link nav-profile d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                        <span class="">Hello, {{Auth::user()->fullname}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><a style="color: black;" href="">{{Auth::user()->fullname}}</a></h6>
                            <span>Code : {{Auth::user()->code}}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @if(Auth::user()->department->name != 'Customer')
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('admin.dashboard')}}">
                                <i class="bi bi-house"></i>
                                <span>Admin homepage</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @endif
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('user.show')}}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <button id="show-setting" class="dropdown-item d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#changePassword">
                                <i class="bi bi-gear"></i>
                                <span>Change password</span>
                            </button>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('user.showAllPackage')}}">
                                <i class="bi bi-house"></i>
                                <span>My packages</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign out</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

            </ul>
        </div>
    </nav>
</header>
<nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed header-small"
    style="z-index: 999; background: #fff; width: 100%">
    <div class="container-fluid">
        <div class="logo d-flex align-items-center">
            <a href="{{route('user.dashboard')}}">
                <img src="{{ Vite::asset('resources/assets/img/logo.png') }}" alt="">
            </a>
            <div style="padding-top: 13px;">
                <span class="d-lg-block">Blue Spa</span>
                <p style="font-weight: lighter;">Beauty Center</p>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('dashboard.about')}}">Giới
                        thiệu</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Gói dịch vụ
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('category.listItem',1)}}"> Chăm sóc</a></li>
                        <li><a class="dropdown-item" href="{{route('category.listItem',2)}}"> Điều trị</a></li>
                        <li><a class="dropdown-item" href="{{route('category.listItem',3)}}"> Thẩm mỹ</a></li>
                        <li><a class="dropdown-item" href="{{route('category.listItem',2)}}"> Điều trị</a></li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('dashboard.coupon')}}">Mã giảm giá</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('user.apointment')}}">Đặt lịch hẹn</a>
                </li>
                <li class="nav-item">
                    @if(!Auth::check())
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{route('login')}}">
                        Login <i class=" ri-login-box-fill" style="font-size: 30px;"></i>
                    </a>
                    @else
                <li class="nav-item dropdown">
                    <a class="nav-link nav-profile d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                        <span style="color: #012970">Hello, {{Auth::user()->fullname}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        @if(Auth::user()->department->name != 'Customer')
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('admin.dashboard')}}">
                                <i class="bi bi-house"></i>
                                <span>Admin homepage</span>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('user.show')}}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <button id="show-setting" class="dropdown-item d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#changePassword">
                                <i class="bi bi-gear"></i>
                                <span>Change password</span>
                            </button>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('user.showAllPackage')}}">
                                <i class="bi bi-house"></i>
                                <span>My packages</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign out</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Modalchangepass -->
<div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
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
                        <form action="{{route('user.changePassword')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{Auth::user()->id??null}}">
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
