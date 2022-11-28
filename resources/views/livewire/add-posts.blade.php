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
        <div class="row">
            <div class="add-to-post col-6">
                <label class="m-0 d-flex" >
                    <span class="fas fa-images align-self-center" id="upload_img">
                        <div id="element" tabindex="-1"></div><input type="file" name="post_image"
                            class="form-control">
                    </span>
                </label>
                <div class="m-0 d-flex">
                    {{-- <label for="">Danh mục bài viết</label> --}}
                    <select name="category" class="form-control align-self-center">
                        @foreach ($categories as $key => $cat)
                            @if ($cat->category_status == '1')
                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="submit-post col-6 justify-content-end" >
                <input type="submit" value="Post" class="btn btn-primary btn-post">
            </div>
        </div>
    </form>
</div>