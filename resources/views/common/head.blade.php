<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>{{ $title or config('app.name') }}</title>
    <meta name="description" content="{{ $description or '' }}" />
    <meta name="keywords" content="{{ $keywords or 'php,52laozhou,blog,laravel' }}" />
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/public.css">
    <link rel="stylesheet" href="/css/nav.css">
</head>