<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @auth
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <div>
            <div class = "post_title_white">
                Make a Post
            </div>
            <form method="post" action="{{ route('post.store')}}" enctype="multipart/form-data">
                @csrf
                <div class='form-group'>
                    Title
                    <textarea name="title" id="title" rows="1" cols="max" class="comment_box"></textarea>
                </div>
                <div class='form-group'>
                    Caption
                    <textarea name="caption" id="caption" rows="3" class="comment_box"></textarea>
                </div>
                Image
                <input type="file" name="image">
                <div class="">
                    <button type="submit" class="button_container">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @endauth
</div>