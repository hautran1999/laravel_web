<div id="preloader">
    <div class="spinner"></div>
</div>
<header class="header-area">
    <!-- Navbar Area -->
    <div class="clever-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between container">

                <a class="nav-brand" href="/">OnlineExam</a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="myexam">My Exam</a></li>
                            <li><a href="exam">Exam</a></li>
                            <li><a href="contact">Contact</a></li>
                        </ul>

                        <!-- Search Button -->
                        <div class="search-area">
                            <form action="#" method="post">
                                <input type="search" name="search" id="search" placeholder="Search">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <!-- Register / Login -->

                        @guest
                        <div class="register-login-area">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </div>
                        @else
                        <div class="login-state d-flex align-items-center">
                            <div class="user-name mr-30">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="userName"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user fa-2x"></i> {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                                        <a class="dropdown-item" href="#">Profile</a>
                                        <a class="dropdown-item" href="#">Account Info</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endguest
                        <!-- Nav End -->
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>