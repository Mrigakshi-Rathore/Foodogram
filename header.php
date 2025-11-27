<!-- Offcanvas Menu -->
<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="darkMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Explore</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="rating.php">Rate Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="settings.php">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="help.php">Help/Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="terms.php">Terms and Conditions</a>
            </li>
        </ul>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<style>
@media (max-width: 768px) {
    #header {
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }
    #header > .d-flex {
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }
    #logo {
        order: -1;
        margin: 0 auto;
    }
    .header-search-form {
        flex-direction: column;
        align-items: stretch;
    }
    .header-search-form .btn {
        margin-top: 0.5rem;
    }
    #header > .d-flex > .input-group {
        width: 100%;
    }
}
</style>

<header id="header" class="d-flex align-items-center justify-content-between px-3 py-2 bg-black">
    <!-- Left: Hamburger + Logo -->
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-sm btn-white p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#darkMenu">
            <i class="fas fa-bars" style="font-size: 1.5rem;"></i>
        </button>
        <img id="logo" src="images/logo.jpg" alt="Logo" class="me-2" />

        <!-- Fixed Search Bar -->
        <form class="d-flex align-items-center header-search-form" action="search.php" method="GET">
            <input class="form-control form-control-lg rounded-pill me-2"
                   type="search"
                   name="q"
                   placeholder="🔍 Search for food or cuisines..."
                   aria-label="Search"
                   required>
            <button class="btn btn-danger rounded-pill px-3" type="submit">
                Search
            </button>
        </form>

        <div class="input-group ms-2">
            <span class="input-group-text bg-danger text-white px-2">
                <i class="fas fa-map-marker-alt"></i>
            </span>
            <select class="form-select">
                <option selected disabled>Location</option>
                <option>Jaipur</option>
                <option>Delhi</option>
                <option>Mumbai</option>
                <option>Bangalore</option>
            </select>
        </div>
    </div>

    <!-- Right: Buttons -->
    <div class="d-flex align-items-center gap-2">
        <a href="menu.php" class="btn btn-danger px-3 py-1">🍔 Menu</a>
        <a href="cart.php" class="btn btn-danger px-3 py-1">🛒 Cart</a>

        <?php if (isset($_SESSION['logged_in'])): ?>
            <a href="logout.php" class="btn btn-danger px-3 py-1">👤 Logout</a>
        <?php else: ?>
            <a href="login.php" class="btn btn-danger px-3 py-1">Login</a>
            <a href="signup.php" class="btn btn-danger px-3 py-1">Sign Up</a>
        <?php endif; ?>
    </div>
</header>
