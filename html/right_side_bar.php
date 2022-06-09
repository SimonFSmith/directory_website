<aside class="side_bar">
    <br><br><br><br><br>
    <a class="btn btn-light" id="btn-menu" href="#" onclick="toggleMenu()">Recherche avancée</a>
    <div id="menu" style="display: none">
    <ul>
        <li><a href="./recherche_departement.php"><button type="button" class="btn btn-light" id="bouton-recherche-departement">Recherche par département</button></a></li>
        <li><a href="./recherche_emplacement.php"><button type="button" class="btn btn-light" id="bouton-recherche-emplacement">Recherche par emplacement</button></a></li>

    </ul>
</div>
</aside>

<script>
    function toggleMenu() {
    var menu = document.getElementById("menu");
    if (menu.style.display === "none") {
      menu.style.display = "block";
    } else {
      menu.style.display = "none";
    }
  }
</script>