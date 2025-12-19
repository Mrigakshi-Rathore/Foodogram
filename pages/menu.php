<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu - Foodogram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        /* Your existing CSS styles here */
        header {
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(8px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    position: relative;
}

/* Sticky header for desktop and laptop only */
@media (min-width: 768px) {
    header {
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .menu-container {
        margin-top: 0;
        padding-top: 200px;
    }
}


        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            z-index: -1;
        }
        
        #logo {
            height: 135px;
            width: 135px;
            margin-top: 0;
            margin-left: 15px;
            border-radius: 50%;
        }
        
        body {
            background-image: url("../bgImg.jpeg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
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

        /* Menu specific styles */
        .menu-container {
            padding: 2rem 0;
            color: white;
            margin-top: 220px;
        }
        
        .category-title {
            font-size: 2rem;
            margin: 2rem 0 1rem;
            color: #ff6b6b;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
            border-bottom: 2px solid #ff6b6b;
            padding-bottom: 0.5rem;
        }
        
        .menu-card {
            background: rgba(206, 27, 27, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
            color: white;
            <?php if ($item['isVeg']) : ?>
                <span class="veg-icon">🟢 Veg</span>
            <?php else : ?>
                <span class="non-veg-icon">🔴 Non-Veg</span>
            <?php endif; ?>

        }
        
        .menu-card:hover {
            transform: translateY(-20px);
            box-shadow: 10 10px 20px rgba(0,0,0,0.3);
        }
        
        .menu-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        
        .menu-body {
            padding: 1.5rem;
        }
        
        .menu-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #ffffff;
        }
        
        .menu-price {
            font-size: 1.3rem;
            color: #ff6b6b;
            font-weight: bold;
        }
        
        .menu-description {
            margin: 1rem 0;
            color: #e0e0e0;
        }
        
        .add-to-cart {
            background: #ff6b6b;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .add-to-cart:hover {
            background: #ff5252;
            transform: scale(1.05);
        }
        
        .veg-icon {
            color: green;
            font-size: 1.2rem;
            margin-right: 0.5rem;
        }
        
        .non-veg-icon {
            color: red;
            font-size: 1.2rem;
            margin-right: 0.5rem;
        }
        
        .menu-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0,0,0,0.7);
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
        }
        
        .menu-rating {
            color: #ffc107;
            margin-left: 0.5rem;
        }
        
        /* Dark mode styles */
        body.dark-mode .menu-card {
            background: rgba(30, 30, 30, 0.8);
            border: 1px solid #444;
        }
        
        body.dark-mode .menu-title {
            color: #f1f1f1;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .menu-img {
                height: 150px;
            }
        }

        /* Mobile responsiveness for header and menu items */
        @media (max-width: 576px) {
            header {
                flex-direction: column;
                align-items: stretch;
                padding: 10px;
            }

            header .d-flex {
                flex-direction: column;
                gap: 10px;
            }

            #logo {
                height: 100px;
                width: 100px;
                margin-left: 0;
                align-self: center;
            }

            .header-search-form {
                width: 100%;
            }

            .header-search-form input {
                width: 100%;
                font-size: 14px;
            }

            .header-search-form button {
                font-size: 14px;
            }

            .input-group {
                width: 100%;
                margin: 0;
            }

            .input-group select {
                font-size: 14px;
            }

            header .d-flex:last-child {
                flex-direction: row;
                justify-content: center;
                gap: 10px;
            }

            header .btn {
                font-size: 14px;
                padding: 5px 10px;
            }

            .menu-container {
                padding: 1rem 0;
            }

            .category-title {
                font-size: 1.8rem;
                margin: 1.5rem 0 0.5rem;
                padding-bottom: 0.3rem;
            }

            .menu-card {
                margin-bottom: 1rem;
            }

            .menu-img {
                height: 180px;
            }

            .menu-body {
                padding: 1rem;
            }

            .menu-title {
                font-size: 1.3rem;
                margin-bottom: 0.3rem;
            }

            .menu-price {
                font-size: 1.2rem;
            }

            .menu-description {
                font-size: 0.9rem;
                margin: 0.5rem 0;
            }

            .add-to-cart {
                padding: 0.4rem 1rem;
                font-size: 0.9rem;
                min-height: 40px;
            }

            .veg-icon, .non-veg-icon {
                font-size: 1rem;
            }

            .menu-rating {
                font-size: 0.9rem;
            }

            .menu-badge {
                font-size: 0.7rem;
                padding: 0.2rem 0.6rem;
            }

            .cart-toast {
                bottom: 10px;
                right: 10px;
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }
         /* Menu Category Styles */
        .menu-container {
            margin-top: 75px;
            padding: 0px 0;
            color: white;
        }
        
        .category-title {
            font-size: 2.2rem;
            margin: 40px 0 20px;
            color: #ff6b6b;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            border-bottom: 2px solid #ff6b6b;
            padding-bottom: 10px;
            font-weight: 700;
        }
        
        /* Filter & Sort Controls */
        .menu-controls {
            background: rgba(0, 0, 0, 0.7);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 30px;
            backdrop-filter: blur(5px);
        }

        @media (max-width: 576px) {
            .menu-filters {
            flex-wrap: nowrap;
            overflow-x: auto;
            padding-bottom: 5px;
            }

            .menu-filters::-webkit-scrollbar {
            display: none;
            }
        }


        .filter-btn {
            background: transparent;
            border: 1px solid #ff6b6b;
            color: #ff6b6b;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        /* Hover effect */
        .filter-btn:hover {
            background-color: rgba(255, 107, 107, 0.15);
        }

        /* Active button */
        .filter-btn.active {
            background-color: #ff6b6b;
            color: #fff;
            border-color: #ff6b6b;
        }

        /* Mobile optimization */
        @media (max-width: 576px) {
            .filter-btn {
                flex: 1 1 auto;
                text-align: center;
                padding: 10px;
                font-size: 13px;
            }
        }

        
        
        .sort-select {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
        }
        .cart-toast{
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: rgba(0,0,0,0.8);
    color: white;
    padding: 15px 20px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 15px;
    transform: translateY(100px);
    opacity: 0;
    transition: all 0.3s ease;
    z-index: 1000;
}
.cart-toast.show {
    transform: translateY(0);
    opacity: 1;
}
.cart-toast a {
    color: #ff6b6b;
    font-weight: bold;
    text-decoration: none;
}

        .fa-bars {
  color: white !important;
}
.cart-toast {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0.9);
    color: white;
    padding: 15px 20px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 15px;
    transform: translateY(100px);
    opacity: 0;
    transition: all 0.3s ease;
    z-index: 10000;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.cart-toast.show {
    transform: translateY(0);
    opacity: 1;
}

.cart-toast a {
    color: #ff6b6b;
    font-weight: bold;
    text-decoration: none;
}
.menu-card.hidden {
    display: none;
}

/* 1. Global Scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    ::-webkit-scrollbar-thumb {
        background: #888; 
        border-radius: 5px;
        border: 2px solid #f1f1f1;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }

    /* 2. Side Menu (Offcanvas) Scrollbar */
    .offcanvas-body {
        overflow-y: auto !important;
        max-height: 100vh;
    }
    .offcanvas-body::-webkit-scrollbar {
        width: 6px;
    }
    .offcanvas-body::-webkit-scrollbar-track {
        background: #212529; /* Dark background */
    }
    .offcanvas-body::-webkit-scrollbar-thumb {
        background: #666; 
        border-radius: 4px;
    }
    .offcanvas-body::-webkit-scrollbar-thumb:hover {
        background: #999; 
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Offcanvas Menu (same as home page) -->
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

    <!-- Header (same as home page) -->
    <header id="header" class="d-flex align-items-center justify-content-between px-3 py-2 bg-black">
        <!-- Left: Hamburger + Logo -->
        <div class="d-flex align-items-center gap-3">
            <button class="btn bg-transparent border-0 p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#darkMenu">
  <i class="fas fa-bars text-white" style="font-size: 1.8rem;"></i>
</button>
            <img id="logo" src="../assets/images/logo.jpg" alt="Logo" class="me-2" />
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
         <div class="filter-wrapper">
            <div class="menu-filters mb-3">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="veg">🟢 Veg</button>
                <button class="filter-btn" data-filter="non-veg">🔴 Non-Veg</button>
                
            </div>
        </div>

        <div class="d-flex align-items-center gap-2">
            <a href="menu.php" class="btn btn-danger px-3 py-1">🍔 Menu</a>
            <a href="#" class="btn btn-danger px-3 py-1" data-bs-toggle="modal" data-bs-target="#cartModal">🛒 Cart</a>

            <?php if (isset($_SESSION['logged_in'])): ?>
                <a href="logout.php" class="btn btn-danger px-3 py-1">👤 Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-danger px-3 py-1">Login</a>
            <?php endif; ?>

        </div>
    </header>

    <!-- Menu Content -->
    <div class="menu-container container">
        <h1 class="text-center mb-5" style="color: #ff6b6b; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Our Delicious Menu</h1>

        <!-- Filter & Sort Controls -->
        <div class="menu-controls">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="veg">Veg</button>
            <button class="filter-btn" data-filter="non-veg">Non-Veg</button>
            <button class="filter-btn" data-filter="bestseller">Bestseller</button>
            <button class="filter-btn" data-filter="chef-special">Chef's Special</button>
            <select class="sort-select" id="sortSelect">
                <option value="">Sort by</option>
                <option value="price-asc">Price: Low to High</option>
                <option value="price-desc">Price: High to Low</option>
                <option value="rating">Rating</option>
                <option value="name">Name</option>
            </select>
        </div>

        <!-- Menu Container -->


       
        
        <!-- Appetizers Section -->

<h2 class="category-title">🍟 Appetizers</h2>
<div class="row appetizers-category"> 

    <!-- Item 1 -->
    <div class="col-md-4">
        <div class="menu-card" 
             data-id="1"
             data-name="Bruschetta"
             data-price="300"
             data-category="appetizers"
            data-veg="true"
            data-bestseller="true"
            data-rating="4.8"
            data-img="https://images.unsplash.com/photo-1512621776951-a57141f2eefd">
            <div class="position-relative">
                <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd" class="menu-img" alt="Bruschetta">
                <span class="menu-badge text-white">Bestseller</span>
            </div>
            <div class="menu-body">
                <h3 class="menu-title">
                    <i class="fas fa-leaf veg-icon"></i> Bruschetta
                    <span class="menu-rating">★ 4.8</span>
                </h3>
                <p class="menu-description">Toasted bread topped with tomatoes, garlic, and fresh basil.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="menu-price">₹300</span>
                    <button class="add-to-cart btn btn-danger">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Item 2 -->
    <div class="col-md-4">
        <div class="menu-card" 
             data-id="2"
             data-name="Loaded Nachos"
             data-veg="false"
             data-price="350"
             data-img="https://images.unsplash.com/photo-1529563021893-cc83c992d75d">
            <img src="https://images.unsplash.com/photo-1529563021893-cc83c992d75d" class="menu-img" alt="Loaded Nachos">
            <div class="menu-body">
                <h3 class="menu-title">
                    <i class="fas fa-drumstick-bite non-veg-icon"></i> Loaded Nachos
                    <span class="menu-rating">★ 4.5</span>
                </h3>
                <p class="menu-description">Crispy tortilla chips with cheese, jalapeños, and guacamole.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="menu-price">₹350</span>
                    <button class="add-to-cart btn btn-danger">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Item 3 -->
    <div class="col-md-4">
        <div class="menu-card" 
             data-id="3"
             data-name="Spring Rolls"
             data-veg="true"
             data-price="299"
             data-img="https://images.unsplash.com/photo-1603105037880-880cd4edfb0d">
            <img src="https://images.unsplash.com/photo-1603105037880-880cd4edfb0d" class="menu-img" alt="Spring Rolls">
            <div class="menu-body">
                <h3 class="menu-title">
                    <i class="fas fa-leaf veg-icon"></i> Spring Rolls
                    <span class="menu-rating">★ 4.3</span>
                </h3>
                <p class="menu-description">Crispy vegetable spring rolls with sweet chili sauce.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="menu-price">₹299</span>
                    <button class="add-to-cart btn btn-danger">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Item A1 -->
<div class="col-md-4">
    <div class="menu-card" data-id="21" data-name="Cheese Balls" data-price="199" data-veg="true"
         data-img="https://images.unsplash.com/photo-1604908812172-f99b9f79e5c5">
        <img src="https://images.unsplash.com/photo-1714256635057-2a831a5c7e8d?q=80&w=2076&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="menu-img" alt="Cheese Balls">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Cheese Balls <span class="menu-rating">★ 4.7</span></h3>
            <p class="menu-description">Crispy fried cheese balls served with spicy dip.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹199</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>





<!-- Item A4 -->
<div class="col-md-4">
    <div class="menu-card" data-id="24" data-name="Stuffed Mushrooms" data-price="259" data-veg="true"
         data-img="https://images.unsplash.com/photo-1603048335149-4fc0f8a2e74e">
        <img src="https://images.unsplash.com/photo-1603048335149-4fc0f8a2e74e" class="menu-img" alt="Stuffed Mushrooms">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Stuffed Mushrooms <span class="menu-rating">★ 4.6</span></h3>
            <p class="menu-description">Mushrooms stuffed with cheese and herbs.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹259</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>





<!-- Item A3 -->
<div class="col-md-4">
    <div class="menu-card" data-id="23" data-name="Nachos with Cheese" data-price="150" data-veg="true"
         data-img="https://images.unsplash.com/photo-1601924994987-69e6cda3f9f2">
        <img src="https://images.unsplash.com/photo-1601924994987-69e6cda3f9f2" class="menu-img" alt="Nachos with Cheese">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Nachos with Cheese <span class="menu-rating">★ 4.8</span></h3>
            <p class="menu-description">Loaded nachos topped with melted cheese and jalapeños.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹150</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item A6 -->
<div class="col-md-4">
    <div class="menu-card" data-id="26" data-name="Onion Rings" data-price="149" data-veg="true"
         data-img="https://images.unsplash.com/photo-1625940310816-17f65c1dcaf4">
        <img src="https://images.unsplash.com/photo-1625940310816-17f65c1dcaf4" class="menu-img" alt="Onion Rings">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Onion Rings <span class="menu-rating">★ 4.5</span></h3>
            <p class="menu-description">Crispy onion rings with ketchup dip.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹149</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item A7 -->
<div class="col-md-4">
    <div class="menu-card" data-id="27" data-name="Bruschetta" data-price="199" data-veg="true"
         data-img="https://images.unsplash.com/photo-1604908176839-7a4ab3e2f063">
        <img src="https://images.unsplash.com/photo-1604908176839-7a4ab3e2f063" class="menu-img" alt="Bruschetta">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Bruschetta <span class="menu-rating">★ 4.6</span></h3>
            <p class="menu-description">Toasted bread topped with fresh tomatoes and basil.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹199</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item A8 -->
<div class="col-md-4">
    <div class="menu-card" data-id="28" data-name="French Fries" data-price="199" data-veg="true"
         data-img="https://images.unsplash.com/photo-1576107232681-bd0d5b6b5c5a">
        <img src="https://images.unsplash.com/photo-1576107232681-bd0d5b6b5c5a" class="menu-img" alt="French Fries">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> French Fries <span class="menu-rating">★ 4.4</span></h3>
            <p class="menu-description">Classic crispy golden fries with seasoning.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹199</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item A9 -->
<div class="col-md-4">
    <div class="menu-card" data-id="29" data-name="Veg Pakora" data-price="299" data-veg="true"
         data-img="https://images.unsplash.com/photo-1617196039818-3a4f78df233c">
        <img src="https://images.unsplash.com/photo-1617196039818-3a4f78df233c" class="menu-img" alt="Veg Pakora">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Veg Pakora <span class="menu-rating">★ 4.7</span></h3>
            <p class="menu-description">Indian-style vegetable fritters with chutney.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹299</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item A10 -->
<div class="col-md-4">
    <div class="menu-card" data-id="30" data-name="Chicken Nuggets" data-price="349" data-veg="false"
         data-img="https://images.unsplash.com/photo-1586816001966-79d3b33f7a5b">
        <img src="https://images.unsplash.com/photo-1586816001966-79d3b33f7a5b" class="menu-img" alt="Chicken Nuggets">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-drumstick-bite non-veg-icon"></i> Chicken Nuggets <span class="menu-rating">★ 4.6</span></h3>
            <p class="menu-description">Juicy chicken nuggets with honey mustard dip.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹349</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>
</div>

<h2 class="category-title">🍝 Main Courses</h2>
<div class="row main-courses-category">  <!-- Added class here -->
    <!-- menu items -->

    <!-- Item 1 -->
    <div class="col-md-4">
        <div class="menu-card" 
             data-id="4"
             data-name="Creamy Pasta"
             data-price="160"
             data-veg="true"
             data-img="https://images.unsplash.com/photo-1546069901-ba9599a7e63c">
            <div class="position-relative">
                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c" class="menu-img" alt="Creamy Pasta">
                <span class="menu-badge text-white">Chef's Special</span>
            </div>
            <div class="menu-body">
                <h3 class="menu-title">
                    <i class="fas fa-leaf veg-icon"></i> Creamy Pasta
                    <span class="menu-rating">★ 4.9</span>
                </h3>
                <p class="menu-description">Penne pasta in a rich creamy sauce with mushrooms and herbs.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="menu-price">₹160</span>
                    <button class="add-to-cart btn btn-danger">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Item 2 -->
    <div class="col-md-4">
        <div class="menu-card" 
             data-id="5"
             data-name="Grilled Steak"
             data-veg="false"
             data-price="199"
             data-img="https://images.unsplash.com/photo-1504674900247-0877df9cc836">
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836" class="menu-img" alt="Grilled Steak">
            <div class="menu-body">
                <h3 class="menu-title">
                    <i class="fas fa-drumstick-bite non-veg-icon"></i> Grilled Steak
                    <span class="menu-rating">★ 4.7</span>
                </h3>
                <p class="menu-description">Juicy ribeye steak with roasted vegetables and mashed potatoes.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="menu-price">₹199</span>
                    <button class="add-to-cart btn btn-danger">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
                <!-- Item M1 -->
<div class="col-md-4">
    <div class="menu-card" data-id="31" data-name="Paneer Butter Masala" data-price="220" data-veg="true"
         data-img="https://images.unsplash.com/photo-1601050690597-df0568c635b6">
        <img src="https://images.unsplash.com/photo-1601050690597-df0568c635b6" class="menu-img" alt="Paneer Butter Masala">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Paneer Butter Masala <span class="menu-rating">★ 4.8</span></h3>
            <p class="menu-description">Soft paneer cooked in rich buttery tomato gravy.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹220</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item M2 -->
<div class="col-md-4">
    <div class="menu-card" data-id="32" data-name="Dal Tadka" data-price="160" data-veg="true"
         data-img="https://images.unsplash.com/photo-1603398938378-416bcb5a6c6e">
        <img src="https://images.unsplash.com/photo-1603398938378-416bcb5a6c6e" class="menu-img" alt="Dal Tadka">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Dal Tadka <span class="menu-rating">★ 4.6</span></h3>
            <p class="menu-description">Yellow dal tempered with garlic, cumin, and ghee.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹160</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item M3 -->
<div class="col-md-4">
    <div class="menu-card" data-id="33" data-name="Chole Bhature" data-price="180" data-veg="true"
         data-img="https://images.unsplash.com/photo-1617191518024-f79c6021144b">
        <img src="https://images.unsplash.com/photo-1617191518024-f79c6021144b" class="menu-img" alt="Chole Bhature">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Chole Bhature <span class="menu-rating">★ 4.9</span></h3>
            <p class="menu-description">Spicy chickpeas served with fluffy fried bhature.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹180</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item M4 -->
<div class="col-md-4">
    <div class="menu-card" data-id="34" data-name="Veg Biryani" data-price="200" data-veg="true"
         data-img="https://images.unsplash.com/photo-1623066649560-5c3fbb8e67e7">
        <img src="https://images.unsplash.com/photo-1623066649560-5c3fbb8e67e7" class="menu-img" alt="Veg Biryani">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Veg Biryani <span class="menu-rating">★ 4.7</span></h3>
            <p class="menu-description">Aromatic basmati rice with veggies and spices, served with raita.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹200</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item M5 -->
<div class="col-md-4">
    <div class="menu-card" data-id="35" data-name="Rajma Chawal" data-price="150" data-veg="true"
         data-img="https://images.unsplash.com/photo-1601329910405-9af78aa9015d">
        <img src="https://images.unsplash.com/photo-1601329910405-9af78aa9015d" class="menu-img" alt="Rajma Chawal">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Rajma Chawal <span class="menu-rating">★ 4.7</span></h3>
            <p class="menu-description">Red kidney beans curry with steamed rice – a Delhi classic.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹150</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item M6 -->
<div class="col-md-4">
    <div class="menu-card" data-id="36" data-name="Shahi Paneer" data-price="230" data-veg="true"
         data-img="https://images.unsplash.com/photo-1617196039835-6cbfb5a50d0d">
        <img src="https://images.unsplash.com/photo-1617196039835-6cbfb5a50d0d" class="menu-img" alt="Shahi Paneer">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Shahi Paneer <span class="menu-rating">★ 4.8</span></h3>
            <p class="menu-description">Royal Mughlai paneer curry with cashew & cream.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹230</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item M7 -->
<div class="col-md-4">
    <div class="menu-card" data-id="37" data-name="Masala Dosa" data-price="120" data-veg="true"
         data-img="https://images.unsplash.com/photo-1604909052842-4e02aebfdc86">
        <img src="https://images.unsplash.com/photo-1604909052842-4e02aebfdc86" class="menu-img" alt="Masala Dosa">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Masala Dosa <span class="menu-rating">★ 4.6</span></h3>
            <p class="menu-description">South Indian dosa stuffed with spicy potato masala.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹120</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item M8 -->
<div class="col-md-4">
    <div class="menu-card" data-id="38" data-name="Palak Paneer" data-price="210" data-veg="true"
         data-img="https://images.unsplash.com/photo-1634474208786-2df3fdf75f8e">
        <img src="https://images.unsplash.com/photo-1634474208786-2df3fdf75f8e" class="menu-img" alt="Palak Paneer">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Palak Paneer <span class="menu-rating">★ 4.7</span></h3>
            <p class="menu-description">Paneer cubes simmered in a smooth spinach curry.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹210</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item M9 -->
<div class="col-md-4">
    <div class="menu-card" data-id="39" data-name="Aloo Paratha" data-price="90" data-veg="true"
         data-img="https://images.unsplash.com/photo-1604754742629-3e486fbcd2c7">
        <img src="https://images.unsplash.com/photo-1604754742629-3e486fbcd2c7" class="menu-img" alt="Aloo Paratha">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Aloo Paratha <span class="menu-rating">★ 4.5</span></h3>
            <p class="menu-description">North Indian stuffed flatbread served with curd & pickle.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹90</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item M10 -->
<div class="col-md-4">
    <div class="menu-card" data-id="40" data-name="Veg Thali" data-price="250" data-veg="true"
         data-img="https://images.unsplash.com/photo-1606166325552-4f2f331b1a7f">
        <img src="https://images.unsplash.com/photo-1606166325552-4f2f331b1a7f" class="menu-img" alt="Veg Thali">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Veg Thali <span class="menu-rating">★ 4.9</span></h3>
            <p class="menu-description">A complete Indian meal with dal, sabzi, roti, rice & dessert.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹250</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>
    <!-- Item 3 -->
    <div class="col-md-4">
        <div class="menu-card" 
             data-id="6"
             data-name="Margherita Pizza"
             data-price="399"
             data-veg="false"
             data-img="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38">
            <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38" class="menu-img" alt="Margherita Pizza">
            <div class="menu-body">
                <h3 class="menu-title">
                    <i class="fas fa-drumstick-bite non-veg-icon"></i> Margherita Pizza
                    <span class="menu-rating">★ 4.6</span>
                </h3>
                <p class="menu-description">Classic pizza with tomato sauce, mozzarella, and basil.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="menu-price">₹399</span>
                    <button class="add-to-cart btn btn-danger">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>

      <!-- Desserts Section -->
<h2 class="category-title">🍰 Desserts</h2>
<div class="row desserts-category">  <!-- Added class here -->
    <!-- menu items -->

    <!-- Item 1 -->
    <div class="col-md-4">
        <div class="menu-card" 
             data-id="7"
             data-name="New York Cheesecake"
             data-price="179"
             data-veg="true"
             data-img="https://images.unsplash.com/photo-1563805042-7684c019e1cb">
            <div class="position-relative">
                <img src="https://images.unsplash.com/photo-1563805042-7684c019e1cb" class="menu-img" alt="New York Cheesecake">
                <span class="menu-badge text-white">Popular</span>
            </div>
            <div class="menu-body">
                <h3 class="menu-title">
                    <i class="fas fa-leaf veg-icon"></i> New York Cheesecake
                    <span class="menu-rating">★ 4.8</span>
                </h3>
                <p class="menu-description">Classic cheesecake with strawberry topping.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="menu-price">₹179</span>
                    <button class="add-to-cart btn btn-danger">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Item 2 -->
    <div class="col-md-4">
        <div class="menu-card" 
             data-id="8"
             data-name="French Toast"
             data-price="99"
             data-veg="true"
             data-img="https://images.unsplash.com/photo-1484723091739-30a097e8f929">
            <img src="https://images.unsplash.com/photo-1484723091739-30a097e8f929" class="menu-img" alt="French Toast">
            <div class="menu-body">
                <h3 class="menu-title">
                    <i class="fas fa-leaf veg-icon"></i> French Toast
                    <span class="menu-rating">★ 4.5</span>
                </h3>
                <p class="menu-description">Golden brown french toast with maple syrup and berries.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="menu-price">₹99</span>
                    <button class="add-to-cart btn btn-danger">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
                <!-- Item D1 -->
<div class="col-md-4">
    <div class="menu-card" data-id="41" data-name="Gulab Jamun" data-price="120" data-veg="true"
         data-img="https://images.unsplash.com/photo-1634141533648-6d5c18a09b6b">
        <img src="https://images.unsplash.com/photo-1634141533648-6d5c18a09b6b" class="menu-img" alt="Gulab Jamun">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Gulab Jamun <span class="menu-rating">★ 4.9</span></h3>
            <p class="menu-description">Soft khoya balls soaked in rose-flavored sugar syrup.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹120</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item D2 -->
<div class="col-md-4">
    <div class="menu-card" data-id="42" data-name="Rasgulla" data-price="110" data-veg="true"
         data-img="https://images.unsplash.com/photo-1603190281371-57426ddf44e6">
        <img src="https://images.unsplash.com/photo-1603190281371-57426ddf44e6" class="menu-img" alt="Rasgulla">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Rasgulla <span class="menu-rating">★ 4.8</span></h3>
            <p class="menu-description">Bengali delight – soft chenna balls in sugar syrup.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹110</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item D3 -->
<div class="col-md-4">
    <div class="menu-card" data-id="43" data-name="Kaju Katli" data-price="250" data-veg="true"
         data-img="https://images.unsplash.com/photo-1632127965553-3d39cda3979c">
        <img src="https://images.unsplash.com/photo-1632127965553-3d39cda3979c" class="menu-img" alt="Kaju Katli">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Kaju Katli <span class="menu-rating">★ 4.9</span></h3>
            <p class="menu-description">Classic cashew sweet with silver leaf garnish.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹250</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item D4 -->
<div class="col-md-4">
    <div class="menu-card" data-id="44" data-name="Jalebi" data-price="100" data-veg="true"
         data-img="https://images.unsplash.com/photo-1626082924907-21b1e2edbb99">
        <img src="https://images.unsplash.com/photo-1626082924907-21b1e2edbb99" class="menu-img" alt="Jalebi">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Jalebi <span class="menu-rating">★ 4.7</span></h3>
            <p class="menu-description">Crispy, golden jalebis soaked in saffron syrup.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹100</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item D5 -->
<div class="col-md-4">
    <div class="menu-card" data-id="45" data-name="Rasmalai" data-price="180" data-veg="true"
         data-img="https://images.unsplash.com/photo-1634141421022-73d2c8dbe528">
        <img src="https://images.unsplash.com/photo-1634141421022-73d2c8dbe528" class="menu-img" alt="Rasmalai">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Rasmalai <span class="menu-rating">★ 4.8</span></h3>
            <p class="menu-description">Soft rasgullas soaked in creamy saffron milk.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹180</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item D6 -->
<div class="col-md-4">
    <div class="menu-card" data-id="46" data-name="Besan Ladoo" data-price="150"  data-veg="true"
         data-img="https://images.unsplash.com/photo-1626082990044-51e8ef5d1eb6">
        <img src="https://images.unsplash.com/photo-1626082990044-51e8ef5d1eb6" class="menu-img" alt="Besan Ladoo">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Besan Ladoo <span class="menu-rating">★ 4.6</span></h3>
            <p class="menu-description">Traditional ladoos made with roasted gram flour and ghee.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹150</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item D7 -->
<div class="col-md-4">
    <div class="menu-card" data-id="47" data-name="Kulfi" data-price="120" data-veg="true"
         data-img="https://images.unsplash.com/photo-1626082923210-278ade41b1a7">
        <img src="https://images.unsplash.com/photo-1626082923210-278ade41b1a7" class="menu-img" alt="Kulfi">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Kulfi <span class="menu-rating">★ 4.7</span></h3>
            <p class="menu-description">Creamy traditional Indian ice cream with cardamom & pistachio.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹120</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item D8 -->
<div class="col-md-4">
    <div class="menu-card" data-id="48" data-name="Malpua" data-price="140" data-veg="true"
         data-img="https://images.unsplash.com/photo-1635931744031-52a8d92c16f1">
        <img src="https://images.unsplash.com/photo-1635931744031-52a8d92c16f1" class="menu-img" alt="Malpua">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Malpua <span class="menu-rating">★ 4.6</span></h3>
            <p class="menu-description">Sweet pancakes dipped in sugar syrup, topped with rabri.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹140</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item D9 -->
<div class="col-md-4">
    <div class="menu-card" data-id="49" data-name="Sandesh" data-price="160" data-veg="true"
         data-img="https://images.unsplash.com/photo-1634141422080-4cfb5ef76e5f">
        <img src="https://images.unsplash.com/photo-1634141422080-4cfb5ef76e5f" class="menu-img" alt="Sandesh">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Sandesh <span class="menu-rating">★ 4.7</span></h3>
            <p class="menu-description">Delicate Bengali sweet made from chenna and sugar.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹160</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item D10 -->
<div class="col-md-4">
    <div class="menu-card" data-id="50" data-name="Gajar Ka Halwa" data-price="170"     data-veg="true"
         data-img="https://images.unsplash.com/photo-1617191517461-68cfa2e3d1b2">
        <img src="https://images.unsplash.com/photo-1617191517461-68cfa2e3d1b2" class="menu-img" alt="Gajar Ka Halwa">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Gajar Ka Halwa <span class="menu-rating">★ 4.9</span></h3>
            <p class="menu-description">Slow-cooked carrot halwa with milk, ghee & dry fruits.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹170</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>
    <!-- Item 3 -->
    <div class="col-md-4">
        <div class="menu-card" 
             data-id="9"
             data-name="Artisan Ice Cream"
             data-price="149"
             data-veg="true"
             data-img="https://images.unsplash.com/photo-1551024506-0bccd828d307">
            <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307" class="menu-img" alt="Artisan Ice Cream">
            <div class="menu-body">
                <h3 class="menu-title">
                    <i class="fas fa-leaf veg-icon"></i> Artisan Ice Cream
                    <span class="menu-rating">★ 4.7</span>
                </h3>
                <p class="menu-description">Handcrafted ice cream with your choice of toppings.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="menu-price">₹149</span>
                    <button class="add-to-cart btn btn-danger">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>

        
       <!-- Drinks Section -->
<h2 class="category-title">🥤 Drinks</h2>
<div class="row drinks-category">  <!-- Added class here -->
    <!-- menu items -->

    <!-- Item 1 -->
    <div class="col-md-4">
        <div class="menu-card" 
             data-id="10"
             data-name="Fresh Lemonade"
             data-price="99"
             data-veg="true"
             data-img="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd">
            <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd" class="menu-img" alt="Fresh Lemonade">
            <div class="menu-body">
                <h3 class="menu-title">
                    <i class="fas fa-leaf veg-icon"></i> Fresh Lemonade
                    <span class="menu-rating">★ 4.6</span>
                </h3>
                <p class="menu-description">Homemade lemonade with mint and honey.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="menu-price">₹99</span>
                    <button class="add-to-cart btn btn-danger">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Item 2 -->
    <div class="col-md-4">
        <div class="menu-card" 
             data-id="11"
             data-name="Iced Coffee"
             data-price="129"
             data-veg="true"
             data-img="https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5">
            <img src="https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5" class="menu-img" alt="Iced Coffee">
            <div class="menu-body">
                <h3 class="menu-title">
                    <i class="fas fa-leaf veg-icon"></i> Iced Coffee
                    <span class="menu-rating">★ 4.4</span>
                </h3>
                <p class="menu-description">Cold brew coffee with milk and caramel syrup.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="menu-price">₹129</span>
                    <button class="add-to-cart btn btn-danger">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
                <!-- Item DR1 -->
<div class="col-md-4">
    <div class="menu-card" data-id="51" data-name="Masala Chai" data-price="50" data-veg="true"
         data-img="https://images.unsplash.com/photo-1590080871873-51e6c1f1d9e8">
        <img src="https://images.unsplash.com/photo-1590080871873-51e6c1f1d9e8" class="menu-img" alt="Masala Chai">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Masala Chai <span class="menu-rating">★ 4.9</span></h3>
            <p class="menu-description">Classic Indian spiced tea brewed with milk and cardamom.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹50</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item DR2 -->
<div class="col-md-4">
    <div class="menu-card" data-id="52" data-name="Lassi" data-price="60" data-veg="true"
         data-img="https://images.unsplash.com/photo-1589713501943-bc9e3a1f76f3">
        <img src="https://images.unsplash.com/photo-1589713501943-bc9e3a1f76f3" class="menu-img" alt="Lassi">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Lassi <span class="menu-rating">★ 4.8</span></h3>
            <p class="menu-description">Refreshing yogurt-based drink, sweet or salted.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹60</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item DR3 -->
<div class="col-md-4">
    <div class="menu-card" data-id="53" data-name="Chaas" data-price="40" data-veg="true"
         data-img="https://images.unsplash.com/photo-1627886106605-5ee8a2aaaf4c">
        <img src="https://images.unsplash.com/photo-1627886106605-5ee8a2aaaf4c" class="menu-img" alt="Chaas">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Chaas <span class="menu-rating">★ 4.7</span></h3>
            <p class="menu-description">Spiced buttermilk drink, perfect for summers.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹40</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item DR4 -->
<div class="col-md-4">
    <div class="menu-card" data-id="54" data-name="Thandai" data-price="70"  data-veg="true"
         data-img="https://images.unsplash.com/photo-1617190981028-f7b6f8326e32">
        <img src="https://images.unsplash.com/photo-1617190981028-f7b6f8326e32" class="menu-img" alt="Thandai">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Thandai <span class="menu-rating">★ 4.8</span></h3>
            <p class="menu-description">Traditional cold milk drink with nuts, saffron & spices.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹70</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item DR5 -->
<div class="col-md-4">
    <div class="menu-card" data-id="55" data-name="Jal Jeera" data-price="50" data-veg="true"
         data-img="https://images.unsplash.com/photo-1617190985032-0d7d1e5c4c4a">
        <img src="https://images.unsplash.com/photo-1617190985032-0d7d1e5c4c4a" class="menu-img" alt="Jal Jeera">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Jal Jeera <span class="menu-rating">★ 4.6</span></h3>
            <p class="menu-description">Tangy cumin-flavored Indian drink, served chilled.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹50</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item DR6 -->
<div class="col-md-4">
    <div class="menu-card" data-id="56" data-name="Badam Milk" data-price="80" data-veg="true"
         data-img="https://images.unsplash.com/photo-1606357015337-d10c0468f38b">
        <img src="https://images.unsplash.com/photo-1606357015337-d10c0468f38b" class="menu-img" alt="Badam Milk">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Badam Milk <span class="menu-rating">★ 4.9</span></h3>
            <p class="menu-description">Warm almond-flavored milk drink with saffron and cardamom.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹80</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item DR7 -->
<div class="col-md-4">
    <div class="menu-card" data-id="57" data-name="Filter Coffee" data-price="60" data-veg="true"
         data-img="https://images.unsplash.com/photo-1606813903595-f4fa46948bb3">
        <img src="https://images.unsplash.com/photo-1606813903595-f4fa46948bb3" class="menu-img" alt="Filter Coffee">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Filter Coffee <span class="menu-rating">★ 4.8</span></h3>
            <p class="menu-description">South Indian strong coffee brewed with fresh milk.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹60</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item DR8 -->
<div class="col-md-4">
    <div class="menu-card" data-id="58" data-name="Nimbu Pani" data-price="40" data-veg="true"
         data-img="https://images.unsplash.com/photo-1617190981042-6b24d5a06a99">
        <img src="https://images.unsplash.com/photo-1617190981042-6b24d5a06a99" class="menu-img" alt="Nimbu Pani">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Nimbu Pani <span class="menu-rating">★ 4.7</span></h3>
            <p class="menu-description">Freshly squeezed Indian lemonade with mint and sugar.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹40</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item DR9 -->
<div class="col-md-4">
    <div class="menu-card" data-id="59" data-name="Rose Milk" data-price="50" data-veg="true"
         data-img="https://images.unsplash.com/photo-1617190981055-5a3a1d4c6d58">
        <img src="https://images.unsplash.com/photo-1617190981055-5a3a1d4c6d58" class="menu-img" alt="Rose Milk">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Rose Milk <span class="menu-rating">★ 4.6</span></h3>
            <p class="menu-description">Chilled sweet milk flavored with rose syrup and cardamom.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹50</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Item DR10 -->
<div class="col-md-4">
    <div class="menu-card" data-id="60" data-name="Aam Panna" data-price="60" data-veg="true"
         data-img="https://images.unsplash.com/photo-1617190981063-3e2b1fbd5f55">
        <img src="https://images.unsplash.com/photo-1617190981063-3e2b1fbd5f55" class="menu-img" alt="Aam Panna">
        <div class="menu-body">
            <h3 class="menu-title"><i class="fas fa-leaf veg-icon"></i> Aam Panna <span class="menu-rating">★ 4.8</span></h3>
            <p class="menu-description">Refreshing raw mango drink with roasted cumin and mint.</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="menu-price">₹60</span>
                <button class="add-to-cart btn btn-danger">Add to Cart</button>
            </div>
        </div>
    </div>
</div>
    <!-- Item 3 -->
    <div class="col-md-4">
        <div class="menu-card" 
             data-id="12"
             data-name="Berry Smoothie"
             data-price="149"
             data-veg="true"
             data-img="https://images.unsplash.com/photo-1551024506-0bccd828d307">
            <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307" class="menu-img" alt="Berry Smoothie">
            <div class="menu-body">
                <h3 class="menu-title">
                    <i class="fas fa-leaf veg-icon"></i> Berry Smoothie
                    <span class="menu-rating">★ 4.5</span>
                </h3>
                <p class="menu-description">Mixed berry smoothie with yogurt and honey.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="menu-price">₹149</span>
                    <button class="add-to-cart btn btn-danger">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>

              <!-- CART MODAL -->
<div class="modal fade" id="cartModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title">🛒 Your Cart</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="cart-items"></div>
      <div class="modal-footer">
        <h5 id="cart-total" class="me-auto">Total: ₹0.00</h5>
<a href="checkout.php" class="btn btn-success">Checkout</a>
      </div>
    </div>
  </div>
</div>

    <!-- Footer (same as home page) -->
    <footer class="footer text-white bg-black pt-4 pb-2 mt-5">
        <div class="container text-center text-md-start">
            <div class="row">
                <!-- Logo and Description -->
                <div class="col-md-4 mb-3">
                    <h5 class="glowbox" class="fw-bold" style="color: rgb(255, 200, 0); font-size: 30px;">🍽️ Foodogram</h5>
                    <p>
                        Your go-to destination for fresh, fast & delicious food delivered
                        at your door.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-4 mb-3">
                    <h6 class="fw-bold" style="color: yellow;">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li>
                            <a href="about.php" class="text-white text-decoration-none"
                            >About Us</a
                            >
                        </li>
                        <li>
                            <a href="menu.php" class="text-white text-decoration-none"
                            >Menu</a
                            >
                        </li>
                        <li>
                            <a href="profile.php" class="text-white text-decoration-none"
                            >Profile</a
                            >
                        </li>
                        <li>
                            <a href="contact.php" class="text-white text-decoration-none"
                            >Contact</a
                            >
                        </li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div class="col-md-4 mb-3">
                    <h6 style="color: yellow;"class="fw-bold">Follow Us</h6>
                    <a href="#" class="text-white me-3"
                    ><i class="fab fa-facebook fa-lg"></i
                    ></a>
                    <a href="#" class="text-white me-3"
                    ><i class="fab fa-instagram fa-lg"></i
                    ></a>
                    <a href="#" class="text-white me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512" fill="currentColor" style="vertical-align: middle;">
                            <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-white"
                    ><i class="fab fa-youtube fa-lg"></i
                    ></a>
                </div>
            </div>
            <hr class="border-secondary" />
            <div style="color: yellow;"class="text-center small">
                &copy; 2025 Foodogram. All rights reserved.
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        

       

let cart = JSON.parse(localStorage.getItem('cart')) || [];

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function renderCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    cartItemsContainer.innerHTML = '';
    let total = 0;

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p class="text-center p-3">Your cart is empty.</p>';
        cartTotal.textContent = 'Total: ₹0.00';
        return;
    }

    cart.forEach(item => {
        // Extract numeric value from price (remove ₹ symbol)
        const priceValue = parseFloat(item.price);

        total += priceValue * item.qty;
        
        cartItemsContainer.innerHTML += `
            <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                <div class="d-flex align-items-center">
                    <img src="${item.img}" width="50" height="50" class="me-2 rounded" style="object-fit: cover;">
                    <div>
                        <strong>${item.name}</strong><br>
                        <small>₹${priceValue.toFixed(2)} × ${item.qty}</small>
                    </div>
                </div>
                <div>
                    <button class="btn btn-sm btn-warning me-2" onclick="changeQty('${item.id}', -1)">-</button>
                    ${item.qty}
                    <button class="btn btn-sm btn-success ms-2" onclick="changeQty('${item.id}', 1)">+</button>
                    <button class="btn btn-sm btn-danger ms-3" onclick="removeItem('${item.id}')">Remove</button>
                </div>
            </div>
        `;
    });

    cartTotal.textContent = 'Total: ₹' + total.toFixed(2);
}


function changeQty(id, delta) {
    const item = cart.find(it => it.id === id);
    if (!item) return;
    item.qty += delta;
    if (item.qty <= 0) {
        cart = cart.filter(it => it.id !== id);
    }
    saveCart();
    renderCart();
}

function removeItem(id) {
    cart = cart.filter(item => item.id !== id);
    saveCart();
    renderCart();
}

function showCartToast(itemName) {
    // Remove any existing toast first to prevent duplicates
    const existingToast = document.querySelector('.cart-toast');
    if (existingToast) existingToast.remove();

    // Create toast element
    const toast = document.createElement('div');
    toast.className = 'cart-toast';
    toast.innerHTML = `
        <span>✅ ${itemName} added to cart!</span>
        <a href="#" data-bs-toggle="modal" data-bs-target="#cartModal">View Cart</a>
    `;

    // Append to body
    document.body.appendChild(toast);

    // Show it with CSS animation
    setTimeout(() => toast.classList.add('show'), 50);

    // Remove after 3 seconds
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Initialize cart functionality
document.addEventListener('DOMContentLoaded', function() {
    renderCart();
    
    // Add event listeners to all add-to-cart buttons
    document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.addEventListener('click', function() {
            const card = this.closest('.menu-card');
            const id = card.dataset.id;
            const name = card.dataset.name;
            const price = card.dataset.price;
            const img = card.dataset.img;

            const existing = cart.find(item => item.id === id);
            if (existing) {
                existing.qty++;
            } else {
                cart.push({ id, name, price, img, qty: 1 });
            }
            saveCart();
            renderCart();
            showCartToast(name);
        });
    });
});
function filterItems(filter) {
    const allCards = document.querySelectorAll('.menu-card');
    
    allCards.forEach(card => {
        const isVeg = card.dataset.veg === "true";
        const isBestseller = card.dataset.bestseller === "true";
        const isChefSpecial = card.dataset.chefspecial === "true";
        
        if (filter === 'all') {
            card.classList.remove('hidden');
        } 
        else if (filter === 'veg') {
            card.classList.toggle('hidden', !isVeg);
        } 
        else if (filter === 'non-veg') {
            card.classList.toggle('hidden', isVeg);
        } 
        else if (filter === 'bestseller') {
            card.classList.toggle('hidden', !isBestseller);
        } 
        else if (filter === 'chef-special') {
            card.classList.toggle('hidden', !isChefSpecial);
        }
    });
}

function sortItems(sortBy) {
    const categories = ['appetizers', 'main-courses', 'desserts', 'drinks'];
    
    categories.forEach(category => {
        const categoryContainer = document.querySelector(`.${category}-category`);
        if (!categoryContainer) return;
        
        const cards = Array.from(categoryContainer.querySelectorAll('.menu-card:not(.hidden)'));
        
        cards.sort((a, b) => {
            if (sortBy === 'price-asc') {
                return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
            } else if (sortBy === 'price-desc') {
                return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
            } else if (sortBy === 'rating') {
                return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
            } else if (sortBy === 'name') {
                return a.dataset.name.localeCompare(b.dataset.name);
            }
            return 0;
        });
        
        // Remove and re-add sorted cards
        cards.forEach(card => card.remove());
        cards.forEach(card => categoryContainer.appendChild(card));
    });
}
// Filter button functionality
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        const filter = this.dataset.filter;
        filterItems(filter);
        
        // Re-apply sorting after filtering
        const sortBy = document.getElementById('sortSelect').value;
        sortItems(sortBy);
    });
});

// Sort select functionality
document.getElementById('sortSelect').addEventListener('change', function() {
    const sortBy = this.value;
    sortItems(sortBy);
});

document.addEventListener('DOMContentLoaded', renderCart);
</script>



    
</body>
</html>