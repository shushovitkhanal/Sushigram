<x-app-layout>
    <div class = "post">
    @php
            $userId = $post -> user_id;
            $user = \App\Models\User::find($userId);
            $name = $user -> name;
            $currentUserId = auth() -> user() -> id;
        @endphp

        <div class="post_content">
            <a href="{{ route('user.show', ['user_id'=>$userId]) }}">{{$name}}</a>
        </div>

        <div class = "post_title">
            {{ $post->title }}
        </div>

        @if ($post->image != 'empty')
            <img src="{{ asset($post->image) }}" width="848">
        @endif

        <div class="post_content">
            {{ $post->caption }}
        </div>

        <div class="post_content">
            {{$post -> created_at}}
        </div>
    </div>

    <div class = "post">
        <div class = "post_content">
            Edit Your Post

            <form method="POST" action="{{ route('posts.update', $post->id) }}">
            @csrf
            <div class='form-group'>
                    Title
                    <textarea name="title" id="title" rows="1" cols="max" class="form-control"></textarea>
            </div>
            <div class='form-group'>
                    Caption
                    <textarea name="caption" id="caption" rows="3" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
</form>
        </div>
    </div>
</x-app-layout>