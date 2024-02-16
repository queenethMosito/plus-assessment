<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-4xl text-white dark:text-gray-200 leading-tight">
            {{ __('Users') }}
            @php
                $user = Auth::user();
            @endphp
            @if ($user && $user->isAdmin())
                <x-create-user-button />
            @endif
        </h1>
    </x-slot>

    <div class="py-3 px-8">
        @if (Session::has('success'))
            <div class="alert alert-success text-green bg-green border-lighter-green rounded-lg p-4 my-5">
                {{ Session::get('success') }}
            </div>
        @endif

        <x-user-search />
        <x-users-table :users="$users" />
        <x-pagination :users="$users" />
    </div>
</x-app-layout>
