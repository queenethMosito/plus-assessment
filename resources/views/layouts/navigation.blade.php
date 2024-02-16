<aside class="z-10 w-64 flex-shrink-0 bg-darker-gray">
    <!-- Sidebar Content -->
    <nav class="h-full flex flex-col justify-between bg-darker-gray bg-opacity-100">
        <!-- Logo -->
        <div class="flex items-center justify-center h-12 my-5">
            <a href="{{ route('pages') }}">
                <img src="{{ asset('img/logo.svg') }}" alt="Your Logo">
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="flex-1 overflow-y-auto px-5">
            <div class="space-y-1">
                <x-dynamic-nav-link route="users" icon="img/users.svg" label="Users" />
                <x-dynamic-nav-link route="pages" icon="img/pages.svg" label="Pages" />
            </div>
        </div>

        <div class="flex items-center justify-center border-t border-gray-100 dark:border-gray py-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf


                <button type="submit"
                    class="flex items-center px-3 py-2 border border-white text-white text-sm leading-4 font-medium rounded-md bg-transparent hover:bg-white hover:text-gray-900 focus:outline-none focus:bg-white focus:text-gray-900 transition ease-in-out duration-150">
                    <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                    <span>{{ __('Logout') }}</span>
                </button>
            </form>
        </div>

    </nav>
</aside>
