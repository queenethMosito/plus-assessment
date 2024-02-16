<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-4xl text-white dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h1>
        @if (Session::has('success'))
            <div class="alert alert-success text-green bg-green border-lighter-green rounded-lg p-4 my-5">
                {{ Session::get('success') }}
            </div>
        @endif
    </x-slot>

    <form method="POST" action="{{ url('/users/' . $user->id) }}" class="mx-8 my-3 bg-mid-gray p-8">
        @csrf
        @method('PUT')

        <div class="flex flex-wrap w-full md:w-1/2 px-2">
            <div class="w-full md:w-1/2 px-2">
                <x-input-label class="text-white" for="first_name" :value="__('First Name')" />
                <x-form-text-input id="first_name"
                    class="block mt-1 w-full border-b border-white focus:border-none focus:outline-none" type="text"
                    name="first_name" :value="$user->first_name" required autofocus autocomplete="Full Name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div class="w-full md:w-1/2 px-2">
                <x-input-label class="text-white" for="last_name" :value="__('Last Name')" />
                <x-form-text-input id="last_name"
                    class="block mt-1 w-full border-b border-white focus:border-none focus:outline-none" type="text"
                    name="last_name" :value="$user->last_name" required autofocus autocomplete="Last Name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <div class="w-full md:w-full px-2 my-5">
                <x-input-label class="text-white" for="email" :value="__('Email Address')" />
                <x-form-text-input id="email"
                    class="block mt-1 w-full border-b border-white focus:border-none focus:outline-none" type="email"
                    name="email" :value="$user->email" required autofocus autocomplete="Email Address" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="w-full md:w-full px-2 my-5">
                <x-input-label class="text-white" for="roles" :value="__('Role')" />
                <select id="roles" name="roles[]" multiple
                    class="block mt-1 w-full border border-mid-gray bg-mid-gray text-white focus:border-none focus:outline-none">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}"
                            {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('roles')" class="mt-2" />
            </div>

            <div class="w-full md:w-1/2 px-2 my-5">
                <x-input-label class="text-white" for="password" :value="__('Password')" />
                <x-form-text-input id="password"
                    class="block mt-1 w-full border-b border-white focus:border-none focus:outline-none" type="password"
                    name="password" autofocus autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="w-full md:w-1/2 px-2 my-5">
                <x-input-label class="text-white" for="confirm_password" :value="__('Confirm Password')" />
                <x-form-text-input id="confirm_password"
                    class="block mt-1 w-full border-b border-white focus:border-none focus:outline-none" type="password"
                    name="confirm_password" autofocus autocomplete="new-password" />
                <x-input-error :messages="$errors->get('confirm_password')" class="mt-2" />
            </div>
            @php
                $user = Auth::user();
            @endphp
            @if ($user && $user->isAdmin())
                <div class="w-full md:w-1/2 px-2">
                    <x-primary-button class="ms-3">
                        {{ __('Update User') }}
                    </x-primary-button>
                </div>
            @endif
        </div>
    </form>
</x-app-layout>
