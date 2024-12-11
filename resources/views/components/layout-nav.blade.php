
<nav class = "sideNav" id = "sideNav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href = "{{ route('index') }}" class = "navText">Home</a>
    <a href = "{{ route('joblistings.index') }}" class = "navText">Alle vacatures</a>
    <a href = "{{ route('jobapplication.index') }}" class = "navText">Mijn inschrijvingen</a>
    <a href = "{{ route('contact') }}" class = "navText">Contact</a>
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
<style>
    @media screen and (min-width: 768px) {

    }
</style>
<script>
    function openNav() {
        // Check if the screen width is greater than or equal to 768px
        if (window.matchMedia("(min-width: 768px)").matches) {
            // If the screen is wider than 768px, set the sideNav width to 60vw
            document.getElementById("sideNav").style.width = "25vw";
        } else {
            // If the screen is smaller than 768px, set the sideNav width to 40vw
            document.getElementById("sideNav").style.width = "60vw";
        }
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        document.getElementById("sideNav").style.width = "0";
    }
</script>
