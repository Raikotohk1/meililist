<x-app-layout :hideNavigation="true">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Respond to: {{ $event->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('responses.store', $event->id) }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <div class="flex items-center space-x-4">
                            <label for="response"><div class="font-bold text-lg">Teie vastus:</div></label>
                            <select name="response" id="response" required class="mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-300 w-40">
                                <option value="yes">Jah</option>
                                <option value="no">Ei</option>
                                <option value="maybe">Võib-olla</option>
                            </select>
                        </div>
                        @if ($errors->any())
                            <div class="mt-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
