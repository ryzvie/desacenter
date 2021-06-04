<style>
    ul.pager{
        float:right;
    }

    ul.pager > li{
        float:left;
        padding:5px 15px;
        border:1px solid #ccc;
        margin-right:2px;
    }

    .text-page{
        color:#000;
        font-size:13px;
    }
</style>


    <div class="text-right">
        <ul class="pager">
        
            @if ($paginator->onFirstPage())
                <li class="disabled"><span>Previous</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a></li>
            @endif


        
            @foreach ($elements as $element)
            
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif


            
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active my-active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach


            
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
            @else
                <li class="disabled"><span>Next</span></li>
            @endif
        </ul>
        
        <div style="clear:both;"></div>

        <div class="text-page">Total Data : {{ $paginator->total() }} Baris</div>
        <div class="text-page">Total /Per Halaman : {{ $paginator->perPage() }} Baris</div>
    </div>
