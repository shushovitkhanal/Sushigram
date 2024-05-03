<x-app-layout>
    <div class = "post">
        @php
            $userId = $comment -> user_id;
            $user = \App\Models\User::find($userId);
            $name = $user -> name;
            $currentUserId = $current_user;
        @endphp

        <div class = "post_title">
            {{ $comment->content }}
        </div>

    <div class = "post_tile">
        <div class = "post_content">
            Edit Your Comment

            <form method="POST" action="{{ route('comment.update', $comment->id) }}">
            @csrf
            <div class='form-group'>
                    Content
                    <textarea name="content" id="content" rows="3" class="comment_box"></textarea>
            </div>
            <button type="submit" class="button_container">Update Comment</button>
</form>
        </div>
    </div>
</x-app-layout>