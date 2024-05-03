<x-app-layout>
    <div class = "post">
        @php
            $userId = $post -> user_id;
            $user = \App\Models\User::find($userId);
            $name = $user -> name;
            $currentUserId = $current_user;
        @endphp

        <a href="{{ route('user.show', ['user_id'=>$userId]) }}">
            <img src="{{ asset('storage/images/default-dp.png') }}" width="50" height="50">{{$name}}</img>
        </a>

        <div class = "post_title">
            {{ $post->title }}
        </div>

        <div class = "post_caption_image">
            <div class="post_content">
                {{ $post->caption }}
            </div>

            @if ($post->image != 'empty')
                <img src="{{ asset($post->image) }}" width="70%" class="post_image">
            @endif
        </div>
        
        <div class="post_content">
            {{$post -> created_at}}
        </div>

    <div class = "post_tile">
        <div class = "post_content">
            Edit Your Post

            <form method="POST" action="{{ route('posts.update', $post->id) }}">
            @csrf
            <div class='form-group'>
                    Title
                    <textarea name="title" id="title" rows="1" cols="max" class="comment_box"></textarea>
            </div>
            <div class='form-group'>
                    Caption
                    <textarea name="caption" id="caption" rows="3" class="comment_box"></textarea>
            </div>
            <button type="submit" class="button_container">Update Post</button>
            </form>
        </div>
    </div>
</x-app-layout>