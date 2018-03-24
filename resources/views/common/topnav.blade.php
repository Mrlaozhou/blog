<style>
    .navbar-default .navbar-brand img {
        width: 128px;
        height: 40px;
    }

    .navbar-default .navbar-brand {
        color: #fff;
        padding-top: 5px;
    }
</style>


{{-- 导航 --}}
<div role="navigation" class="navbar navbar-default topnav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">
                <img src="/images/logo-black.png" alt="Laravel China" style=""/>
            </a>
        </div>


        <div id="top-navbar-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @foreach( $topnavs as $key=>$item )
                    <li
                    @if( isset($currentTop) && $currentTop==$item['uuid'] )
                        class="active"
                    @endif
                    ><a href="{{ route('category.lists',[$item['uuid']]) }}">{{ $item['name'] }}</a></li>
                @endforeach
            </ul>
            <div class="navbar-right">
                <form method="GET" action="" accept-charset="UTF-8"
                      class="navbar-form navbar-left hidden-sm hidden-md">
                    <div class="form-group">
                        <input class="form-control search-input mac-style" placeholder="搜索" name="q" type="text"
                               value="" autocomplete="off">
                    </div>
                </form>
                <ul class="nav navbar-nav github-login">
                    {{--<a href="" class="btn btn-default login-btn no-pjax"><i class="fa fa-user"></i>登 录</a>--}}
                    {{--<a href="" class="btn btn-default login-btn no-pjax"><i class="fa fa-user-plus"></i>注 册</a>--}}
                </ul>
            </div>
        </div>
    </div>
</div>