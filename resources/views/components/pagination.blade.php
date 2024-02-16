@if ($users->hasPages())
    <ul class="pagination flex justify-between items-center">
        {{-- Previous Page Link --}}
        @if ($users->onFirstPage())
            <li class="disabled" aria-disabled="true">
                <span
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white  cursor-not-allowed leading-5 rounded-md">
                    &laquo; Previous
                </span>
            </li>
        @else
            <li>
                <a href="{{ $users->previousPageUrl() }}" rel="prev"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white leading-5 rounded-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    &laquo; Previous
                </a>
            </li>
        @endif


        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
            <li>
                <a href="{{ $url }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white
                    @if ($users->currentPage() == $page) bg-red  @else text-gray-700 bg-white border border-mid-gray hover:bg-mid-gray focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @endif">
                    {{ $page }}
                </a>
            </li>
        @endforeach


        @if ($users->hasMorePages())
            <li>
                <a href="{{ $users->nextPageUrl() }}" rel="next"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white leading-5 rounded-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    Next &raquo;
                </a>
            </li>
        @else
            <li class="disabled" aria-disabled="true">
                <span
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white  cursor-not-allowed leading-5 rounded-md">
                    Next &raquo;
                </span>
            </li>
        @endif
    </ul>
@endif
