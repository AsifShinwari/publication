@if ($paginator->hasPages())
<div class="pagination-content number">
                                
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><a ><i class="zmdi zmdi-chevron-left"></i></a></li>
        @else
            <li><a  wire:click="previousPage" rel="prev" aria-label="@lang('pagination.previous')" ><i class="zmdi zmdi-chevron-left"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><a  class="disabled d-none" aria-disabled="true">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                         <li><a class="active d-none" aria-current="page">{{ $page }}</a></li>
                    @else
                        <li><a class="d-none" wire:click="gotoPage({{ $page }})">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="current"><a  wire:click="nextPage" rel="next" aria-label="@lang('pagination.next')"><i class="zmdi zmdi-chevron-right"></i></a></li>
        @else
            <li class="disabled"><a aria-disabled="true" aria-label="@lang('pagination.next')"><i class="zmdi zmdi-chevron-right"></i></a></li>
        @endif
    </ul>
    </div>
@endif