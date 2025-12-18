<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Foodogram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        body {
            background-image: url("../bgImg.jpeg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
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
        .search-results {
            margin-top: 30px;
            color: white;
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
        }
        .menu-card:hover {
            transform: translateY(-20px);
            box-shadow: 10px 10px 20px rgba(0,0,0,0.3);
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
        .menu-rating {
            color: #ffc107;
            margin-left: 0.5rem;
        }
        .cart-toast {
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
    </style>
</head>
<body>
    <!-- Include your header (same as index.php) -->
    <?php include 'header.php'; ?>

    <div class="container search-results">
        <h2 class="mb-4">Search Results for "<?php echo htmlspecialchars($_GET['q'] ?? ''); ?>"</h2>
        
        <?php
        include 'menu_data.php';

        $searchQuery = strtolower($_GET['q'] ?? '');
        $results = [];

        if (!empty($searchQuery)) {
            foreach ($menuData as $category => $items) {
                foreach ($items as $item) {
                    if (strpos(strtolower($item['name']), $searchQuery) !== false ||
                        strpos(strtolower($item['description']), $searchQuery) !== false) {
                        $results[] = $item;
                    }
                }
            }
        }
        ?>
        
        <?php if (empty($searchQuery)): ?>
            <div class="alert alert-warning">Please enter a search term.</div>
        <?php elseif (empty($results)): ?>
            <div class="alert alert-info">No results found for "<?php echo htmlspecialchars($searchQuery); ?>".</div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($results as $item): ?>
                    <div class="col-md-4 mb-4">
                        <div class="menu-card" style="background: rgba(206, 27, 27, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 15px; overflow: hidden; margin-bottom: 1.5rem; transition: transform 0.3s ease; color: white;">
                            <img src="<?php echo $item['image']; ?>" class="menu-img" alt="<?php echo $item['name']; ?>" style="height: 200px; object-fit: cover; width: 100%;">
                            <div class="menu-body" style="padding: 1.5rem;">
                                <h3 class="menu-title" style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #ffffff;">
                                    <i class="fas fa-<?php echo $item['veg'] ? 'leaf' : 'drumstick-bite'; ?> <?php echo $item['veg'] ? 'veg-icon' : 'non-veg-icon'; ?>" style="color: <?php echo $item['veg'] ? 'green' : 'red'; ?>; font-size: 1.2rem; margin-right: 0.5rem;"></i>
                                    <?php echo $item['name']; ?>
                                    <span class="menu-rating" style="color: #ffc107; margin-left: 0.5rem;">★ <?php echo $item['rating']; ?></span>
                                </h3>
                                <p class="menu-description" style="margin: 1rem 0; color: #e0e0e0;"><?php echo $item['description']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="menu-price" style="font-size: 1.3rem; color: #ff6b6b; font-weight: bold;">₹<?php echo $item['price']; ?></span>
                                    <button class="add-to-cart btn btn-danger" data-id="<?php echo $item['id']; ?>" data-name="<?php echo $item['name']; ?>" data-price="<?php echo $item['price']; ?>" data-img="<?php echo $item['image']; ?>">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <!-- Back to Home -->
        <div class="text-center mt-4">
            <a href="../index.php" class="btn btn-outline-secondary">Back to Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        function saveCart() {
            localStorage.setItem('cart', JSON.stringify(cart));
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
                <a href="cart.php">View Cart</a>
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
            // Add event listeners to all add-to-cart buttons
            document.querySelectorAll('.add-to-cart').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const name = this.dataset.name;
                    const price = this.dataset.price;
                    const img = this.dataset.img;

                    const existing = cart.find(item => item.id === id);
                    if (existing) {
                        existing.qty++;
                    } else {
                        cart.push({ id, name, price, img, qty: 1 });
                    }
                    saveCart();
                    showCartToast(name);
                });
            });
        });
    </script>
</body>
</html>
