<x-app-layout>
    <div>
        <div class = "post_tile">
            <div class = "post_title_white">
                {{$user -> name}}
            </div>
        </div>
        <div class = "post">
            <div class = "post_title">
                Posts
            </div>
            @foreach($posts as $post)
            <div class = "post_tile">
                <div class = "post_title_white">
                    {{ $post->title }}
                </div>

                <div class="post_content">
                    {{ $post->caption }}
                </div>

                @if ($post->image != 'empty')
                    <img src="{{ asset($post->image) }}" width="70%" class="post_image">
                @endif


                <div class="post_content">
                    {{$post -> created_at}}
                </div>
            </div>
            @endforeach
            {{ $posts->links() }}

        </div>

        <div class = "post">
            <div class = "post_title">
                Comments
            </div>
            @foreach($user -> comments as $comment)
                <div class = "post_tile">
                    <div class = "post_title_white">
                        {{$comment -> post -> title}}
                    </div>
                    <div class= "post_content">
                        {{$comment -> post -> caption}}
                    </div>
                    <div class="comment">
                    {{$comment -> content}}
                    </div>
                </div>
            @endforeach
            {{$comments -> links()}}
            
        </div>

    </div>
</x-app-layout>