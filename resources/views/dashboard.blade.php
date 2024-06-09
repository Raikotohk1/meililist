<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tere tulemast!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <img src="{{ asset('images/tantsutrupp.png') }}" alt="Welcome Image" style="width: 100%; height: auto;">
            </div>
           <!-- <div class="mt-4">
                <a href="{{ route('admin.events.index') }}" class="text-blue-500">Esinemised</a>
            </div>-->
        </div>
    </div>
</x-app-layout>

