<?php
// If you have a standard header, you can include it here.
// include 'includes/header.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon | Foodogram</title>
    <style>
        /* Simple, contained styles just for this page */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f189ffe9; /* Warm, food-friendly off-white */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            text-align: center;
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 90%;
        }

        .icon {
            font-size: 80px;
            margin-bottom: 20px;
            animation: bounce 2s infinite;
        }

        h1 {
            color: #ff6b6b; /* A nice appetizing red/orange */
            margin-bottom: 10px;
            font-size: 2rem;
        }

        p {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .btn-home {
            display: inline-block;
            background-color: #ff6b6b;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            transition: transform 0.2s, background-color 0.2s;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }

        .btn-home:hover {
            background-color: #ff5252;
            transform: translateY(-2px);
        }

        /* Fun little bouncing animation for the emoji */
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-20px);}
            60% {transform: translateY(-10px);}
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="icon">🍳</div>
        
        <h1>We're Still Cooking This Up!</h1>
        
        <p>
            The chef is working hard on this feature.<br>
            It's currently marinating and will be served piping hot very soon.
        </p>
        
        <a href="index.php" class="btn-home">Go Back to Home</a>
    </div>

</body>
</html>

<?php
// If you have a standard footer, include it here.
// include 'includes/footer.php'; 
?>