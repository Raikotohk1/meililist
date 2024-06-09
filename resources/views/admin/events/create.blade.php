<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lisa esinemine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg- dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-xl font-bold py-12">
                        <h1>Uus esinemine</h1>
                    </div>
                    <form method="POST" action="{{ route('admin.events.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200">Esinemise nimi:</label>
                            <input type="text" name="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200">Kirjeldus:</label>
                            <textarea name="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-300"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200">Kuupäev:</label>
                            <input type="datetime-local" name="event_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200">Asukoht:</label>
                            <input type="text" name="location" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-300">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200">Kava:</label>
                            <select name="dances" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-300">
                                @foreach($dances as $dance)
                                    <option value="{{ $dance }}">{{ $dance }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200">E-mail:</label>
                            <textarea name="emails" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-300"></textarea>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit"  class="px-4 py-2 bg-green-600 text-white rounded-md shadow-sm hover:bg-blue-700">Loo esinemine</button>
                            <button type="button" onclick="window.location='{{ route('admin.events.index') }}'" class="px-4 py-2 bg-gray-600 text-white rounded-md shadow-sm hover:bg-gray-700">Loobu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop-up modal -->
    
</x-app-layout>

<div id="popup-modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div id="popup-modal-content" class="relative">
        <button onclick="closePopup()" class="absolute top-2 right-2 text-gray-600 dark:text-gray-400 hover:text-gray-800">&times;</button>
        <h2 class="text-xl font-semibold mb-4">Aitäh!</h2>
        <p>Esinemine on loodud ja kutsed saadetud.</p>
        <img src="https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExcmNyeWR1am81cHlmZDBuN2RsNWhqNjF4aXY4Y2xwaWRrcjJoeXg1cCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/XreQmk7ETCak0/giphy.webp" alt="Thumbs up!">
    </div>
</div>

<script>
    function handleSubmit(event) {
        event.preventDefault();
        document.getElementById('popup-modal').classList.remove('hidden');
        setTimeout(() => {
            document.getElementById('event-form').submit();
        }, 2000); // Submit form after 2 seconds
    }

    function closePopup() {
        document.getElementById('popup-modal').classList.add('hidden');
    }
</script>

<link href="{{ asset('style.css') }}" rel="stylesheet">