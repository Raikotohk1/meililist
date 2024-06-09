<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Esinemise detailid') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">{{ $event->name }}</h1>
                    <p class="mb-4">{{ $event->description }}</p>
                    <p class="mb-4"><strong>Kuupäev:</strong> {{ $event->event_date }}</p>
                    <p class="mb-4"><strong>Asukoht:</strong> {{ $event->location }}</p>
                    @if ($event->dances)
                        <p class="mb-4"><strong>Tants:</strong> {{ $event->dances }}</p>
                    @else
                        <p class="mb-4"><strong>Tants:</strong> Tantsu pole lisatud.</p>
                    @endif
                    @if ($responses->isNotEmpty())
                        <h2 class="text-xl font-semibold mt-4 mb-2">Osalejad:</h2>
                        <ul class="list-disc pl-5 mb-4">
                            @foreach ($responses as $response)
                            <li>
                                <div class="inline-flex space-x-2">
                                    <div class="font-bold">E-mail:</div>
                                    <div>{{ $response->email }}</div>
                                    <div class="font-bold">Vastus:</div>
                                    <div>{{ $response->response }}</div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mt-4">Pole ühtegi vastust.</p>
                    @endif
                    <form id="delete-form-{{ $event->id }}" action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <!-- Button to trigger delete confirmation modal -->
                        <button type="button" onclick="confirmDelete('{{ $event->id }}')" class="px-4 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-700">Kustuta</button>
                    </form>
                    <a href="{{ route('admin.events.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md shadow-sm hover:bg-gray-700">Tagasi</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<div id="delete-modal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50">
    <div class="bg-white p-8 rounded-md">
        <p class="text-lg mb-4">Kas oled kindel?</p>
        <div class="flex justify-end">
            <button id="delete-button" class="bg-red-600 text-white px-4 py-2 rounded-md mr-2 hover:bg-red-700">Jah</button>
            <button onclick="cancelDelete()" class="bg-gray-500 text-white px-4 py-2 mr-2 rounded-md hover:bg-gray-600">Ei</button>
        </div>
    </div>
</div>

<link href="{{ asset('style.css') }}" rel="stylesheet">

<script>
    // Function to open delete confirmation modal
    function confirmDelete(eventId) {
        document.getElementById('delete-modal').classList.remove('hidden');
        // Set the delete form action based on event ID
        document.getElementById('delete-button').addEventListener('click', function() {
            document.getElementById('delete-form-' + eventId).submit();
        });
    }

    // Function to close delete confirmation modal
    function cancelDelete() {
        document.getElementById('delete-modal').classList.add('hidden');
    }
</script>
