<nav class="flex items-center justify-between border-t border-gray-200 px-4 py-3 sm:px-6" aria-label="Pagination">
    <div class="hidden sm:block">
        <p class="text-sm text-gray-700">Showing<span class="font-medium"> {{ $start }} </span>to<span
                class="font-medium"> {{ $end }} </span>of<span class="font-medium"> {{ $total }}
            </span>results</p>
    </div>
    <div class="flex flex-1 justify-between sm:justify-end">
        @if ($start !== 1)
            <a href="#" onclick="{{ $prev }}"
                class="relative inline-flex items-center rounded-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-200 focus-visible:outline-offset-0">Previous</a>
            @endif @if ($total !== $end)
                <a href="#" onclick="{{ $next }}"
                    class="relative ml-3 inline-flex items-center rounded-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-200 focus-visible:outline-offset-0">Next</a>
            @endif
    </div>
</nav>
