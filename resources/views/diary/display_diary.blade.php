<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Diary Entries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($diaryEntries->isEmpty())
                        <p class="text-center text-gray-500 dark:text-gray-400">No diary entries found.</p>
                    @else
                        @foreach ($diaryEntries as $entry)
                            <div class="diary-entry mb-6 p-6 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow">
                                <h3 class="text-xl font-bold mb-2">
                                    {{ \Carbon\Carbon::parse($entry->date)->format('F j, Y') }}
                                </h3>
                                <p class="text-gray-800 dark:text-gray-300">{{ $entry->content }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
