@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
       @if ($paginator->onFirstPage())
            <li class="disabled"><span><a style="pointer-events: none; cursor: default;" class="btn btn-icon btn-sm btn-light btn-hover-primary mr-2 my-1" href="{{ $paginator->onFirstPage() }}" rel="prev"><i class="ki ki-bold-double-arrow-back icon-xs"></i></a></span></li>
            <li class="disabled"><span><a style="pointer-events: none; cursor: default;" class="btn btn-icon btn-sm btn-light btn-hover-primary mr-2 my-1" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="ki ki-bold-arrow-back icon-xs"></i></a></span></li>
        @else
            <li><a class="btn btn-icon btn-sm btn-light mr-2 my-1" href="{{ $paginator->onFirstPage() }}" rel="prev"><i class="ki ki-bold-double-arrow-back icon-xs"></i></a></li>
            <li><a class="btn btn-icon btn-sm btn-light mr-2 my-1" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="ki ki-bold-arrow-back icon-xs"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span><a style="pointer-events: none; cursor: default;" class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1">{{ $element }}</a></span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span><a style="pointer-events: none; cursor: default;" class="btn btn-icon btn-sm border-0 btn-light btn-hover-primary active mr-2 my-1">{{ $page }}</a></span></li>
                    @else
                        <li><a href="{{ $url }}" class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a class="btn btn-icon btn-sm btn-light mr-2 my-1" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="ki ki-bold-arrow-next icon-xs"></i></a></li>
            <li><a class="btn btn-icon btn-sm btn-light mr-2 my-1" href="{{ $paginator->url($paginator->lastPage()) }}" rel="next"><i class="ki ki-bold-double-arrow-next icon-xs"></i></a></li>
            <li><span>Showing {{ ($paginator->currentPage()-1)*10+1 }} - {{ $paginator->currentPage()*10 }} of {{$paginator->total()}} entries</span></li>
        @else
            <li class="disabled"><span><a style="pointer-events: none; cursor: default;" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i class="ki ki-bold-arrow-next icon-xs"></i></a></span></li>
            <li class="disabled"><span><a style="pointer-events: none; cursor: default;" class="btn btn-icon btn-sm btn-light mr-2 my-1" href="{{ $paginator->url($paginator->lastPage()) }}"><i class="ki ki-bold-double-arrow-next icon-xs"></i></a></span></li>
            <li><span>Showing {{ ($paginator->currentPage()-1)*10+1 }} - {{ $paginator->currentPage()*10 }} of {{$paginator->total()}} entries</span></li>
         @endif
    </ul>
@endif