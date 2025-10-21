<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>FAQs - Foodogram</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  
  <style>
    .ans {
      background-color: #fcd8fa;
      color: #730279;
      font-size: 22px;
    }
    #thanks {
      font-size: 30px;
    }
    .accordion {
      box-shadow: 3px 4px 4px rgba(0, 0, 0, 0.1);
    }
    body {
      background-color: #e3f3f9;
      font-family: "Segoe UI, sans-serif";
    }
    .faq-header {
      color: #2c4770;
    }
    .accordion-button {
      font-weight: 500;
    }
    .accordion-button:focus {
      box-shadow: none;
    }
    #txtshadow {
      font-size: 50px;
      text-shadow: 1px 2px 2px;
    }
    .same {
      font-size: 25px;
    }
    .footer {
      background: linear-gradient(to right, #000000, #1a1a1a, #000000);
      color: white;
      padding: 2rem 1rem 1rem;
      font-size: 16px;
    }
    .footer a {
      color: #fff;
      text-decoration: none;
    }
    .footer a:hover {
      text-decoration: underline;
    }
    header {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(8px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    #logo {
      height: 125px;
      width: 125px;
      margin-left: 20px;
      border-radius: 50%;
    }
    button i {
      font-size: 3rem;
      padding: 4px;
      color: white;
    }
  </style>
</head>
<body>

  <!-- Offcanvas Menu -->
  <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="darkMenu">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Explore</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="about.php">About Us</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="profile.php">Profile</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="rating.php">Rate Us</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="settings.php">Settings</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="help.php">Help / Contact</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="terms.php">Terms and Conditions</a></li>
      </ul>
    </div>
  </div>

  <!-- Header -->
  <header class="d-flex align-items-center justify-content-between px-3 py-2 bg-black">
    <div class="d-flex align-items-center gap-3">
      <button class="btn btn-sm btn-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#darkMenu">
        <i class="fas fa-bars"></i>
      </button>
      <img id="logo" src="images/logo.jpg" alt="Logo" />

      <!-- Fixed Search Bar -->
<!-- Fixed Search Bar -->
<form class="d-flex align-items-center header-search-form" action="search.php" method="GET">
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

      <div class="input-group" style="max-width: 200px;">
        <span class="input-group-text bg-danger text-white"><i class="fas fa-map-marker-alt"></i></span>
        <select class="form-select" id="locationSelect">
          <option selected disabled>Select Location</option>
          <option value="jaipur">Jaipur</option>
          <option value="delhi">Delhi</option>
          <option value="mumbai">Mumbai</option>
          <option value="bangalore">Bangalore</option>
        </select>
      </div>
    </div>

    <div class="d-flex gap-2">
      <a href="menu.php" class="btn btn-danger">Menu</a>
      <a href="cart.php" class="btn btn-danger">Cart</a>
      <a href="login.php" class="btn btn-danger">Login</a>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container py-5">
    <h2 class="text-center faq-header mb-4" id="txtshadow">
      Frequently Asked Questions
    </h2>
    <h4 class="text-center mb-5">
      Your questions, answered. Quick and tasty just like your orders 🍔
    </h4>
    
    <!-- accordion - to show and hide content -->
    <div class="accordion" id="faqAccordion">
      <!-- Order: How to place -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="orderOne">
          <button
            class="same accordion-button"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#orderCollapseOne"
            aria-expanded="true"
            aria-controls="orderCollapseOne"
          >
            🛒 How do I place an order on Foodogram?
          </button>
        </h2>
        <div
          id="orderCollapseOne"
          class="ans accordion-collapse collapse show"
          aria-labelledby="orderOne"
          data-bs-parent="#faqAccordion"
        >
          <div class="ans accordion-body">
            <i class="fa fa-arrow"></i>Simply select your favorite restaurant,
            browse the menu, add items to your cart, and hit the checkout
            button. That's it!
          </div>
        </div>
      </div>
      
      <!-- Payment methods -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="paymentOne">
          <button
            class="same accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#paymentCollapseOne"
            aria-expanded="false"
            aria-controls="paymentCollapseOne"
          >
            💳 What payment methods do you accept?
          </button>
        </h2>
        <div
          id="paymentCollapseOne"
          class="same accordion-collapse collapse"
          aria-labelledby="paymentOne"
          data-bs-parent="#faqAccordion"
        >
          <div class="ans accordion-body">
            We accept credit/debit cards, UPI, net banking, and digital
            wallets like Paytm and PhonePe.
          </div>
        </div>
      </div>

      <!-- Delivery time -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="deliveryOne">
          <button
            class="same accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#deliveryCollapseOne"
            aria-expanded="false"
            aria-controls="deliveryCollapseOne"
          >
            🚚 How long does delivery take?
          </button>
        </h2>
        <div
          id="deliveryCollapseOne"
          class="accordion-collapse collapse"
          aria-labelledby="deliveryOne"
          data-bs-parent="#faqAccordion"
        >
          <div class="ans accordion-body">
            Delivery time usually ranges from 30–45 minutes depending on
            restaurant prep time and your location.
          </div>
        </div>
      </div>

      <!-- Cancel/Modify Order -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="orderTwo">
          <button
            class="same accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#orderCollapseTwo"
            aria-expanded="false"
            aria-controls="orderCollapseTwo"
          >
            🛒 Can I cancel or modify my order?
          </button>
        </h2>
        <div
          id="orderCollapseTwo"
          class="same accordion-collapse collapse"
          aria-labelledby="orderTwo"
          data-bs-parent="#faqAccordion"
        >
          <div class="ans accordion-body">
            You can cancel or modify an order within a few minutes after
            placing it via your order history, unless it's already being
            prepared.
          </div>
        </div>
      </div>

      <!-- Payment Security -->
      <div class="accordion-item">
        <h2 class="same accordion-header" id="paymentTwo">
          <button
            class="same accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#paymentCollapseTwo"
            aria-expanded="false"
            aria-controls="paymentCollapseTwo"
          >
            💳 Is my payment information secure?
          </button>
        </h2>
        <div
          id="paymentCollapseTwo"
          class="same accordion-collapse collapse"
          aria-labelledby="paymentTwo"
          data-bs-parent="#faqAccordion"
        >
          <div class="ans accordion-body">
            Absolutely. We use encrypted and secure gateways to ensure your
            financial data stays safe.
          </div>
        </div>
      </div>

      <!-- Track Delivery -->
      <div class="accordion-item">
        <h2 class="same accordion-header" id="deliveryTwo">
          <button
            class="same accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#deliveryCollapseTwo"
            aria-expanded="false"
            aria-controls="deliveryCollapseTwo"
          >
            🚚 Can I track my delivery?
          </button>
        </h2>
        <div
          id="deliveryCollapseTwo"
          class="same accordion-collapse collapse"
          aria-labelledby="deliveryTwo"
          data-bs-parent="#faqAccordion"
        >
          <div class="ans accordion-body">
            Yes! You can track your delivery in real-time from the Foodogram
            app or website.
          </div>
        </div>
      </div>

      <!-- Schedule Orders -->
      <div class="accordion-item">
        <h2 class="same accordion-header" id="headingOrder1">
          <button
            class="same accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseOrder1"
            aria-expanded="false"
            aria-controls="collapseOrder1"
          >
            🛒 Can I schedule orders in advance?
          </button>
        </h2>
        <div
          id="collapseOrder1"
          class="same accordion-collapse collapse"
          aria-labelledby="headingOrder1"
          data-bs-parent="#faqAccordion"
        >
          <div class="ans accordion-body">
            Yes, you can pre-order meals for a specific date and time using
            the scheduling option at checkout.
          </div>
        </div>
      </div>

      <!-- Restaurant Unavailable -->
      <div class="accordion-item">
        <h2 class="same accordion-header" id="headingOrder2">
          <button
            class="same accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseOrder2"
            aria-expanded="false"
            aria-controls="collapseOrder2"
          >
            🛒 What happens if the restaurant is closed or unavailable?
          </button>
        </h2>
        <div
          id="collapseOrder2"
          class="same accordion-collapse collapse"
          aria-labelledby="headingOrder2"
          data-bs-parent="#faqAccordion"
        >
          <div class="ans accordion-body">
            If your chosen restaurant becomes unavailable, we'll notify you
            immediately and help you select an alternative.
          </div>
        </div>
      </div>

      <!-- Refunds -->
      <div class="accordion-item">
        <h2 class="same accordion-header" id="headingPayment1">
          <button
            class="same accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsePayment1"
            aria-expanded="false"
            aria-controls="collapsePayment1"
          >
            💳 Do you offer refunds?
          </button>
        </h2>
        <div
          id="collapsePayment1"
          class="same accordion-collapse collapse"
          aria-labelledby="headingPayment1"
          data-bs-parent="#faqAccordion"
        >
          <div class="ans accordion-body">
            Refunds are issued in cases of failed delivery or incorrect
            charges. Contact our support within 24 hours for assistance.
          </div>
        </div>
      </div>

      <!-- Payment Declined -->
      <div class="accordion-item">
        <h2 class="same accordion-header" id="headingPayment2">
          <button
            class="same accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsePayment2"
            aria-expanded="false"
            aria-controls="collapsePayment2"
          >
            💳 Why was my payment declined?
          </button>
        </h2>
        <div
          id="collapsePayment2"
          class="same accordion-collapse collapse"
          aria-labelledby="headingPayment2"
          data-bs-parent="#faqAccordion"
        >
          <div class="ans accordion-body">
            Payment issues can occur due to incorrect details, network errors,
            or card limits. Try again or use an alternate method.
          </div>
        </div>
      </div>

      <!-- Change Address -->
      <div class="accordion-item">
        <h2 class="same accordion-header" id="headingDelivery1">
          <button
            class="same accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseDelivery1"
            aria-expanded="false"
            aria-controls="collapseDelivery1"
          >
            🚚 Can I change the delivery address after placing an order?
          </button>
        </h2>
        <div
          id="collapseDelivery1"
          class="same accordion-collapse collapse"
          aria-labelledby="headingDelivery1"
          data-bs-parent="#faqAccordion"
        >
          <div class="ans accordion-body">
            Address changes are possible if the order hasn't been dispatched.
            Use the "Modify Order" button or contact support ASAP.
          </div>
        </div>
      </div>

      <!-- Late or Missing -->
      <div class="accordion-item">
        <h2 class="same accordion-header" id="headingDelivery2">
          <button
            class="same accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseDelivery2"
            aria-expanded="false"
            aria-controls="collapseDelivery2"
          >
            🚚 What if my food is late or missing items?
          </button>
        </h2>
        <div
          id="collapseDelivery2"
          class="same accordion-collapse collapse"
          aria-labelledby="headingDelivery2"
          data-bs-parent="#faqAccordion"
        >
          <div class="ans accordion-body">
            You can report delays or missing items through the "Help" section.
            We'll investigate and compensate if necessary.
          </div>
        </div>
      </div>
    </div>
    <!-- End of accordion -->
    <p class="thanks text-center" id="thanks"><strong>THANK YOU!</strong></p>
  </div>

  <!-- Footer -->
  <footer class="footer text-white mt-5">
    <div class="container text-center text-md-start">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5 class="fw-bold">🍽️ Foodogram</h5>
          <p>Fresh, fast & delicious food delivered to your door.</p>
        </div>
        <div class="col-md-4 mb-3">
          <h6 class="fw-bold">Quick Links</h6>
          <ul class="list-unstyled">
            <li><a href="about.php">About Us</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-3">
          <h6 class="fw-bold">Follow Us</h6>
          <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
          <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
          <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
          <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
        </div>
      </div>
      <hr class="border-secondary" />
      <div class="text-center small">&copy; 2025 Foodogram. All rights reserved.</div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>