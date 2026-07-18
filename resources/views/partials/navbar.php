<div class="d-flex justify-content-center">
    <ul class="nav nav-underline">
        <li class="nav-item">
            <!-- Added ?? 'home' so it defaults to active on the landing page -->
            <a class="nav-link <?php echo($_GET['page'] ?? 'home') == 'home' ? 'active' : '' ?>" aria-current="page"
                href="?page=home" hx-boost="true">Home</a>
        </li>
        <li class="nav-item">
            <!-- Added ?? 'home' so it safely checks without throwing warnings -->
            <a class="nav-link <?php echo($_GET['page'] ?? 'home') == 'about' ? 'active' : '' ?>" href="?page=about"
                hx-boost="true">About</a>
        </li>
    </ul>
</div>