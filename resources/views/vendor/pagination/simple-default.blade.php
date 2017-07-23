@if ($paginator->hasPages())
    <nav class="pagination">
        {{-- Previous Page Link --}}
        @if($paginator->onFirstPage())
            <a class="pagination__arrow arrow--left btn--disabled" href="{{ $paginator->previousPageUrl() }}">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Newer Posts
            </a>
        @else
            <a class="pagination__arrow arrow--left" href="{{ $paginator->previousPageUrl() }}">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Newer Posts
            </a>
        @endif

        {{-- Next Page Link --}}
        @if($paginator->hasMorePages())
            <a class="pagination__arrow arrow--right" href="{{ $paginator->nextPageUrl() }}">
                Older Posts <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
        @else
            <a class="pagination__arrow arrow--right btn--disabled" href="{{ $paginator->nextPageUrl() }}">
               Older Posts <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
        @endif
    </nav>
@endif
