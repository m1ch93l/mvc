<div class="nav justify-content-center">

    <a class="nav-link <?= ($activePage ?? 'home') === 'home' ? 'active' : '' ?>" href="?page=home">Home</a>

    <a class="nav-link <?= ($activePage ?? '') === 'about' ? 'active' : '' ?>" href="?page=about">About</a>

</div>
