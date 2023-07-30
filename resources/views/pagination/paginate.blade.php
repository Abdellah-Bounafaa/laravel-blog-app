<style>
    .custom-pagination .pagination {
        display: inline-flex;
        border-radius: 4px;
        font-weight: bold
    }

    .custom-pagination .pagination li {
        display: inline-block;
        margin-right: 5px;
    }

    .custom-pagination .pagination li.disabled span,
    .custom-pagination .pagination li.disabled a {
        color: #aaa;
        pointer-events: none;
        cursor: not-allowed;
    }

    .custom-pagination .pagination li a,
    .custom-pagination .pagination li span {
        padding: 5px 10px;
        border: 1px solid #ccc;
        text-decoration: none;
        display: flex;
        align-items: center;
        /* Center the content vertically */
        justify-content: center;
        /* Center the content horizontally */
    }

    .custom-pagination .pagination li.active span {
        background-color: #214252;
        color: #fff;
        border-color: #214252;
    }
</style>




<div class="row text-start pt-5 border-top">
    <div class="col-md-12">
        <div class="custom-pagination">
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                    <li class="disabled"><span>&lt;</span></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}">&lt;</a></li>
                @endif

                @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}">&gt;</a></li>
                @else
                    <li class="disabled"><span>&gt;</span></li>
                @endif
            </ul>
        </div>
    </div>
</div>
