<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Muuda esinemist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg- dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-xl font-bold py-12">
                        <h1>Muuda esinemist</h1>
                    </div>
                    <form method="POST" action="{{ route('admin.events.update', $event) }}">
                        @csrf
                        @method('PUT')
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
                            <button type="submit"  class="px-4 py-2 bg-green-600 text-white rounded-md shadow-sm hover:bg-blue-700">Muuda</button>
                            <a href="{{ route('admin.events.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md shadow-sm hover:bg-gray-700">Loobu</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>

<link href="{{ asset('style.css') }}" rel="stylesheet">
