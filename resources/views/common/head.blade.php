<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>{{ $title or config('app.name') }}</title>
    <meta name="description" content="{{ $description or '' }}" />
    <meta name="keywords" content="{{ $keywords or 'php,52laozhou,blog,laravel' }}" />
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://lccdn.phphub.org//assets/css/85cf4c8f967021f1ce6b-styles.css">
    {{--<link rel="stylesheet" href="/css/public.min.css">--}}
    <link rel="stylesheet" href="/css/nav.css">
</head>
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