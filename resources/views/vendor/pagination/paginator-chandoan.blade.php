@if ($paginator->hasPages())


    <div class="footer">
        <ul class="list-inline fleft">
            <li>
                <a href="{{ $paginator->previousPageUrl()}}">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>
            <li>
                <a href="{{ $paginator->nextPageUrl()}}">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
        </ul>
        <p class="fright">Trang: {{ $paginator->currentPage() }}</p>
        <div class="clear-fix"></div>
    </div>

@endif

