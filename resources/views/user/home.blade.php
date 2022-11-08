@extends('layouts.user')

@section('content')
    <?php
    // dd($posts);
    ?>
    <style>
        .left .sidebar .activeup {
            background: var(--color-light);
        }

        #menu-home h3 {
            color: var(--color-primary);
        }

        .left .sidebar #menu-home::before {
            content: "";
            display: block;
            width: 0.5rem;
            height: 100%;
            position: absolute;
            background: var(--color-primary);
            border-radius: 100% 0% 0% 0% / 0.5rem 0% 10% 0%;
        }

        .left .sidebar .menu-item:first-child #menu-home {
            border-top-left-radius: var(--card-border-radius);
            overflow: hidden;
        }

        .left .sidebar .menu-item:last-child #menu-home {
            border-bottom-left-radius: var(--card-border-radius);
            overflow: hidden;
        }
    </style>
    <div class="middle">
        <form class="create-post" role="form" action="{{ URL::to('/save_post') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="profile-photo">
                <img src="{{ Auth::user()->profile_picture }}">
            </div>
            {{-- <input type="text" placeholder="What's on your mind, Diana?" id="create-post" rows="8"> --}}
            <textarea name="post_content" type="text" placeholder="What's on your mind, {{ Auth::user()->name }}?" id="create-post"
                style="resize:none"></textarea>
            <label>
                <span class="fas fa-paperclip" id="upload_img">
                    <div id="element" tabindex="-1"></div><input type="file" name="post_image" class="form-control">
                </span>
            </label>

            <div class="">
                {{-- <label for="">Danh mục bài viết</label> --}}
                <select name="category" class="form-control">
                    @foreach ($categories as $key => $cat)
                        @if ($cat->category_status == '1')
                            <option value="{{ $cat->category_id }}">{{ $cat->category_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Post" class="btn btn-primary btn-post">
        </form>

        {{-- ------------------------------------------feed ---------------------------------------------- --}}
        <div class="feeds">
            @foreach ($posts as $key => $post)
                @if ($post->post_status == '1')
                    @if ($post->category_status == '1')
                        <div class="feed">
                            <div class="head">
                                <div class="user">
                                    <div class="profile-photo">
                                        <img src="{{ Auth::user()->profile_picture }}">
                                    </div>
                                    <div class="ingo">
                                        <a href="{{ URL::to('user_profile/$post->id') }}">{{ $post->name }}</a>
                                        {{-- <small>Da Nang, 4 MINUTES AGO</small> --}}
                                    </div>
                                </div>
                                <span class="edit">
                                    <i class="bi bi-three-dots me-0"></i>
                                </span>
                            </div>
                            <div class="caption">
                                <p>
                                    <span class="content">
                                        <h5>{{ $post->post_content }}</h5>
                                    </span>
                                    <br>
                                    <span class="tag category">
                                        <a href="">#{{ $post->category_name }}</a>
                                    </span>
                                </p>
                            </div>
                            <div class="photo">
                                <img src="{{ asset('upload/post/' . $post->post_image) }}">
                            </div>

                            <div class="action-buttons">
                                <div class="interaction-buttons" data-postid="{{ $post->id }}">
                                    @if (Auth::check())
                                        @php
                                            $i = Auth::user()
                                                ->likes()
                                                ->count();
                                            $c = 1;
                                            $likeCount = $post
                                                ->likes()
                                                ->where('like', '=', true)
                                                ->count();
                                            $dislikeCount = $post
                                                ->likes()
                                                ->where('like', '=', false)
                                                ->count();
                                        @endphp
                                        @foreach (Auth::user()->likes as $like)
                                            @if ($like->post_id == $post->id)
                                                @if ($like->like)
                                                    <a href="#" class="bis bi bi-heart like active-like"><span
                                                            class="badge">{{ $likeCount }}</span></a>
                                                    <a href="#" class="bis bi bi-emoji-angry like"><span
                                                            class="badge">{{ $dislikeCount }}</span></a>
                                                @else
                                                    <a href="#" class="bis bis bi bi-heart like"><span
                                                            class="badge">{{ $likeCount }}</span></a>
                                                    <a href="#" class="bis bi bi-emoji-angry like active-like"><i
                                                            class=""></i><span
                                                            class="badge">{{ $dislikeCount }}</span></a>
                                                @endif
                                                @break

                                                @elseif ($i == $c)
                                                <a href="#" class="bis bi bi-heart like active-like"><span
                                                        class="badge">{{ $likeCount }}</span></a>
                                                <a href="#" class="bis bi bi-emoji-angry like"><span
                                                        class="badge">{{ $dislikeCount }}</span></a>
                                            @endif
                                            @php
                                                $c++;
                                            @endphp
                                        @endforeach
                                        @if ($i == 0)
                                            <a href="#" class="bis bi bi-heart like"><span
                                                    class="badge">{{ $likeCount }}</span></a>
                                            <a href="#" class="bis bi bi-emoji-angry like"><span
                                                    class="badge">{{ $dislikeCount }}</span></a>
                                        @endif
                                    @else
                                        <a href="{{ url('login') }}" class="bis bi bi-heart"><span
                                                class="badge">{{ $likeCount }}</span></a>
                                        <a href="{{ url('login') }}" class="bis bi bi-emoji-angry"><span
                                                class="badge">{{ $dislikeCount }}</span></a>
                                    @endif
                                {{-- <span class="like-button"><i class="bi bi-heart like"></i></span> --}}
                                    <span><i class="bi bi-chat"></i></span>
                                    <span><i class="bi bi-share"></i></span>
                                </div>
                                <div class="bookmark">
                                    <span><i class="bi bi-bookmark me-0"></i></span>
                                </div>
                            </div>
                            <div class="liked-by">
                                @foreach (Auth::user()->likes as $like)
                                <span><img src="{{ Auth::user()->profile_picture }}"></span>
                                @endforeach
                                
                                
                                <p>liked by <b>Ernest Achiever</b> and <b>2,323 other</b></p>
                            </div>
                            <div class="comments text-muted">
                                @foreach ($post->comments as $comment)
                                    <div class="" style="margin: 0; border-radius: 0;">
                                        <div class="panel-body">
                                            <div class="col-sm-2 profile-photo">
                                                <img src="{{$comment->user->profile_picture }}" >
                                            </div>
                                            <div class="col-sm-2">
                                                {{$comment->user->name }}:
                                            </div>
                                            <div class="col-sm-8">
                                                {{ $comment->comment }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if (Auth::check())
                                <div class="" style="margin: 0; border-radius: 0;">
                                    <div class="panel-body">
                                        <form action="{{ url('/comment') }}" method="POST" class="d-flex align-items-center">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <input type="text" name="comment" placeholder="Enter your Comment"
                                                class="form-control" style="">
                                            <input type="submit" value="Comment" class="btn btn-primary"
                                                style="">
                                        </form>
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        {{ $error }}
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                {{ Session::get('success') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
@endsection
