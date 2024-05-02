<form method="post" action="{{ route('comments.store')}}" enctype="multipart/form-data">
    @csrf
    <div class='form-group'>
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <textarea name="comment" id="comment" rows="1" cols="max" class="comment_box"></textarea>
        <button type="submit" class="button_container">Submit</button>
    </div>
</form>