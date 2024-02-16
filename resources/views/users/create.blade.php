<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-4xl text-white dark:text-gray-200 leading-tight">
            {{ __('Create User') }}

        </h1>

    </x-slot>
    <form method="POST" action="{{ route('users.store') }}" class="mx-8 my-3 bg-mid-gray p-8">
        @csrf


        <div class=" flex flex-wrap w-full md:w-1/2 px-2">
            <div class="w-full md:w-1/2 px-2">
                <x-input-label class="text-white" for="first_name" :value="__('First Name')" />
                <x-form-text-input id="first_name"
                    class="block mt-1 w-full border-b border-white focus:border-none focus:outline-none" type="text"
                    name="first_name" :value="old('first_name')" required autofocus autocomplete="Full Name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div class="w-full md:w-1/2 px-2">
                <x-input-label class="text-white" for="last_name" :value="__('Last Name')" />
                <x-form-text-input id="last_name"
                    class="block mt-1 w-full border-b border-white focus:border-none focus:outline-none" type="text"
                    name="last_name" :value="old('last_name')" required autofocus autocomplete="Last Name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <div class="w-full md:w-full px-2 my-5">
                <x-input-label class="text-white" for="email" :value="__('Email Address')" />
                <x-form-text-input id="email"
                    class="block mt-1 w-full border-b border-white focus:border-none focus:outline-none" type="email"
                    name="email" :value="old('email')" required autofocus autocomplete="Email Address" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="w-full md:w-full px-2 my-5">
                <x-input-label class="text-white" for="roles" :value="__('Role')" />
                <select id="roles" name="roles[]" multiple
                    class="block mt-1 w-full border border-mid-gray bg-mid-gray text-white focus:border-none focus:outline-none">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('roles')" class="mt-2" />
            </div>

            <div class="w-full md:w-1/2 px-2 my-5">
                <x-input-label class="text-white" for="password" :value="__('Password')" />
                <x-form-text-input id="password"
                    class="block mt-1 w-full border-b border-white focus:border-none focus:outline-none" type="password"
                    name="password" :value="old('password')" required autofocus autocomplete="Password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="w-full md:w-1/2 px-2 my-5">
                <x-input-label class="text-white" for="confirm_password" :value="__('Confirm Password')" />
                <x-form-text-input id="confirm_password"
                    class="block mt-1 w-full border-b border-white focus:border-none focus:outline-none" type="password"
                    name="confirm_password" :value="old('confirm_password')" required autofocus autocomplete="Confirm Password" />
                <x-input-error :messages="$errors->get('confirm_password')" class="mt-2" />
            </div>
            <div class="w-full md:w-1/2 px-2">
                <x-primary-button class="ms-3">
                    {{ __('Create User') }}
                </x-primary-button>
            </div>

        </div>



    </form>


</x-app-layout>
