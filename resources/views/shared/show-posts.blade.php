@foreach ($posts as $post)
    <div class = 'post'>
        @php
            $userId = $post -> user_id;
            $user = \App\Models\User::find($userId);
            $name = $user -> name;
            $currentUser = \App\Models\User::find($current_user);
            $currentUserId = $currentUser -> id;
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

        <div>
            @if (($userId == $currentUserId) or ($currentUser -> role == 1) or ($currentUser -> role == 2))

                <div class = "button_container">
                    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                </div>

                @if (($userId == $currentUserId) or ($currentUser -> role == 2))
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button_container">Delete</button>
                    </form>
                @endif   
            @endif
        </div>
    
        <div class="comment">
            <div class="post_title">
                Comments
            </div>
            
            @foreach ($post->comments as $comment)
                @php
                    $commenter = \App\Models\User::find($comment -> user_id);
                @endphp
                
                    <a href="{{ route('user.show', ['user_id'=>$commenter]) }}">{{$commenter -> name}}:  </a>{{ $comment->content }}
                    
                    <div class = "button_group">
                    @if (($comment->user_id == $currentUserId) or ($currentUser -> role == 1) or ($currentUser -> role == 2))
                        <div class = "button_container">
                            <a href="{{ route('comment.edit', $comment->id) }}">Edit</a>
                        </div>
                        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button_container">Delete</button>
                        </form>    
                    @endif
                    </div>
                
            @endforeach
        </div>
        @auth
            @include('shared.submit-comment')
        @endauth

    </div>
@endforeach

