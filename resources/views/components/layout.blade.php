<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <title>Open Hiring</title>
</head>
<body>
<header id="main-header">
    <x-layout-nav>
        <div class="header-item">
            <button id="hamburger-menu-button" type="button">☰</button>
        </div>
    </x-layout-nav>
    <div class="header-item"><a href = "{{route('index')}}"><img id="header-logo" src="{{ asset('/images/logos/logo.png') }}" alt="website logo"></a></div>
    <div class="header-item">
        <a href="{{ route('profile.edit') }}">
            <img id="profile-picture" src="{{ asset('/images/pfp.png') }}" alt="profile picture">
        </a>
    </div>

</header>
{{ $slot }}


<footer id="main-footer">
    <div>
        <a href="{{ route('contact') }}">Contact Pagina</a>
    </div>
    <div>
        <img id="footer-logo" src="{{ asset('/images/logos/logo.png') }}" alt="website logo">
    </div>
</footer>
</body>
</html>
