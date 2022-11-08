@extends('layouts.user')

@section('content')
    <style>
        .left .sidebar #menu-user {
            background: var(--color-light);
        }

        #menu-user h3 {
            color: var(--color-primary);
        }

        .left .sidebar #menu-user::before {
            content: "";
            display: block;
            width: 0.5rem;
            height: 100%;
            position: absolute;
            background: var(--color-primary);
        }

        .left .sidebar .menu-item:first-child #menu-user {
            border-top-left-radius: var(--card-border-radius);
            overflow: hidden;
        }

        .left .sidebar .menu-item:last-child #menu-user {
            border-bottom-left-radius: var(--card-border-radius);
            overflow: hidden;
        }
    </style>
    <div class="middle">
        <div class="user_profile">
            <h2 class="text-center">User profile</h2>
            {{-- <div class="profile-photo">
                <img src="{{ Auth::user()->profile_picture }}">
            </div> --}}
            <div class=" profile-photo" id="upload">
                <img src="{{ Auth::user()->profile_picture }}">
                <div class="round">
                    <input type="file">
                    <i class="fa fa-camera" style="color: #fff;"></i>
                </div>
            </div>

            <div class="profile">
                <h5>User name: {{ Auth::user()->name }}</h5>
                <h5>Bio: {{ Auth::user()->bio }}</h5>
                <h5>Age: {{ Carbon\Carbon::parse(Auth::user()->dateofbirth)->age }}</h5>
                <h5>Gender:
                    @if (Auth::user()->gender == 0)
                        Female
                    @else
                        Male
                    @endif
                </h5>
            </div>
        </div>
        <div class="feeds">
            {{-- @foreach ($category as $key => $cat) --}}
            {{-- @if ($cat->category_status == '1') --}}
            @foreach (Auth::user()->posts as $post)
                <div class="feed">
                    <div class="head">
                        <div class="user">
                            <div class="profile-photo">
                                <img src="{{ Auth::user()->profile_picture }}">
                            </div>
                            <div class="ingo">
                                <h3>{{ Auth::user()->name }}</h3>
                                {{-- <small>Da Nang, 4 MINUTES AGO</small> --}}
                            </div>
                        </div>
                        <span class="edit">
                            <i class="fa-light fa-pen-to-square"></i>
                        </span>
                    </div>
                    <div class="photo">
                        <img src="{{ asset('upload/post/' . $post->post_image) }}">
                    </div>

                    <div class="action-buttons">
                        <div class="interaction-buttons">
                            <span><i class="uil uil-heart"></i></span>
                            <span><i class="uil uil-comment-dots"></i></span>
                            <span><i class="uil uil-share-alt"></i></span>
                        </div>
                        <div class="bookmark">
                            <span><i class="uil uil-bookmark-full"></i></span>
                        </div>
                    </div>
                    <div class="liked-by">
                        <span><img src="{{ asset('upload/post/' . $post->post_image) }}"></span>
                        <span><img src="{{ asset('upload/post/' . $post->post_image) }}"></span>
                        <span><img src="{{ asset('upload/post/' . $post->post_image) }}"></span>
                        <p>liked by <b>Ernest Achiever</b> and <b>2,323 other</b></p>
                    </div>
                    <div class="caption">
                        <p><b>Vo Hoang Thao</b> Lorem ipsum dolor sit qiusquam eius. <span
                                class="harsh-tag">#lifestyle</span>
                        </p>
                    </div>
                    <div class="comments text-muted">View all 423 comments</div>
                </div>
            @endforeach
            {{-- @endif --}}
            {{-- @endforeach --}}
        </div>
    </div>
@endsection
