@extends('layouts.user')

@section('content')
    <div class="middle">
        {{-- @foreach ($user as $user) --}}
        <div class="user_profile row me-0 ms-0">
            {{-- <h2 class="text-center">User profile</h2> --}}
            {{-- <div class="profile-photo">
            <img src="{{ $user->avatar }}">
        </div> --}}
            <div class="profile-photo col-md-3" id="upload">
                <img src="{{ $user->avatar }}">
                <div class="round d-none">
                    <input type="file">
                    <i class="fa fa-camera" style="color: #fff;"></i>
                </div>
            </div>

            <div class="profile text-left col-md-5">
                <h4>{{ $user->name }}</h4>
                <h5>Bio: {{ $user->bio }}</h5>
                <h5>Age: {{ Carbon\Carbon::parse($user->dateofbirth)->age }}</h5>
                <h5>Gender:
                    @if ($user->gender == 0)
                        Female
                    @else
                        Male
                    @endif
                </h5>
            </div>

            {{-- <div class="col-md-4 m-auto">
                <a class="btn mb-4" style="width: 10rem">Add friend</a>
                <a class="btn" href="{{ route('message', $user->id) }}" style="width: 10rem">Message</a>
            </div> --}}
            <div class="pull-right col-md-4 m-auto" data-friendid="{{ $user->id }}">
                @if (Auth::check())
                    @if ($user->id == Auth::id())
                    <a class="btn" style="width: 10rem">View friend</a>
                    @else
                    <a class="btn mb-4" style="width: 10rem">Add friend</a>
                    <a class="btn" href="{{ route('message', $user->id) }}" style="width: 10rem">Message</a>
                    @endif
                @endif
                {{-- <a href="{{ route('friend.show', $user->id) }}" class="btn btn-link">View Friends</a> --}}
                {{-- <a class="btn" href="{{ route('message', $user->id) }}" style="width: 10rem">Message</a> --}}
            </div>
        </div>
        <div class="feeds">
            {{-- @foreach ($category as $key => $cat) --}}
            {{-- @if ($cat->category_status == '1') --}}
            @foreach ($user->posts as $post)
                <div class="feed">
                    <div class="head">
                        <div class="user">
                            <div class="profile-photo">
                                <img src="{{ $user->avatar }}">
                            </div>
                            <div class="ingo">
                                <h3>{{ $user->name }}</h3>
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
        {{-- @endforeach --}}
    </div>
@endsection
