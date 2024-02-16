@props(['route', 'icon', 'label'])
@php
    $user = Auth::user();
@endphp

@if ($route === 'users')
    @if ($user && ($user->isAdmin() || $user->isContentManager()))
        <x-nav-link :href="route($route)" :active="request()->routeIs($route)"
            class="text-white flex items-left justify-left w-full py-2 border-b-0 border-dark-gray {{ request()->routeIs($route) ? 'bg-red text-gray-900' : '' }}">
            <img src="{{ asset($icon) }}" alt="{{ $label }} Logo">
            <span class="ml-2">{{ __($label) }}</span>
        </x-nav-link>
    @endif
@else
    <x-nav-link :href="route($route)" :active="request()->routeIs($route)"
        class="text-white flex items-left justify-left w-full py-2 border-b-0 border-dark-gray {{ request()->routeIs($route) ? 'bg-red text-gray-900' : '' }}">
        <img src="{{ asset($icon) }}" alt="{{ $label }} Logo">
        <span class="ml-2">{{ __($label) }}</span>
    </x-nav-link>
@endif
