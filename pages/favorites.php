<?php
session_start();

// Example username (replace with $_SESSION['username'] after login)
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "@xyz";

// Example favorites (later: fetch from DB)
$favorites = [
    [
        "name" => "Paneer Butter Masala",
        "desc" => "Rich and creamy North Indian curry loved for its savory depth.",
        "img"  => "https://images.unsplash.com/photo-1701579231378-3726490a407b?q=80&w=687&auto=format&fit=crop"
    ],
    [
        "name" => "Mexican Nacho Bowl",
        "desc" => "Crunchy nachos layered with beans, cheese, salsa and jalapeños.",
        "img"  => "https://images.unsplash.com/photo-1582170090097-b251ddbbf7f3?q=80&w=830&auto=format&fit=crop"
    ],
    [
        "name" => "Belgian Chocolate Waffle",
        "desc" => "Golden waffle topped with melted chocolate and strawberries 🍓",
        "img"  => "https://images.unsplash.com/photo-1734772045171-2af52aea78af?q=80&w=1170&auto=format&fit=crop"
    ],
    [
        "name" => "Classic Caesar Salad",
        "desc" => "Crisp romaine, parmesan shavings, and creamy dressing with garlic croutons.",
        "img"  => "https://images.unsplash.com/photo-1722032617357-7b09276b1a8d?q=80&w=1173&auto=format&fit=crop"
    ],
    [
        "name" => "Dragon Roll Sushi",
        "desc" => "A fusion of avocado, tempura, and eel—delicately rolled with flair.",
        "img"  => "https://plus.unsplash.com/premium_photo-1712949140529-203336f93d17?q=80&w=687&auto=format&fit=crop"
    ],
    [
        "name" => "Italian Penne Arrabiata",
        "desc" => "Pasta drenched in tangy tomato sauce with bold chili and garlic notes.",
        "img"  => "https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?q=80&w=880&auto=format&fit=crop"
    ],
    [
        "name" => "Tandoori Paneer Pizza",
        "desc" => "Smoky tandoori paneer with extra cheese—fusion indulgence!",
        "img"  => "https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?q=80&w=1981&auto=format&fit=crop"
    ],
    [
        "name" => "Vegetable Korma",
        "desc" => "Mixed vegetables in a mildly spiced, nutty gravy—fragrant and satisfying.",
        "img"  => "https://plus.unsplash.com/premium_photo-1726783359110-de1b5d04179c?q=80&w=687&auto=format&fit=crop"
    ],
    [
        "name" => "Masala Dosa",
        "desc" => "Crisp rice crepe stuffed with spiced potato filling, served with chutney and sambar.",
        "img"  => "https://images.unsplash.com/photo-1694849789325-914b71ab4075?q=80&w=1074&auto=format&fit=crop"
    ],
    [
        "name" => "Veg Pulao",
        "desc" => "Fluffy rice cooked with garden vegetables and aromatic spices.",
        "img"  => "https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?q=80&w=810&auto=format&fit=crop"
    ],
    [
        "name" => "Rajma Masala",
        "desc" => "Red kidney beans stewed in thick onion-tomato gravy—comfort food perfection.",
        "img"  => "https://images.unsplash.com/photo-1668236534990-73c4ed23043c?q=80&w=1170&auto=format&fit=crop"
    ],
    [
        "name" => "Manchurian",
        "desc" => "Crispy cauliflower tossed in spicy Indo-Chinese sauce—fiery and addictive.",
        "img"  => "https://images.unsplash.com/photo-1714569730595-8db9da7b2860?q=80&w=1170&auto=format&fit=crop"
    ],
    [
        "name" => "Vegetable Spring Rolls",
        "desc" => "Golden rolls packed with crunchy veggies, served with sweet chili dip.",
        "img"  => "https://images.unsplash.com/photo-1679310290259-78d9eaa32700?q=80&w=735&auto=format&fit=crop"
    ],
    [
        "name" => "Kaju Curry",
        "desc" => "Roasted cashews in a luxurious creamy gravy—royalty on a plate!",
        "img"  => "https://images.unsplash.com/photo-1675062521103-2163d664643d?q=80&w=735&auto=format&fit=crop"
    ],
    [
        "name" => "Chole Puri",
        "desc" => "Chole sautéed with spices—simple, homely, and flavorful puris.",
        "img"  => "https://images.unsplash.com/photo-1717587052948-fb9825de50f8?q=80&w=841&auto=format&fit=crop"
    ],
    [
        "name" => "Hakka Noodles",
        "desc" => "Stir-fried noodles with colorful vegetables in a savory soy-based sauce.",
        "img"  => "https://images.unsplash.com/photo-1607328874071-45a9cd600644?q=80&w=1171&auto=format&fit=crop"
    ],
    [
        "name" => "White Sauce Pasta",
        "desc" => "Penne pasta in creamy béchamel with veggies—comfort in every bite.",
        "img"  => "https://images.unsplash.com/photo-1546549032-9571cd6b27df?q=80&w=687&auto=format&fit=crop"
    ],
    [
        "name" => "Virgin Mojito",
        "desc" => "Zingy lime, mint, soda, and a hint of sweetness—instantly refreshing!",
        "img"  => "https://images.unsplash.com/photo-1704643384390-bf82a4e27c52?q=80&w=1974&auto=format&fit=crop"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Favorite Dishes - Foodogram</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: #24C6DC;
      background: -webkit-linear-gradient(to right, #514A9D, #24C6DC);
      background: linear-gradient(to right, #514A9D, #24C6DC);
    }
    .favorites-header {
      background: linear-gradient(to right, #052549, #49b7e6);
      color: white;
      padding: 2rem;
      text-align: center;
    }
    .card {
      margin-bottom: 1.5rem;
      box-shadow: 1.5px 1.5px 1.5px gray;
    }
    .dish-img {
      height: 200px;
      object-fit: cover;
    }
    .btn-home {
      display: flex;
      justify-content: center;
      margin: 30px auto;
    }
    /* -------- HEADER -------- */
header {
  height: 200px;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(8px);
  border-bottom: 1px solid rgba(255, 255, 255, 0.2);
  position: sticky;
  top: 0;
  z-index: 1000;
}

#logo {
  height: 135px;
  width: 135px;
  margin-top: 0;
  margin-left: 15px;
  border-radius: 50%;
}

button i {
  font-size: 3rem;
  padding: 4px;
  color: white;
  border: none;
  outline: none;
  box-shadow: none;
}

.header-search-form {
  max-width: 1000px !important;
}

.header-search-form .form-control {
  flex-grow: 1;
  min-width: 320px;
}

.btn-white i.fas.fa-bars {
  font-size: 2.2rem !important;
}

/* -------- FOOTER -------- */
.footer {
  background: linear-gradient(to right, #000000, #0d0d0d, #1a1a1a, #0d0d0d, #000000);
  color: white;
  padding-top: 2rem;
  padding-bottom: 1rem;
  font-size: 18px;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
}

.footer h5,
.footer h6 {
  color: yellow;
}

.footer a {
  color: white;
  transition: color 0.3s ease;
}

.footer a:hover {
  color: rgb(255, 200, 0);
}
  </style>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<!-- Header -->
<header id="header" class="d-flex align-items-center justify-content-between px-3 py-2 bg-black">
  <!-- Left: Hamburger + Logo -->
  <div class="d-flex align-items-center gap-3">
    <button class="btn btn-sm btn-white p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#darkMenu">
      <i class="fas fa-bars" style="font-size: 1.5rem;"></i>
    </button>
    <img id="logo" src="../assets/images/logo.jpg" alt="Logo" class="me-2" />

<!-- Fixed Search Bar -->
<form class="d-flex align-items-center header-search-form" action="../search.php" method="GET">
    <input class="form-control form-control-lg rounded-pill me-2" 
           type="search" 
           name="q"  <!-- Added name attribute -->
           placeholder="🔍 Search for food or cuisines..." 
           aria-label="Search"
           required>
    <button class="btn btn-danger rounded-pill px-3" type="submit">
        Search
    </button>
</form>
    
    <!-- Location Selector -->
    <div class="input-group ms-2" style="width: 200px; height: 40px;">
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
    <a href="../menu.php" class="btn btn-danger px-3 py-1">🍔 Menu</a>
    <a href="../cart.php" class="btn btn-danger px-3 py-1">🛒 Cart</a>

    <?php if (isset($_SESSION['logged_in'])): ?>
      <a href="../logout.php" class="btn btn-danger px-3 py-1">👤 Logout</a>
    <?php else: ?>
      <a href="../login.php" class="btn btn-danger px-3 py-1">Login</a>
    <?php endif; ?>


  </div>
</header>

<!-- Offcanvas Menu -->
<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="darkMenu">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Explore</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link text-white" href="../index.php">Home</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../about.php">About Us</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../profile.php">Profile</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../rating.php">Rate Us</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../settings.php">Settings</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../help.php">Help/Contact</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../terms.php">Terms & Conditions</a></li>
    </ul>
  </div>
</div>
  <!-- Header -->
  <div class="favorites-header">
    <h1><?php echo htmlspecialchars($username); ?>'s Favorite Dishes</h1>
    <p>Saved flavors, irresistible cravings 🍕🍰🍛</p>
  </div>

  <!-- Favorites Gallery -->
  <div class="container mt-4">
    <div class="row">
      <?php foreach ($favorites as $dish): ?>
        <div class="col-md-4 dish-card">
          <div class="card">
            <img src="<?php echo $dish['img']; ?>" class="card-img-top dish-img" alt="Dish Image">
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($dish['name']); ?></h5>
              <p class="card-text"><?php echo htmlspecialchars($dish['desc']); ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="btn-home">
    <a href="../index.php" class="btn btn-dark">Back To Home</a>
  </div>

<!-- Footer -->
<footer class="footer text-white">
  <div class="container text-center text-md-start">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h5 class="fw-bold" style="color: rgb(255, 200, 0); font-size: 30px;">🍽️ Foodogram</h5>
        <p>Your go-to destination for fresh, fast & delicious food delivered at your door.</p>
      </div>
      <div class="col-md-4 mb-3">
        <h6 class="fw-bold" style="color: yellow;">Quick Links</h6>
        <ul class="list-unstyled">
          <li><a href="../about.php" class="text-white text-decoration-none">About Us</a></li>
          <li><a href="../menu.php" class="text-white text-decoration-none">Menu</a></li>
          <li><a href="../profile.php" class="text-white text-decoration-none">Profile</a></li>
          <li><a href="../contact.php" class="text-white text-decoration-none">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-3">
        <h6 style="color: yellow;" class="fw-bold">Follow Us</h6>
        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
        <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
        <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
      </div>
    </div>
    <hr class="border-secondary" />
    <div style="color: yellow;" class="text-center small">
      &copy; <?php echo date('Y'); ?> Foodogram. All rights reserved.
    </div>
  </div>
</footer>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>