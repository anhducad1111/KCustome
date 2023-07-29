<div class="feeds">
    @foreach ($posts as $key => $post)
        @if ($post->post_status == '1')
            @if ($post->category_status == '1')
                <div class="feed" data-postid="{{ $post->id }}">
                    <div class="head">
                        <div class="user">
                            <div class="profile-photo">
                                {{-- <img src="{{ $post->user->avatar }}"> --}}
                                <a href="{{ route('user_profile', $post->user->id) }}"><img
                                        src="{{ $post->user->avatar }}"></a><br>
                            </div>
                            <div class="ingo">
                                <a href="{{ route('user_profile', $post->user->id) }}" class="text-white">
                                    <h5>{{ $post->name }}</h5>
                                </a>
                                <small>
                                    @php
                                        $created_at = \Carbon\Carbon::parse($post->created_at);
                                        $now = \Carbon\Carbon::now();
                                        $diff = $created_at->diff($now);
                                        
                                        if ($diff->y > 0 || $diff->m > 0 || $diff->d > 0) {
                                            echo $created_at->format('j M Y');
                                        } elseif ($diff->h > 0) {
                                            echo ($diff->h == 1 ? '1 hour' : $diff->h . ' hours') . ' ago';
                                        } else {
                                            echo ($diff->i == 1 ? '1 minute' : $diff->i . ' minutes') . ' ago';
                                        }
                                    @endphp

                                </small>
                            </div>
                        </div>
                        <span class="edit">
                            <i class="bi bi-three-dots me-0"></i>
                        </span>
                    </div>
                    <div class="caption mt-3">
                        <span class="content">
                            <h5>{{ $post->post_content }}</h5>
                        </span>
                        <span class="tag category">
                            <a href="{{ route('category_post', $post->category_id) }}">#{{ $post->category_name }}</a>
                        </span>
                    </div>
                    <div class="photo">
                        <img src="{{ asset('upload/post/' . $post->post_image) }}" alt="">
                    </div>
                    <div class="action-buttons">
                        <div class="interaction-buttons">
                            <span><i class="bi bi-heart @if ($post->userLikedPost()) text-danger @endif"
                                    wire:click="addLikeToPost({{ $post->id }})"></i>
                                <p class="likecount">{{ $post->likes->count() }}</p>
                            </span>

                            <span><i class="bi bi-chat" onclick="comment({{ $post->id }})"></i></span>
                            <span><i class="bi bi-share"></i></span>
                        </div>
                        <div class="bookmark">
                            <span class="me-0"><i
                                    class="bi bi-bookmark @if ($post->userMarkedPost()) text-danger @endif"
                                    wire:click="addBookmarkToPost({{ $post->id }})"></i></span>
                        </div>
                    </div>
                    <div class="liked-by">
                        @if ($post->likes->count() > 0)
                            @php
                                $likeCount = $post->likes->count();
                                $limit = 3;
                            @endphp

                            @foreach ($post->likes->take($limit) as $like)
                                <span><img src="{{ $like->user->avatar }}" alt=""></span>
                            @endforeach
                            liked by:
                            @foreach ($post->likes->take($limit) as $like)
                                {{ $like->user->name }}
                                @if (!$loop->last && !$loop->remaining)
                                    ,
                                @endif
                            @endforeach
                            @if ($likeCount > $limit)
                                and {{ $likeCount - $limit }} others
                            @endif
                        @endif
                    </div>

                    <div class="comments text-muted">
                        @foreach ($post->comments as $comment)
                            <div class="text-white" style="margin: 0; border-radius: 0;">
                                <div class="panel-body row">
                                    <div class="col-sm-2 profile-photo">
                                        <img src="{{ $comment->user->avatar }}">
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
