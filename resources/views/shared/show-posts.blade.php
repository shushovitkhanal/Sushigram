@foreach ($posts as $post)
    <div class = 'post'>
        @php
            $userId = $post -> user_id;
            $user = \App\Models\User::find($userId);
            $name = $user -> name
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

        <div class="comment">
            Comments
            @foreach ($post->comments as $comment)
                @php
                    $commenter = \App\Models\User::find($comment -> user_id);
                @endphp
                <div>
                    <a href="{{ route('user.show', ['user_id'=>$userId]) }}">{{$commenter -> name}}:</a>{{ $comment->content }}
                </div>
            @endforeach
        </div>
        @auth
            @include('shared.submit-comment')
        @endauth

    </div>
@endforeach

