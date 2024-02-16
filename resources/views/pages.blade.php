<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark-gray overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    {{ __('Hello there!') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>