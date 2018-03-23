<html lang="zh">

@include('common.head')

<body id="body" class="home">

    <div id="warp">
        {{-- 导航 --}}
        @include('common.nav')
        {{-- 页面主体 --}}
        <div class="container main-container">
            {{-- left --}}
            <div class="col-md-9 topics-index main-col">
                <div class="panel panel-default">
                    {{-- 二级分类 --}}
                    @isset( $nav2 )
                        @include('common.nav2')
                    @endisset
                    <div class="jscroll">
                        <div class="panel-body remove-padding-horizontal">
                            {{-- 文章列表 --}}
                            <ul class="list-group row topic-list">
                                @foreach( $lists as $item )
                                <li class="list-group-item ">
                                    <a class="reply_count_area hidden-xs pull-right" href="{{ route('blog.detail',[$item->uuid]) }}">
                                        <div class="count_set">
                                            <span class="count_of_votes" title="赞同">{{ $item->agree }}</span>
                                            <span class="count_seperator">/</span>
                                            <span class="count_of_replies" title="反对">{{ $item->oppose }}</span>
                                            <span class="count_seperator">/</span>
                                            <span class="count_of_visits" title="查看数">{{ $item->clicks }}</span>
                                            <span class="count_seperator">|</span>
                                            <abbr title="{{ date('Y-m-d H:i:s',$item->publishedtime) }}" class="timeago">{{ date('Y-m-d',$item->publishedtime) }}</abbr>
                                        </div>
                                    </a>
                                    <div class="avatar pull-left">
                                        <a href="{{ route('user.info',[$item->createdby]) }}" title="发布者">
                                            <img class="media-object img-thumbnail avatar avatar-middle" alt=""
                                                 src="{{ $item->cover != '' ? $item->cover : '/images/timg.jpg' }}"/>
                                        </a>
                                    </div>
                                    <div class="infos">
                                        <div class="media-heading">
                                            @switch($item->publishedtype)
                                                @case(2)
                                                <span class="hidden-xs label label-warning">置顶</span>
                                                @break

                                                @case(1)
                                                <span class="hidden-xs label label-success">推荐</span>
                                                @break

                                                @default
                                                <span class="hidden-xs label label-default">正文</span>
                                            @endswitch



                                            <a href="{{ route('blog.detail',[$item->uuid]) }}" title="{{ $item->title }}">{{ $item->title }}</a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="panel-footer text-right remove-padding-horizontal pager-footer">
                            <!-- Pager -->
                            {{ $lists->links() }}

                        </div>
                    </div>
                </div>
            </div>
            {{-- right --}}
            <div class="col-md-3 side-bar">

                @include('common.adv')

            </div>

            <div class="clearfix"></div>
        </div>
    </div>

    <footer>
        @include('common.footer')
    </footer>
</body>

</html>