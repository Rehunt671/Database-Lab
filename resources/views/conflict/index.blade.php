<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Conflicting Emotions') }}
        </h2>
    </x-slot>

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="mb-5 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Summary</h2>
                    <table class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-700">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="border border-gray-300 dark:border-gray-700 p-2">ID</th>
                                <th class="border border-gray-300 dark:border-gray-700 p-2">Date</th>
                                <th class="border border-gray-300 dark:border-gray-700 p-2">Content</th>
                                <th class="border border-gray-300 dark:border-gray-700 p-2">Emotion</th>
                                <th class="border border-gray-300 dark:border-gray-700 p-2">Intensity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($conflictDiaryEntries as $entry)
                                <tr>
                                    <td class="border border-gray-300 dark:border-gray-700 p-2">{{ $entry->id }}</td>
                                    <td class="border border-gray-300 dark:border-gray-700 p-2">{{ $entry->date->format('Y-m-d') }}</td>
                                    <td class="border border-gray-300 dark:border-gray-700 p-2">{{ $entry->content }}</td>
                                    <td class="border border-gray-300 dark:border-gray-700 p-2">{{ $entry->emotion_name }}</td>
                                    <td class="border border-gray-300 dark:border-gray-700 p-2">{{ $entry->intensity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('status'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('status') }}',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6'
                });
            @endif
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
</x-app-layout>
