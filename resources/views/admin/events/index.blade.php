<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl leading-tight" :class="{
            'text-green-600': isFutureEvent($event->event_date),
            'text-red-600': isPastEvent($event->event_date)
        }">
            {{ __('Esinemised') }}
        </h2>
    </x-slot>

    
    <div class="py-12 bg-image">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900 dark:text-gray-100 bg-slate-200">
                    <div class="text-xl font-semibold">
                        <h1>Esinemised</h1>
                    </div>
                    
                    <!--<a href="{{ route('admin.events.create') }}" class="text-blue-600 hover:underline">Lisa esinemine</a>-->
                    <ul class="mt-4">
                        @forelse ($events->sortBy('event-date') as $event)
                            <li class="flex justify-between items-center mb-2">
                                <div class="flex flex-col font-bold">
                                    <a href="{{ route('admin.events.show', $event) }}">{{ $event->name }}</a>
                                    <span class=" text-sm mx-2 text-gray-600 dark:text-gray-400 ">{{ date('d.m.Y', strtotime($event->event_date)) }}</span>
                                </div>
                                <div class="flex space-x-2">
                                    <!--<div class=" dark:border-gray-700 rounded-lg px-2 py-1 bg-white">
                                        <a href="{{ route('admin.events.edit', $event) }}" class="text-yellow-600 hover:underline">Muuda</a>
                                    </div>-->
                                    <div class=" dark:border-gray-700 rounded-lg px-2 py-1 bg-white">
                                        <form id="delete-form-{{ $event->id }}" action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Button to trigger delete confirmation modal -->
                                            <button type="button" onclick="confirmDelete('{{ $event->id }}')" class="text-red-600 hover:underline">Kustuta</button>
                                        </form>
                                    </div>
                                </div>    
                            </li>
                        @empty
                            <li>Pole ühtegi esinemist.</li>
                        @endforelse
                    </ul>
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


