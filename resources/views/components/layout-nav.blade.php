
<nav class = "sideNav" id = "sideNav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href = "{{ route('index') }}" class = "navText">Home</a>
    <a href = "{{ route('categories.index') }}" class = "navText">Vacatures</a>
    <a href = "#" class = "navText">Mijn inschrijvingen</a>
    <a href = "#" class = "navText">Contact</a>
    <div>
        @auth
            <!-- Formulier voor uitloggen -->
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="button-bevestiging">Log out</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="navText">Log in</a>
        @endauth
    </div>


</nav>
<span onclick="openNav()">{{$slot}}</span>
<script>
    function openNav() {
        document.getElementById("sideNav").style.width = "60vw";
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        document.getElementById("sideNav").style.width = "0";
    }
</script>
