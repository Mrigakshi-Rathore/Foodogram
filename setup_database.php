<?php
include 'db_connect.php';

try {
    // Create dishes table
    $sql = "CREATE TABLE IF NOT EXISTS dishes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        cuisine VARCHAR(50) NOT NULL,
        dietary_preference ENUM('Veg', 'Non-Veg') NOT NULL,
        image_url VARCHAR(500) NOT NULL,
        description TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $conn->exec($sql);
    echo "✅ Dishes table created successfully!<br>";

    // Insert sample data
    $sampleDishes = [
        ['Pizza Margherita', 12.99, 'Italian', 'Veg', 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=300&h=200&fit=crop', 'Classic Italian pizza with tomato sauce, mozzarella, and basil.'],
        ['Chicken Burger', 8.99, 'American', 'Non-Veg', 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=300&h=200&fit=crop', 'Juicy chicken burger with lettuce, tomato, and mayo.'],
        ['Pasta Carbonara', 10.99, 'Italian', 'Non-Veg', 'https://images.unsplash.com/photo-1473093295043-cdd812d0e601?w=300&h=200&fit=crop', 'Creamy pasta with bacon, eggs, and parmesan.'],
        ['Caesar Salad', 7.99, 'American', 'Veg', 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=300&h=200&fit=crop', 'Fresh romaine lettuce with Caesar dressing and croutons.'],
        ['Butter Chicken', 14.99, 'Indian', 'Non-Veg', 'https://images.unsplash.com/photo-1588168333986-5078d3ae3976?w=300&h=200&fit=crop', 'Rich and creamy Indian curry with tender chicken.'],
        ['Paneer Tikka', 11.99, 'Indian', 'Veg', 'https://images.unsplash.com/photo-1567188040759-fb8a883dc6d8?w=300&h=200&fit=crop', 'Marinated paneer cubes grilled to perfection.'],
        ['Sweet and Sour Pork', 13.99, 'Chinese', 'Non-Veg', 'https://images.unsplash.com/photo-1563379091339-03246963d4ad?w=300&h=200&fit=crop', 'Crispy pork with sweet and sour sauce.'],
        ['Vegetable Fried Rice', 9.99, 'Chinese', 'Veg', 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?w=300&h=200&fit=crop', 'Rice stir-fried with mixed vegetables and soy sauce.'],
        ['Tacos', 8.49, 'Mexican', 'Non-Veg', 'https://images.unsplash.com/photo-1565299507177-b0ac66763828?w=300&h=200&fit=crop', 'Soft tortillas filled with seasoned meat and toppings.'],
        ['Guacamole Bowl', 6.99, 'Mexican', 'Veg', 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=300&h=200&fit=crop', 'Fresh avocado dip with chips.'],
        ['Sushi Rolls', 15.99, 'Japanese', 'Non-Veg', 'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?w=300&h=200&fit=crop', 'Assortment of fresh sushi rolls.'],
        ['Tempura Vegetables', 10.49, 'Japanese', 'Veg', 'https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=300&h=200&fit=crop', 'Lightly battered and fried seasonal vegetables.'],
        ['Pad Thai', 12.49, 'Thai', 'Non-Veg', 'https://images.unsplash.com/photo-1559314809-0d155014e29e?w=300&h=200&fit=crop', 'Stir-fried noodles with shrimp, tofu, and peanuts.'],
        ['Green Curry', 11.49, 'Thai', 'Veg', 'https://images.unsplash.com/photo-1455619452474-d2be8b1e70cd?w=300&h=200&fit=crop', 'Spicy Thai curry with coconut milk and vegetables.']
    ];

    $stmt = $conn->prepare("INSERT INTO dishes (name, price, cuisine, dietary_preference, image_url, description) VALUES (?, ?, ?, ?, ?, ?)");
    foreach ($sampleDishes as $dish) {
        $stmt->execute($dish);
    }
    echo "✅ Sample dishes inserted successfully!<br>";

} catch(PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
