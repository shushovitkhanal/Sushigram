<link href="{{ asset('public/build/assets/app-DaN8u4V-.css') }}" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @auth
            Welcome to your feed, {{explode(' ', Auth::user() -> name)[0]}}
            @endauth

            @guest
            Welcome, Login to see more
            @endguest
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="message" role="message">
                Post made successfully.
                <button type="button" data-bs-dismiss="message" aria-label="Close"> X </button>
            </div>
            @include('shared.submit-post')

            @include('shared.show-posts')
            
        </div>
    </div>
</x-app-layout>

