
<nav class = "sideNav" id = "sideNav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href = "#">Home</a>
    <a href = "#">Vacatures</a>
    <a href = "#">Mijn inschrijvingen</a>
    <a href = "#">Contact</a>
</nav>
<span onclick="openNav()">open</span>
<script>
    function openNav() {
        document.getElementById("sideNav").style.width = "60vw";
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        document.getElementById("sideNav").style.width = "0";
    }
</script>
