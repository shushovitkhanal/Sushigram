
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Welcome to your feed, {{explode(' ', Auth::user() -> name)[0]}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @auth
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-white dark:bg-gray-500 overflow-hidden shadow-sm sm:rounded-lg">
                        
                    </div>
                </div>
                @endauth
            </div>

            @foreach ($posts as $post)
                <div class = 'post'>
                    <div class = "post_title">
                        {{$post -> title}}
                    </div>
                    <div>
                        <img src="{{$post -> image}}" class = "post_image">
                    </div>
                    <div class="post_content">
                        {{$post -> caption}}
                    </div>
                    <div class="comment">
                        Comment
                    </div>
                </div>
                
            @endforeach
            
        </div>
    </div>
</x-app-layout>

