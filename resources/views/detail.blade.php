<html lang="zh">

@include('common.head')

<link rel="stylesheet" href="/css/detail.css">
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
                <div class="infos panel-heading topics-show">
                    <h1 class="panel-title topic-title">{{ $info->title }}</h1>
                    <div class="meta inline-block" >
                        <a href="" class="remove-padding-left"><i class="fa fa-folder text-md" aria-hidden="true"></i> 公告</a>⋅
                        <a class="author" href="">Summer</a>⋅
                        于 <abbr title="2018-01-24 15:42:41" class="timeago">1个月前</abbr>⋅
                        最后回复由<a href="">{{--最后评论者--}}</a>
                        于 <abbr title="2018-03-20 18:07:56" class="timeago">22小时前</abbr>⋅17941 阅读
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="jscroll">
                    <div id="" class="panel-body remove-padding-horizontal">
                        {{-- 封面图 --}}
                        <div class="text-center"><img src="{{-- 封面图 --}}" alt="" /></div>
                        {{-- 文章详情 --}}
                        {!! $info->content !!}
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
    <footer>
        @include('common.footer')
    </footer>
</div>
</body>
</html>