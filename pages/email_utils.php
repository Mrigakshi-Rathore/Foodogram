<?php
// Email utility functions for Foodogram

function sendStatusUpdateEmail($to_email, $order_id, $new_status) {
    $subject = "Foodogram Order Status Update - Order #$order_id";

    $status_messages = [
        'Placed' => 'Your order has been placed successfully and is being processed.',
        'Preparing' => 'Our chefs are now preparing your delicious meal.',
        'Ready for Delivery' => 'Your order is ready and waiting for pickup by our delivery partner.',
        'Out for Delivery' => 'Your order is on the way! Our delivery partner will reach you soon.',
        'Delivered' => 'Your order has been delivered successfully. Enjoy your meal!'
    ];

    $message = "
    <html>
    <head>
        <title>Order Status Update</title>
        <style>
            body { font-family: Arial, sans-serif; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(135deg, #ff6b6b, #ffa726); color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; background: #f9f9f9; }
            .status { font-size: 18px; font-weight: bold; color: #ff6b6b; }
            .footer { text-align: center; padding: 20px; color: #666; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>🍽️ Foodogram</h1>
                <p>Order Status Update</p>
            </div>
            <div class='content'>
                <h2>Hello!</h2>
                <p>Your order #$order_id status has been updated.</p>
                <p class='status'>Current Status: $new_status</p>
                <p>" . ($status_messages[$new_status] ?? 'Status updated.') . "</p>
                <p>You can track your order in real-time at: <a href='" . $_SERVER['HTTP_HOST'] . "/pages/track_order.php?order_id=$order_id'>Track Order</a></p>
                <p>Thank you for choosing Foodogram!</p>
            </div>
            <div class='footer'>
                <p>&copy; " . date('Y') . " Foodogram. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Foodogram <noreply@foodogram.com>" . "\r\n";

    // Send email
    return mail($to_email, $subject, $message, $headers);
}

function sendOrderConfirmationEmail($to_email, $order_id, $order_details) {
    $subject = "Foodogram Order Confirmation - Order #$order_id";

    $message = "
    <html>
    <head>
        <title>Order Confirmation</title>
        <style>
            body { font-family: Arial, sans-serif; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(135deg, #ff6b6b, #ffa726); color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; background: #f9f9f9; }
            .order-details { background: white; padding: 15px; margin: 10px 0; border-radius: 5px; }
            .footer { text-align: center; padding: 20px; color: #666; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>🍽️ Foodogram</h1>
                <p>Order Confirmation</p>
            </div>
            <div class='content'>
                <h2>Thank you for your order!</h2>
                <p>Your order #$order_id has been placed successfully.</p>
                <div class='order-details'>
                    <h3>Order Details:</h3>
                    $order_details
                </div>
                <p>You can track your order in real-time at: <a href='" . $_SERVER['HTTP_HOST'] . "/pages/track_order.php?order_id=$order_id'>Track Order</a></p>
                <p>We'll send you updates as your order progresses.</p>
            </div>
            <div class='footer'>
                <p>&copy; " . date('Y') . " Foodogram. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Foodogram <noreply@foodogram.com>" . "\r\n";

    return mail($to_email, $subject, $message, $headers);
}
?>
