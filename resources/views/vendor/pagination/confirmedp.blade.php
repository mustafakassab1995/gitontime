@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>السابق</span></li>
        @else
            <li class="paginate_button previous"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">السابق</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="paginate_button active confirmed_button"><span>{{ $page }}</span></li>
                    @else
                        <li class="paginate_button confirmed_button"><a href="{{url('confirmed')}}?page={{ $page }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="paginate_button next" id="default-datatable_next"><a href="{{ $paginator->nextPageUrl() }}" rel="next">التالي</a></li>
        @else
            <li class="disabled"><span>التالي</span></li>
        @endif
    </ul>
@endif
