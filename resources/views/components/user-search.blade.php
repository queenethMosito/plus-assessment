<div class="mb-3 flex flex-col">
    <form method="GET" action="{{ route('users') }}" class="flex items-center">
        <input type="text" id="search" name="search" class="border border-mid-gray bg-mid-gray text-white py-0"
            placeholder="Search">
        <button type="submit"
            class="btn btn-primary bg-primary border-primary border border-dark-gray bg-mid-gray py-1 px-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-6 text-white" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>

        </button>
    </form>
</div>
