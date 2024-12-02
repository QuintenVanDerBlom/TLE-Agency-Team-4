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
        <x-layout-nav><div class = "header-item"><button id="hamburger-menu-button" type="button">☰</button></div></x-layout-nav>
        <div class = "header-item"><img id="header-logo" src="{{ asset('/images/logos/logo.png') }}" alt="website logo"></div>
        <div class = "header-item"><img id="profile-picture" src="{{ asset('/images/pfp.png') }}" alt="profile picture"></div>
    </header>
    {{ $slot }}
    <footer>

    <footer id="main-footer">
        <div>
            <ul>
                <li>☎: (+31)06-12345678</li>
                <li>✉: Openhiring@oh.nl</li>
                <li>📍: Pernisstraat 69</li>
                <li>@: Onze Contact Pagina</li>
            </ul>
        </div>
        <div>
            <img id="header-logo" src="{{ asset('/images/logos/logo.png') }}" alt="website logo">
        </div>
    </footer>
</body>
</html>
