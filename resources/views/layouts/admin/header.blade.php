 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between h100 spBack">
        <a href="{{route('dashboard')}}" class="logo d-flex align-items-center">
            {{-- <img src="{{asset('admin')}}/img/logo.png" alt=""> --}}
            <p class="d-lg-block headerTxt">Cortra</p>
        </a>
        </div><!-- End Logo -->

        @php
            $routeName = Route::currentRouteName();
            $pageTitles = [
                'dashboard'     => 'Dashboard',
                'roles.index'   => 'Roles',
                'users.index'   => 'Member',
                'order-item'    => 'Order Items',
                'manage-order'  => 'Manage Orders',
                'roles.show'    => 'Show Role',
                'roles.edit'    => 'Edit Role',
                'users.show'    => 'Show Member',
                'users.edit'    => 'Edit Member',
                'order-edit'    => 'Edit',
                'profile.show'  => 'Profile',
                'home'          => 'Dashboard',
                'manage-order-change-status' =>'Update Status',
                'manage-order-create' => 'Order Create',
                'users.create' =>'Create Member',

                'roles.index' =>'Category',
                'roles.create' =>'Category',
                'roles.edit' =>'Category',
                'roles.show' =>'Category',

                'countries.index' =>'Country',
                'countries.create' =>'Country',
                'countries.edit' =>'Country',
                'countries.show' =>'Country',

                'experiences.index' =>'Speciality',
                'experiences.create' =>'Speciality',
                'experiences.edit' =>'Speciality',
                'experiences.show' =>'Speciality',

                'languages.index' =>'Language',
                'languages.create' =>'Language',
                'languages.edit' =>'Language',
                'languages.show' =>'Language',

                'products.index' =>'Product',
                'products.create' =>'Product',
                'products.edit' =>'Product',
                'products.show' =>'Product',




            ];
            $pageTitle = $pageTitles[$routeName] ?? 'Page';
        @endphp
        <nav class="header-nav">
        <p class="chngTxt">{{$pageTitle}}</p>
        <ul class="d-flex align-items-center">

            <li class="nav-item d-none d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
            </a>
            </li><!-- End Search Icon-->



        {{-- <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-chat-left-text"></i>
                <span class="badge bg-success badge-number">3</span>
            </a><!-- End Messages Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                <li class="dropdown-header">
                You have 3 new messages
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                <a href="#">
                    <img src="{{asset('admin')}}/img/messages-1.jpg" alt="" class="rounded-circle">
                    <div>
                    <h4>Maria Hudson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>4 hrs. ago</p>
                    </div>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                <a href="#">
                    <img src="{{asset('admin')}}/img/messages-2.jpg" alt="" class="rounded-circle">
                    <div>
                    <h4>Anna Nelson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>6 hrs. ago</p>
                    </div>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                <a href="#">
                    <img src="{{asset('admin')}}/img/messages-3.jpg" alt="" class="rounded-circle">
                    <div>
                    <h4>David Muldon</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>8 hrs. ago</p>
                    </div>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="dropdown-footer">
                <a href="#">Show all messages</a>
                </li>

            </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->--}}

            <li class="nav-item dropdown pe-3">
                @php
                    $user = Auth::user();
                    $company = Auth::guard('company')->user();
                @endphp
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <p class="d-md-block dropdown-toggle ps-2 mb-0 userTxt"><span>Welcome,</span>
                    @if($user)
                        {{ $user->name }}
                    @elseif($company)
                        {{ $company->contact_name }}
                    @else
                        Guest
                    @endif
                </p>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile dropUl">
                @if($user)
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); this.querySelector('form').submit();">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline fullWd noMbLg">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </a>
                </li>
                @elseif($company)
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); this.querySelector('form').submit();">
                        <form action="{{ route('company.logout') }}" method="POST" class="d-inline fullWd noMbLg">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </a>
                </li>
                @endif
            </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
        </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->