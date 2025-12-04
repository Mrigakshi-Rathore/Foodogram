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


.animate-text span:nth-child(1) { animation-delay: 0s; }
.animate-text span:nth-child(2) { animation-delay: 0.1s; }
.animate-text span:nth-child(3) { animation-delay: 0.2s; }
.animate-text span:nth-child(4) { animation-delay: 0.3s; }
.animate-text span:nth-child(5) { animation-delay: 0.4s; }
.animate-text span:nth-child(6) { animation-delay: 0.5s; }
.animate-text span:nth-child(7) { animation-delay: 0.6s; }
.animate-text span:nth-child(8) { animation-delay: 0.7s; }
.animate-text span:nth-child(9) { animation-delay: 0.8s; }
.animate-text span:nth-child(10) { animation-delay: 0.9s; }
.animate-text span:nth-child(11) { animation-delay: 1s; }
.animate-text span:nth-child(12) { animation-delay: 1.1s; }
.animate-text span:nth-child(13) { animation-delay: 1.2s; }
.animate-text span:nth-child(14) { animation-delay: 1.3s; }
.animate-text span:nth-child(15) { animation-delay: 1.4s; }
.animate-text span:nth-child(16) { animation-delay: 1.5s; }
.animate-text span:nth-child(17) { animation-delay: 1.6s; }
.animate-text span:nth-child(18) { animation-delay: 1.7s; }
.animate-text span:nth-child(19) { animation-delay: 1.8s; }
.animate-text span:nth-child(20) { animation-delay: 1.9s; }
.animate-text span:nth-child(21) { animation-delay: 2s; }
.animate-text span:nth-child(22) { animation-delay: 2.1s; }
.animate-text span:nth-child(23) { animation-delay: 2.2s; }
.animate-text span:nth-child(24) { animation-delay: 2.3s; }
.animate-text span:nth-child(25) { animation-delay: 2.4s; }
.animate-text span:nth-child(26) { animation-delay: 2.5s; }
.animate-text span:nth-child(27) { animation-delay: 2.6s; }
.animate-text span:nth-child(28) { animation-delay: 2.7s; }
.animate-text span:nth-child(29) { animation-delay: 2.8s; }
.animate-text span:nth-child(30) { animation-delay: 2.9s; }
.animate-text span:nth-child(31) { animation-delay: 3s; }



@keyframes fadeInUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

      .footer {
        height: 300px;
        background: linear-gradient(
          to right,
          #000000,
          #0d0d0d,
          #1a1a1a,
          #0d0d0d,
          #000000
        );
        color: white;
        padding-top: 2rem;
        padding-bottom: 1rem;
        font-size: 18px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
      }


  body.dark-mode {
    background-color: #121212;
    color: #f1f1f1;
  }

  .dark-mode .card {
    background-color: #1e1e1e;
    color: #f1f1f1;
    border: 1px solid #444;
  }

  .dark-mode .navbar, .dark-mode .footer {
    background-color: #1f1f1f;
  }

  .dark-mode .btn-outline-light {
    border-color: #f1f1f1;
    color: #f1f1f1;
  }

  .dark-mode .btn-outline-light:hover {
    background-color: #f1f1f1;
    color: #000;
  }
  .header-search-form {
    max-width: 1000px !important; /* Adjust this value */
    width: 100%;
}

/* Make the input field expand */
.header-search-form .form-control {
    flex-grow: 1;
    min-width: 320px; /* Minimum width */
}
        /* Make the hamburger menu icon smaller */
.btn-white i.fas.fa-bars {
    font-size: 2.2rem !important; /* Adjust size as needed (default is 1rem) */

}

/* -------------------------------------- */
/* 🔥 Improved Navbar Hover Effect        */
/* -------------------------------------- */

.offcanvas-body .nav-link {
    position: relative;
    padding: 8px 5px;
    font-size: 1.1rem;
    transition: all 0.3s ease-in-out;
    color: #ffffff !important;
}

.offcanvas-body .nav-link::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 2px;
    width: 0%;
    height: 2px;
    background-color: #ff4d4d;
    transition: width 0.3s ease-in-out;
    border-radius: 5px;
}

.offcanvas-body .nav-link:hover {
    color: #ff4d4d !important;
    transform: translateX(5px);
}

.offcanvas-body .nav-link:hover::after {
    width: 100%;
}


/* Light mode (default) */
body.light-mode {
    background-color: #ffffff;
    color: #000;
}

.light-mode .navbar,
.light-mode header {
    background-color: #ffffff !important;
    color: #000 !important;
}

/* Dark mode (already present but improving) */
body.dark-mode {
    background-color: #121212;
    color: #f1f1f1;
}

.dark-mode header,
.dark-mode .navbar,
.dark-mode .offcanvas {
    background-color: #1A1A1A !important;
}

.dark-mode .btn-outline-light {
    border-color: #fff;
    color: #fff;
}

.dark-mode .btn-outline-light:hover {
    background-color: #fff;
    color: #000;
}

/* Smooth transition */
* {
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* 🔥 Global Loading Spinner */
#globalLoader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.65);
    backdrop-filter: blur(5px);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 5000;
}

#globalLoader .spinner {
    width: 60px;
    height: 60px;
    border: 6px solid #fff;
    border-top-color: #ff3c3c;
    border-radius: 50%;
    animation: spin 0.9s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}



    </style>
</head>
<body>


<div id="globalLoader">
    <div class="spinner"></div>
</div>


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
                    <a class="nav-link text-white" href="help.php">Help/contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="terms.php">Terms and Conditions</a>
                </li>
            </ul>
        </div>
    </div>

    <header id="header" class="d-flex align-items-center justify-content-between px-3 py-2 bg-black">
        <!-- Left: Hamburger + Logo -->
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-sm btn-white p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#darkMenu">
                <i class="fas fa-bars" style="font-size: 1.5rem;"></i>

/* --- CUSTOM SCROLLBARS (Global & Menu) --- */

    /* 1. Main Website Scrollbar (Light Theme) */
    ::-webkit-scrollbar {
        width: 12px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    ::-webkit-scrollbar-thumb {
        background: #888; 
        border-radius: 6px;
        border: 3px solid #f1f1f1; /* Creates padding around the thumb */
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }

    /* 2. Side Menu (Offcanvas) Scrollbar (Dark Theme) */
    .offcanvas-body {
        overflow-y: auto !important; /* Force vertical scroll */
        max-height: 100vh;
    }
    .offcanvas-body::-webkit-scrollbar {
        width: 8px; /* Slightly thinner */
    }
    .offcanvas-body::-webkit-scrollbar-track {
        background: #212529; /* Matches Dark Menu Background */
    }
    .offcanvas-body::-webkit-scrollbar-thumb {
        background: #666; 
        border-radius: 4px;
        border: 2px solid #212529;
    }
    .offcanvas-body::-webkit-scrollbar-thumb:hover {
        background: #999; /* Lightens on hover */
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
            <?php endif; ?>
            <button id="darkModeToggle" class="btn btn-outline-light ms-1 px-3 py-1">🌙 Dark</button>
        </div>
    </header>

   <?php if (isset($_SESSION['welcome_message'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['welcome_message'] ?>
        <?php unset($_SESSION['welcome_message']); ?>
    </div>
<?php endif; ?>

<!-- 🌙 Theme Toggle Script -->
<script>
    const toggleBtn = document.getElementById("darkModeToggle");
    const body = document.body;

    // Load saved theme on refresh
    if (localStorage.getItem("theme") === "dark") {
        body.classList.add("dark-mode");
        toggleBtn.textContent = "☀️ Light";
    }

    toggleBtn.addEventListener("click", () => {
        body.classList.toggle("dark-mode");

        if (body.classList.contains("dark-mode")) {
            toggleBtn.textContent = "☀️ Light";
            localStorage.setItem("theme", "dark");
        } else {
            toggleBtn.textContent = "🌙 Dark";
            localStorage.setItem("theme", "light");
        }
    });
</script>
<script>
    function showLoader() {
        document.getElementById("globalLoader").style.display = "flex";
    }

    function hideLoader() {
        document.getElementById("globalLoader").style.display = "none";
    }

    // Auto-hide loader after page load
    window.addEventListener("load", () => hideLoader());
</script>

</body>
</html>

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

