<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KCustome</title>
    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    {{-- <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{-- font --}}
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    {{-- font awesome --}}
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}" type="text/css" />
    {{-- <link rel="stylesheet" href="{{ asset('css/all.css') }}" type="text/css" /> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css"
        integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous" />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    {{-- custom --}}
    <link href="{{ asset('css/styleuser.css') }}" rel="stylesheet">

    {{-- <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/unicons.css" /> --}}
    {{-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> --}}
    <style>
        .container::before,
        .container::after {
            content: none;
        }
    </style>

</head>

<body>

    <nav>
        <div class="container">
            <h2 class="log">
                KCustome
            </h2>
            <div class="search-bar">
                <i class="uil uil-search"></i>
                <input type="search" placeholder="Search for creators, inspirations, and projects">
            </div>
            <div class="create">
                <label class="btn btn-primary" for="create-post">Create</label>

                <div class="dropdown">
                    <a role="button" onclick="dropDown()" class="dropbtn">
                        <img alt="" src="{{ Auth::user()->profile_picture }}" class="profile-photo dropbtn"
                            style="display:inline-block"> </a>
                    @if (Route::has('login'))
                        <div class="dropdown-content" id="myDropdown" style="">
                            @auth
                                <a href="{{ url('/user_profile') }}">Profile</a>
                                <a href="{{ url('/logout') }}">Log out</a>
                            @else
                                <a href="{{ route('login') }}">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            {{-- left --}}
            <div class="left">
                <a class="profile" href="{{ URL::to('/user_profile') }}">
                    <div class="profile-photo">
                        <img src="{{ Auth::user()->profile_picture }}">
                    </div>
                    <div class="handle">
                        <h4>{{ Auth::user()->name }}</h4>
                        <p class="text-muted">
                            @duck
                        </p>
                    </div>
                </a>
                <!--------------SIDEBAR-------------------->
                <div class="sidebar">
                    <a class="menu-item" id="menu-home" href="{{ URL::to('/home') }}">
                        <span><i class="bi bi-house"></i></span>
                        <h3>Home</h3>
                    </a>
                    <a class="menu-item" id="menu-user"href="{{ URL::to('/my_profile') }}">
                        <span><i class="bi bi-person"></i></span>
                        <h3>My Profile</h3>
                    </a>
                    <a class="menu-item" id="menu-noti">
                        <span><i class="bi bi-bell"><small class="notification-count">9+</small></i></span>
                        <h3>Notifications</h3>
                        {{-- <!---------------------NOTIFICATIONS POPUP----------------------->
                        <div class="notifications-popup">
                            <div>
                                <div class="profile-photo">
                                    <img src="{{ asset('images/profile-2.jpg') }}">
                                </div>
                                <div class="notification-body">
                                    <b>KeKe Benjamin</b> accepted your friend request
                                    <small class="text-muted">2 DAY AGO</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="{{ asset('images/profile-3.jpg') }}">
                                </div>
                                <div class="notification-body">
                                    <b>jonh Doe</b> commented on your post
                                    <small class="text-muted">2 HOUR AGO</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="{{ asset('images/profile-4.jpg') }}">
                                </div>
                                <div class="notification-body">
                                    <b>Marry Oppong</b> accepted your friend request
                                    <small class="text-muted">2 DAY AGO</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="{{ asset('images/profile-6.jpg') }}">
                                </div>
                                <div class="notification-body">
                                    <b>Doris Y.lartey</b> accepted your friend request
                                    <small class="text-muted">2 DAY AGO</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="{{ asset('images/profile-5.jpg') }}">
                                </div>
                                <div class="notification-body">
                                    <b>Donald Trump</b> commented on your post
                                    <small class="text-muted">2 DAY AGO</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="{{ asset('images/profile-7.jpg') }}">
                                </div>
                                <div class="notification-body">
                                    <b>Jane Doe</b> accepted your friend request
                                    <small class="text-muted">2 DAY AGO</small>
                                </div>
                            </div>
                        </div>
                        <!------------------------------END NOTIFICATION POPUP-------------------------------------> --}}
                    </a>
                    <a class="menu-item" id="menu-messages">
                        <span><i class="bi bi-chat"><small class="notification-count">6</small></i></span>
                        <h3>Messages</h3>
                    </a>
                    <a class="menu-item" id="menu-bookmark">
                        <span></span><i class="bi bi-bookmark"></i></span>
                        <h3>Bookmarks</h3>
                    </a>
                    <a class="menu-item" id="menu-analysis">
                        <span><i class="bi bi-graph-up"></i></span>
                        <h3>Analysis</h3>
                    </a>
                    {{-- <a class="menu-item" id="theme">
                        <span><i class="uil uil-palette"></i></span>
                        <h3>Theme</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-setting"></i></span>
                        <h3>Setting</h3>
                    </a> --}}
                </div>
                <!------------------------END OF SIDEBAR-------------------------->
                <label for="create-post" class="btn btn-primary">Create Post</label>
            </div>
            <!--==========MIDDLE============-->
            @if (Session::has('error'))
                <div class="alert alert-danger" id="noti-admin" role="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <h2>{{ Session('error') }}</h2>
                </div>
            @endif
            {{-- <div class="overlay-admin" role="alert">
                    <div class="popup">
                        <a class="close" href="#">&times;</a>
                        <div class="content">
                            {{ Session('error') }}
                        </div>
                    </div>
                </div> --}}

            @yield('content')
            <!-------------------END OF MIDLE------------------------->
            <!--=========RIGHT============-->
            <div class="right">
                <div class="messages">
                    <div class="heading">
                        <h4>Messages</h4><i class="uil uil-edit"></i>
                    </div>
                    <!--------------------SEARCH BAR--------------------->
                    <div class="search-bar">
                        <i class="uil uil-search"></i>
                        <input type="search" placeholder="Search messages" id="message-search">
                    </div>
                    <!--------------------MESSAGES CATEGORY--------------------->
                    <div class="category">
                        <h6 class="active">Primary</h6>
                        <h6>General</h6>
                        <h6 class="message-requests">requests(7)</h6>
                    </div>
                    <!--------------------MESSAGES--------------------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="{{ Auth::user()->profile_picture }}">
                        </div>
                        <div class="message-body">
                            <h5>Noo Phuoc Thinh</h5>
                            <p class="text-bold">Just woke up bruh</p>
                        </div>
                    </div>
                    <!--------------------MESSAGES--------------------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="{{ Auth::user()->profile_picture }}">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Son Tung</h5>
                            <p class="text-muted">lol u right</p>
                        </div>
                    </div>
                    <!--------------------MESSAGES--------------------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="{{ Auth::user()->profile_picture }}">
                        </div>
                        <div class="message-body">
                            <h5>Kim Teahuynh</h5>
                            <p class="text-bold">Ok</p>
                        </div>
                    </div>
                    <!--------------------MESSAGES--------------------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="{{ Auth::user()->profile_picture }}">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Jonh Ded</h5>
                            <p class="text-muted">2 new messages</p>
                        </div>
                    </div>
                    <!--------------------MESSAGES--------------------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="{{ Auth::user()->profile_picture }}">
                        </div>
                        <div class="message-body">
                            <h5>LyLy LaLa</h5>
                            <p class="text-bold">lol u right</p>
                        </div>
                    </div>
                </div>
                <!-------------------END OF MESSAGES-------------------------->

                <!-------------------FRIEND REQUESTS-------------------------->
                <div class="friend-requests">
                    <h4>Requests</h4>
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="{{ Auth::user()->profile_picture }}">
                            </div>
                            <div>
                                <h5>Nhu Quynh</h5>
                                <p class="text-muted">
                                    10 mutual friends
                                </p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Accept
                            </button>
                            <button class="btn">
                                Decline
                            </button>
                        </div>
                    </div>
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="{{ Auth::user()->profile_picture }}">
                            </div>
                            <div>
                                <h5>Son Tung M-TP</h5>
                                <p class="text-muted">
                                    8 mutual friends
                                </p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Accept
                            </button>
                            <button class="btn">
                                Decline
                            </button>
                        </div>
                    </div>
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="{{ Auth::user()->profile_picture }}">
                            </div>
                            <div>
                                <h5>Van Lam</h5>
                                <p class="text-muted">
                                    1 mutual friends
                                </p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Accept
                            </button>
                            <button class="btn">
                                Decline
                            </button>
                        </div>
                    </div>
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="{{ Auth::user()->profile_picture }}">
                            </div>
                            <div>
                                <h5>MoNo</h5>
                                <p class="text-muted">
                                    6 mutual friends
                                </p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Accept
                            </button>
                            <button class="btn">
                                Decline
                            </button>
                        </div>
                    </div>
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="{{ Auth::user()->profile_picture }}">
                            </div>
                            <div>
                                <h5>Ky Duyen</h5>
                                <p class="text-muted">
                                    6 mutual friends
                                </p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Accept
                            </button>
                            <button class="btn">
                                Decline
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--------------------END OF RIGHT------------------------>
        </div>
    </main>

    <script src="{{ asset('js/jquery3.6.1.js') }}"></script>
    <script src="{{ asset('js/raphael-min.js') }}"></script>
    <script src="{{ asset('js/morris.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.js') }}"></script>
    <script src="{{ asset('js/like.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
