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
        <div class = "footer-box">
                <p>☎: (+31)06-12345678</p>
                <p>✉: Openhiring@oh.nl</p>
                <p>📍: Pernisstraat 69</p>
                <p>@: Onze Contact Pagina</p>
        </div>
        <div>
            <img id="header-logo" src="{{ asset('/images/logos/logo.png') }}" alt="website logo">
        </div>
    </footer>
</body>
</html>
