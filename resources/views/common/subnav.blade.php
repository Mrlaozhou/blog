

{{-- 二级分类 --}}
<div class="panel-heading">
    <ul class="list-inline topic-filter">

        <li class="popover-with-html" data-content=""><a
                    @if( $currentTop == $current )
                        class="active"
                    @endif
                    href="{{ route('category.lists',[$currentTop]) }}">全部</a></li>
        @foreach( $subnavs as $key => $item )
            <li class="popover-with-html" data-content=""><a href="{{ route('category.lists',[$item['uuid']]) }}" class="
                @if( $current==$item['uuid'] )
                        active
                @endif
            ">{{ $item['name'] }}</a></li>
        @endforeach
    </ul>
    <div class="clearfix"></div>
</div>