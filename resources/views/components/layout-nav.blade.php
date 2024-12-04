
<nav class = "sideNav" id = "sideNav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href = "{{ url('http://127.0.0.1:8000/') }}" class = "navText">Home</a>
    <a href = "{{ route('categories.index') }}" class = "navText">Vacatures</a>
    <a href = "#" class = "navText">Mijn inschrijvingen</a>
    <a href = "#" class = "navText">Contact</a>
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
