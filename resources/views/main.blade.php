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
                                            <abbr title="{{ date('Y-m-d H:i:s',$item->publishedtime) }}" class="timeago">16分钟前</abbr>
                                        </div>
                                    </a>
                                    <div class="avatar pull-left">
                                        <a href="" title="http://www.52laozhou.com">
                                            <img class="media-object img-thumbnail avatar avatar-middle" alt="http://www.52laozhou.com" src="/images/timg.jpg"/>
                                        </a>
                                    </div>
                                    <div class="infos">
                                        <div class="media-heading">
                                            <span class="hidden-xs label label-warning">置顶</span>
                                            <a href="{{ route('blog.detail',[$item->uuid]) }}" title="{{ $item->title }}">{{ $item->title }}</a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="panel-footer text-right remove-padding-horizontal pager-footer">
                            <!-- Pager -->
                            <ul class="pagination">

                                <li class="disabled"><span>&laquo;</span></li>

                                <li class="active"><span>1</span></li>
                                <li><a href="https://laravel-china.org?page=2">2</a></li>
                                <li><a href="https://laravel-china.org?page=3">3</a></li>
                                <li class="disabled"><span>...</span></li>

                                <li><a href="https://laravel-china.org?page=2" rel="next">&raquo;</a></li>
                            </ul>

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