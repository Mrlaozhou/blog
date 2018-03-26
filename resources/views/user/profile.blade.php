<!DOCTYPE html>
<html lang="zh">
    @include('common.head')
<body id="body" class="users-show">
<div id="wrap">
    @include('common.topnav')
    <div class="container main-container ">
        <div class="users-show  row">
            {{-- left --}}
            <div class="col-md-3">
                <div class="box">
                    <div class="padding-sm user-basic-info">
                        <div style="">
                            <div class="media">
                                <div class="media-left">
                                    <div class="image">
                                        <img class="media-object avatar-112 avatar img-thumbnail"
                                             src="{{ $profile->avatar ?: '/images/timg.jpg' }}">
                                    </div>
                                </div>
                                <div class="media-body">
                                    {{-- nickname --}}
                                    <h3 class="media-heading">{{ $profile->nickname ?: '匿名' }}</h3>
                                    <div class="item">
                                        {{-- turename --}}
                                    </div>
                                    <div class="item number">
                                        {{-- 活跃时间 --}}
                                        活跃于 <span class="timeago">{{ date('m.d',$profile->lastlogintime) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{--
                        <div class="topic-author-box text-center">

                            <ul class="list-inline">
                                <li class="popover-with-html" data-content="用户身份">
                                    <i class="fa fa-users"></i> <a href="https://laravel-china.org/roles/12">L5.5 译者</a>
                                </li>
                                <li class="popover-with-html" data-content="godruoyi">
                                    <i class="fa fa-github-alt"></i>
                                    <a href="https://github.com/godruoyi" target="_blank">
                                         GitHub
                                    </a>
                                </li>
                            </ul>

                        </div>
                        <hr>
                        <div class="follow-info row">
                            <div class="col-xs-4">
                                <a class="counter" href="https://laravel-china.org/users/5359/followers">37</a>
                                <a class="text" href="https://laravel-china.org/users/5359/followers">关注者</a>
                            </div>
                        </div>
                        --}}
                    </div>
                </div>
                {{--
                <div class="box text-center">
                    <div class="padding-sm user-basic-nav">
                        <ul class="list-group">
                            <a href="" class="">
                                <li class="list-group-item"><i class="text-md fa fa-headphones"></i> Ta 发布的文章</li>
                            </a>
                        </ul>
                    </div>
                </div>
                --}}
            </div>
            {{-- right --}}
            <div class="main-col col-md-9 left-col">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><i class="text-md fa fa-leaf"></i> 发表文章</div>
                    <div class="panel-body">
                        {{-- 文章列表 --}}
                        <ul class="list-group">
                            @foreach( $blogs as $item )
                            <li class="list-group-item">
                                <a href="{{ route('blog.detail',[$item->uuid]) }}"
                                   title="{{ $item->title }}" class="rm-link-color">{{ $item->title }}</a>
                                <span class="meta pull-right">
                                    <a href="" title="-">-</a>
                                    <span> ⋅ </span>{{ $item->agree }} 点赞
                                    <span> ⋅ </span>{{ $item->clicks }} 阅读
                                    <span class="hidden-sm"> ⋅ </span><span class="timeago">{{ date('m.d') }}</span>
                              </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        @include('common.footer')
    </footer>
</div>
</body>
</html>
