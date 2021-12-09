@if($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @if($paginator->onFirstPage())
                <li class="page-item disabled"><a tabindex="-1" aria-disabled="true" class="page-link" disabled>Previous</a></li>
            @else
                <li class="page-item"><a wire:click="previousPage" class="page-link">Previous</a></li>
            @endif

            @foreach ($elements as $element)
                @foreach ($element as $page => $url)
                    @if($page == $paginator->currentPage())
                        <li class="page-item active"><a wire:click="gotoPage({{$page}})" class="page-link">{{$page}}</a></li>
                    @else
                        <li class="page-item"><a wire:click="gotoPage({{$page}})" class="page-link">{{$page}}</a></li>
                    @endif
                @endforeach
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item"><a wire:click="nextPage" class="page-link">Next</a></li>
            @else
                <li class="page-item disabled"><a tabindex="-1" aria-disabled="true" class="page-link">Next</a></li>
            @endif

{{--            <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
        </ul>
    </nav>
@endif
