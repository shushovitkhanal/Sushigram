
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Feed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Posts will show up here") }}
                    <div class="bg-white dark:bg-gray-500 overflow-hidden shadow-sm sm:rounded-lg">
                        
                    </div>
                </div>
            </div>

            @foreach ($posts as $post)
                <div class = 'post'>
                    <div class = "post_title">
                        {{$post -> title}}
                    </div>
                    <div class="post_image">
                        <img src="{{$post -> image}}">
                    </div>
                </div>
                
            @endforeach
            
        </div>
    </div>
</x-app-layout>

