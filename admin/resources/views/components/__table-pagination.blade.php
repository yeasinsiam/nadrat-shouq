@if (isset($paginator))
    <div class="d-flex gap-3 flex-column flex-md-row justify-content-between align-items-center">
        <small>Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }}
            entries</small>



        @if ($paginator->hasPages())
            <nav>
                <ul class="pagination mb-0">
                    @if (!$paginator->onFirstPage())
                        <li class="page-item prev">
                            <a class="page-link waves-effect" href="{{ $paginator->previousPageUrl() }}"><i
                                    class="ti ti-chevron-left ti-xs"></i></a>
                        </li>
                    @endif


                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item">
                                <a class="page-link waves-effect" href="javascript:void(0);">...</a>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active">
                                        <a class="page-link waves-effect"
                                            href="javascript:void(0);">{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link waves-effect"
                                            href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li class="page-item next">
                            <a class="page-link waves-effect" href="{{ $paginator->nextPageUrl() }}"><i
                                    class="ti ti-chevron-right ti-xs"></i></a>
                        </li>
                    @endif
                </ul>
            </nav>
        @endif
    </div>
@endif
