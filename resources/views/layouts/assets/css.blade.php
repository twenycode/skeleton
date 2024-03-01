<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Dynamic Page title -->
<title>@yield('title',config('app.name'))</title>

<!-- Favicons -->
<link href=" {{ asset('images/favicon.png') }} " rel="icon">
<link href=" {{ asset('images/apple-touch-icon.png') }} " rel="apple-touch-icon">

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<!-- Boostrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"  />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" />

<!--Master Style -->
<link rel="stylesheet" href="{{ asset( 'css/master.css' ) }}">
