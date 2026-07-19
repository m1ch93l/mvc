<div class="nav justify-content-center">

    <!-- Added ?? 'home' so it defaults to active on the landing page -->
    <a class="nav-link <?php echo($_GET['page'] ?? 'home') == 'home' ? 'active' : '' ?>" href="?page=home">Home</a>

    <!-- Added ?? 'home' so it safely checks without throwing warnings -->
    <a class="nav-link <?php echo($_GET['page'] ?? 'home') == 'about' ? 'active' : '' ?>" href="?page=about">About</a>

</div>