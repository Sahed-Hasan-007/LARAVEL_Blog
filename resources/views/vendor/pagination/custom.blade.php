@if ($paginator->hasPages())
<nav class="flex items-center gap-x-4 min-w-max">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <span class="text-gray-500 border border-indigo-600 rounded-lg hover:font-bold hover:scale-110 hover:text-gray-900 p-4 inline-flex items-center md:mr-8 mr-1 cursor-not-allowed">
        <span>Back</span>
    </span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" class="text-gray-500 border border-indigo-600 rounded-lg hover:font-bold hover:scale-110 hover:text-gray-900 p-4 inline-flex items-center md:mr-8 mr-1">
        <span>Back</span>
    </a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <span class="w-10 h-10 bg-transparent text-gray-500 p-2 inline-flex items-center justify-center rounded-full">...</span>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <span class="w-10 h-10 bg-indigo-600 text-white p-2 inline-flex items-center justify-center rounded-full transition-all duration-150" aria-current="page">{{ $page }}</span>
    @else
    <a href="{{ $url }}" class="w-10 h-10 bg-transparent text-gray-500 p-2 inline-flex items-center justify-center rounded-full transition-all duration-150 hover:text-indigo-600">{{ $page }}</a>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="text-gray-500 border rounded-lg hover:font-bold hover:scale-110 hover:text-gray-900 p-4 border-indigo-600  inline-flex items-center md:ml-8 ml-1">
        <span>Next</span>
    </a>
    @else
    <span class="text-gray-500 border border-indigo-600 rounded-lg hover:font-bold hover:scale-110 hover:text-gray-900 p-4 inline-flex items-center md:ml-8 ml-1 cursor-not-allowed">
        <span>Next</span>
    </span>
    @endif
</nav>
@endif