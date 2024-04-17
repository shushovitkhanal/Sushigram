<form method="post" action="{{ route('comments.store', $post->id)}}" enctype="multipart/form-data">
    @csrf
    <div class='form-group'>
        Title
        <textarea name="title" id="title" rows="1" cols="max" class="form-control"></textarea>
        <button type="submit">Submit</button>
    </div>
</form>