@foreach ($posts as $post)
    <div class = 'post'>
        @php
            $userId = $post -> post_id;
            $user = \App\Models\User::find($userId);
            $name = $user -> name
        @endphp

        <div class="post_content">
            {{$name}}
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
            Comment
        </div>
        @include('shared.submit-comment')

    </div>
@endforeach
