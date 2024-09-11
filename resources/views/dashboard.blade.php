<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mt-1 text-center flex flex-col items-center">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4 ">
                            Hello, {{ Auth::user()->name }} !
                        </h1>
                        @if(Auth::user()->profile_photo)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" 
                                alt="Profile Photo" 
                                class="w-40 h-40 object-cover rounded-full mx-auto">
                        @else
                            <img src="{{ asset('path/to/default-profile-photo.jpg') }}" 
                                alt="Default Profile Photo" 
                                class="w-40 h-40 object-cover rounded-full mx-auto">
                        @endif


                        <p class = "font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight mb-4" >{{ ("This is my mugshot UwU") }}</p>
                        <p class="font-base text-lg">{{ __("You're logged in!") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
