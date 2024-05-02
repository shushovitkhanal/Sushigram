<x-app-layout>
    <div class = "post">
        {{$user -> name}}
        <div class = "post_title">
            Posts will show here
            @foreach($posts as $post)
                    
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

            @endforeach
        </div>

        <div class = "post_title">
            Comments will show here

            @foreach($user -> comments as $comment)
                {{$comment -> content}}
            @endforeach
        </div>

    </div>
</x-app-layout>