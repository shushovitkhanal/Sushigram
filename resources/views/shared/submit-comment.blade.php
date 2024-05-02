<form method="post" action="{{ route('comments.store')}}" enctype="multipart/form-data">
    @csrf
    <div class='form-group'>
        Your Comment
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <textarea name="comment" id="comment" rows="1" cols="max" class="form-control"></textarea>
        <button type="submit">Submit</button>
    </div>
</form>