@php
$link_limit = 3;
@endphp

@if ($paginator->lastPage() > 1)
<nav>
    <ul class="flex items-center space-x-4">
        <li class="{{ ($paginator->currentPage() == 1) ? ' hidden' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage() - 1) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                </svg>
            </a>
        </li>
        <?php
        $leftDots = false;
        $rightDots = false;
        $halfLinks = ceil($paginator->lastPage() / 2);
        ?>
        <li>
            <a href="{{ $paginator->url(1) }}" class="{{ ($paginator->currentPage() == 1) ? ' font-bold' : '' }}">{{ 1 }}</a>
        </li>
        @for ($i = 2; $i <= $paginator->lastPage() - 1; $i++)
            @if($i <= $paginator->currentPage() - $link_limit)
                @if($leftDots == false)
                <li>
                    <span>...</span>
                </li>
                @endif
                @php
                $leftDots = true;
                @endphp
                @elseif($i >= $paginator->currentPage() + $link_limit)
                @if($rightDots == false)
                <li>
                    <span>...</span>
                </li>
                @endif
                @php
                $rightDots = true;
                @endphp
                @else
                <li>
                    <a href="{{ $paginator->url($i) }}" class="{{ ($paginator->currentPage() == $i) ? ' font-bold' : '' }}">{{ $i }}</a>
                </li>
                @endif
                @endfor
                <li>
                    <a href="{{ $paginator->url($paginator->lastPage()) }}" class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' font-bold' : '' }}">{{ $paginator->lastPage() }}</a>
                </li>
                <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' hidden' : '' }}">
                    <a href="{{ $paginator->url($paginator->currentPage() + 1) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                        </svg>
                    </a>
                </li>
    </ul>
</nav>
@endif