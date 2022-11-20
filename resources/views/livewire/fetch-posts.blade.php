<div class="feeds">
    @foreach ($posts as $key => $post)
        @if ($post->post_status == '1')
            @if ($post->category_status == '1')
                <div class="feed" data-postid="{{ $post->id }}">
                    <div class="head">
                        <div class="user">
                            <div class="profile-photo">
                                <img src="{{ Auth::user()->profile_picture }}">
                            </div>
                            <div class="ingo">
                                <a href="{{ route('user_profile', $post->user->id) }}">{{ $post->name }}</a><br>
                                <small>{{ $post->created_at }}</small>
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
                        <img src="{{ asset('upload/post/' . $post->post_image) }}" alt="">
                    </div>

                    <div class="action-buttons">
                        <div class="interaction-buttons">
                            <span><i class="bi bi-heart @if ($post->userLikedPost()) text-danger @endif"
                                    @if ($post->userLikedPost()) text-blue-500 @endif
                                    wire:click="addLikeToPost({{ $post->id }})"></i>
                                <p class="likecount">{{ $post->likes->count() }}</p>
                            </span>
                            <span><i class="bi bi-chat" onclick="comment()"></i></span>
                            <span><i class="bi bi-share"></i></span>
                        </div>
                        <div class="bookmark">
                            <span class=" me-0"><i class="bi bi-bookmark"></i></span>
                        </div>
                    </div>
                    <div class="liked-by">
                        @if ($post->likes->count() == 0)
                        @else
                            @foreach ($post->likes as $like)
                                <span><img src="{{ $like->user->profile_picture }}" alt=""></span>
                            @endforeach
                            liked by:
                            @foreach ($post->likes as $like)
                                <p> {{ $like->user->name }},</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="comments text-muted">
                        @foreach ($post->comments as $comment)
                            <div class="text-white" style="margin: 0; border-radius: 0;">
                                <div class="panel-body row">
                                    <div class="col-sm-2 profile-photo">
                                        <img src="{{ $comment->user->profile_picture }}">
                                    </div>
                                    <div class="col-sm-10">
                                        <span>
                                            <p>{{ $comment->user->name }}: &nbsp; {{ $comment->comment }}</p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if (Auth::check())
                            <div class="" style="margin: 0; border-radius: 0;">
                                <div class="panel-body">
                                    <form action="{{ url('/comment') }}" method="POST"
                                        class="d-flex align-items-center">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="text" name="comment" placeholder="Enter your Comment"
                                            class="form-control bg-transparent text-light">
                                        <input type="submit" value="Comment" class="btn btn-primary" style="">
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        @endif
    @endforeach
</div>
