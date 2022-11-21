<div class="create-modal">
    <form class="create-post" role="form" action="{{ URL::to('/save_post') }}" method="POST"
        enctype="multipart/form-data" class="card">
        @csrf
        <div class="infor">
            <div class="profile-photo">
                <img src="{{ Auth::user()->avatar }}">
            </div>
            <h3>{{ Auth::user()->name }}</h3>
        </div>
        
        <textarea name="post_content" type="text" placeholder="What's on your mind, {{ Auth::user()->name }}?"
            id="create-post" rows="10" style="resize:none"></textarea>
        <div class="add-to-post">
            <label>
                <span class="fas fa-paperclip" id="upload_img">
                    <div id="element" tabindex="-1"></div><input type="file" name="post_image"
                        class="form-control">
                </span>
            </label>
            <div class="">
                {{-- <label for="">Danh mục bài viết</label> --}}
                <select name="category" class="form-control">
                    @foreach ($categories as $key => $cat)
                        @if ($cat->category_status == '1')
                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="submit-post">
            <input type="submit" value="Post" class="btn btn-primary btn-post">
        </div>
    </form>
</div>