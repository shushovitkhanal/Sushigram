<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class = "post">
        {{$user -> name}}
        <div class = "post_title">
            Posts will show 
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
                <div class="comments">
                    {{$comment -> content}}
                </div>
            @endforeach
        </div>

    </div>
            </div>
        </div>
    </div>
</x-app-layout>
