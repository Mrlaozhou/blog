

{{-- 二级分类 --}}
<div class="panel-heading">
    <ul class="list-inline topic-filter">
        <li class="popover-with-html" data-content=""><a
                    @if( !isset($currentNav2) )
                        class="active"
                    @endif
                    href="javascript:;">全部</a></li>
        @foreach( $nav2 as $key => $item )
            <li class="popover-with-html" data-content=""><a href="{{ route('category.lists',[$item->uuid]) }}" class="
                @if( isset($currentNav2) && $currentNav2==$item->uuid )
                        active
                @endif
            ">{{ $item->name }}</a></li>
        @endforeach
    </ul>
    <div class="clearfix"></div>
</div>