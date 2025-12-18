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
    <style>
        body {
            background-color: #f8f9fa;
        }
        .search-results {
            margin-top: 30px;
        }
        .food-card {
            transition: transform 0.3s;
        }
        .food-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <!-- Include your header (same as index.php) -->
    <?php include 'header.php'; ?>

    <div class="container search-results">
        <h2 class="mb-4">Search Results for "<?php echo htmlspecialchars($_GET['q'] ?? ''); ?>"</h2>
        
        <?php
        // Sample food items data (replace with your database)
        $foodItems = [
            ['name' => 'Pizza Margherita', 'price' => '$12.99', 'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38'],
            ['name' => 'Burger', 'price' => '$8.99', 'image' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd'],
            ['name' => 'Pasta', 'price' => '$10.99', 'image' => 'https://images.unsplash.com/photo-1473093295043-cdd812d0e601'],
            ['name' => 'Salad', 'price' => '$7.99', 'image' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd']
        ];
        
        $searchQuery = strtolower($_GET['q'] ?? '');
        $results = [];
        
        if (!empty($searchQuery)) {
            foreach ($foodItems as $item) {
                if (strpos(strtolower($item['name']), $searchQuery) !== false) {
                    $results[] = $item;
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
                    <div class="col-md-3 mb-4">
                        <div class="card food-card shadow">
                            <img src="<?php echo $item['image']; ?>?w=300&h=200&fit=crop" class="card-img-top" alt="<?php echo $item['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item['name']; ?></h5>
                                <p class="card-text text-danger fw-bold"><?php echo $item['price']; ?></p>
                                <button class="btn btn-danger btn-sm">Add to Cart</button>
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
</body>
</html>