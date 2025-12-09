<a name="top"></a>

<div align="center">

 **🍔 Foodogram – Online Food Ordering Website**

![Website](https://img.shields.io/badge/Online%20Food%20Ordering-Project-blue?style=for-the-badge)

[🌐 View Live Project](https://foodogram.infinityfreeapp.com)

</div>

---

**Foodogram** is a **dynamic online food ordering platform** that lets users browse menus, add items to cart, place orders, and track them in real-time. Admins can manage menu items, orders, and users through a connected MySQL database.

> ⚡ *"Foodogram bridges the gap between restaurants and customers with seamless online ordering."*

---

<div align="center">
  <img src="https://readme-typing-svg.herokuapp.com?font=Fira+Code&weight=600&size=24&duration=3000&pause=1000&color=00C853&center=true&vCenter=true&width=900&lines=Order+your+favorite+food+fast+and+easy!+🍕;Browse+menus+and+customize+orders+🥗;Track+your+order+live+🚀;Enjoy+a+delicious+experience+🍔" alt="Typing SVG" />
</div>

---

## 🧩 Key Features

-✅ User registration, login, and authentication  
-✅ Browse menus with search and filters  
-✅ Add to cart and checkout system  
-✅ Ratings and reviews for menu items  
-✅ User profile and order history  
-✅ Live chat/help page  
-✅ Admin panel for menu and order management  
-✅ Responsive, mobile-friendly design

---

## ⚙️ Tech Stack

| Layer      | Technology                     |
|----------- |--------------------------------|
| Frontend   | HTML, CSS, JavaScript           |
| Backend    | PHP                             |
| Database   | MySQL                           |
| Hosting    | InfinityFree                    |
| Version Control | Git & GitHub               |

---

## Setup Instructions 📥

🛠️ How to Run Locally

### Prerequisites
Before running the project locally, ensure you have the following installed:
- **PHP**: Version 7.4 or higher (with extensions: mysqli, pdo, pdo_mysql).
- **MySQL**: Version 5.7 or higher (or MariaDB).
- **Web Server**: Apache (recommended) or Nginx. Alternatively, use XAMPP, WAMP, or MAMP for an all-in-one solution.
- **Git**: For cloning the repository.
- **Composer** (optional): For dependency management if needed in the future.
- **Browser**: Any modern browser for testing.

### Installation
1. **Clone the repository**:
   ```bash
   git clone https://github.com/Mrigakshi-Rathore/Foodogram.git
   cd Foodogram
   ```

2. **Set up the web server**:
   - If using XAMPP/WAMP/MAMP:
     - Place the `Foodogram` folder in the `htdocs` (XAMPP) or `www` (WAMP/MAMP) directory.
   - If using Apache directly:
     - Configure a virtual host pointing to the `Foodogram` directory.

### Database Setup
1. **Create a MySQL database**:
   - Open your MySQL client (e.g., phpMyAdmin, MySQL Workbench, or command line).
   - Create a new database named `foodogram` (or as per your preference, but update `db_connect.php` accordingly).
   - Import the database schema (if provided in the repo; otherwise, create tables based on the code):
     - Tables typically include: `users`, `menu`, `orders`, `cart`, `reviews`, etc.
     - Example SQL for `users` table:
       ```sql
       CREATE TABLE users (
           id INT AUTO_INCREMENT PRIMARY KEY,
           username VARCHAR(50) NOT NULL,
           email VARCHAR(100) NOT NULL UNIQUE,
           password VARCHAR(255) NOT NULL,
           created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
       );
       ```
     - Repeat for other tables based on the application's needs.

2. **Update database credentials**:
   - Open `db_connect.php`.
   - Replace the placeholders with your local MySQL details:
     ```php
     $host     = "localhost";          // Your MySQL host
     $username = "your_username";      // Your MySQL username
     $password = "your_password";      // Your MySQL password
     $dbname   = "foodogram";          // Your database name
     ```
   - Ensure the database connection is secure and not exposed in production.

### Running the Application
1. **Start your web server and MySQL**:
   - If using XAMPP/WAMP, start Apache and MySQL from the control panel.
   - Access the application at `http://localhost/Foodogram` (or your configured URL).

2. **Test the setup**:
   - Visit the home page (`index.php`) in your browser.
   - Try registering a user, logging in, browsing the menu, and placing an order.
   - Check the database to ensure data is being inserted correctly.

### Troubleshooting
- **Database connection errors**: Verify credentials in `db_connect.php` and ensure MySQL is running.
- **PHP errors**: Check PHP error logs and ensure required extensions are enabled.
- **Port conflicts**: If using a different port, update your server configuration.
- **Permissions**: Ensure the web server has read/write access to the project directory.

### Deployment
- For production, host on a server like InfinityFree, Hostinger, or AWS.
- Use HTTPS and secure database credentials.
- Consider using environment variables for sensitive data.

---

## 🗄️ Database Schema

The application uses MySQL for data storage. Below is an overview of the key tables. Create these tables in your database during setup.

### Users Table
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,  -- Use hashed passwords
    phone VARCHAR(15),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

### Menu Table
```sql
CREATE TABLE menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    category ENUM('appetizers', 'main-courses', 'desserts', 'drinks') NOT NULL,
    image VARCHAR(255),
    is_veg BOOLEAN DEFAULT TRUE,
    rating DECIMAL(2,1) DEFAULT 0,
    is_available BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Orders Table
```sql
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'confirmed', 'preparing', 'out_for_delivery', 'delivered', 'cancelled') DEFAULT 'pending',
    delivery_address TEXT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### Order Items Table
```sql
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    menu_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menu(id) ON DELETE CASCADE
);
```

### Cart Table (for session-based cart)
```sql
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    session_id VARCHAR(255),  -- For guest users
    menu_id INT NOT NULL,
    quantity INT NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menu(id) ON DELETE CASCADE
);
```

### Reviews Table
```sql
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    menu_id INT NOT NULL,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menu(id) ON DELETE CASCADE
);
```

*Note: Adjust table structures based on actual application needs. Ensure foreign key constraints are handled properly in your PHP code.*

---

## 📸 Screenshots / Demo

<div align="center">


**Home Page**  
![Home Page](images/home.png)

**Menu Page**  
![Menu Page](images/menu.png)

**About Us Page**  
![About Us](images/aboutUs.png)

**User Profile Page**  
![Profile](images/profile.png)

**Checkout Page**  
![Checkout](images/checkout.png)

</div>

---

<h2>🧑‍💻 Project Admin:</h2>
<table>
<tr>
<td align="center">
<a href="https://github.com/Mrigakshi-Rathore"><img src="https://avatars.githubusercontent.com/u/203340283?v=4" height="140px" width="140px" alt="Mrigakshi"></a><br>
<sub><b>Mrigakshi Rathore</b><br>
<a href="https://www.linkedin.com/in/mrigakshi-rathore-415911324/">
<img src="https://github-production-user-asset-6210df.s3.amazonaws.com/73993775/278833250-adb040ea-e3ef-446e-bcd4-3e8d7d4c0176.png" width="45px" height="45px">
</a></sub>
</td>
</tr>
</table>

---


**👨‍💻 Developed By**  
**❤️ Mrigakshi Rathore ❤️**  
[Open an Issue](https://github.com/Mrigakshi-Rathore/Foodogram/issues) | [Watch Live Demo](https://foodogram.infinityfreeapp.com)
</div>


<div align="center">
    <a href="#top">
        <img src="https://img.shields.io/badge/Back%20to%20Top-000000?style=for-the-badge&logo=github&logoColor=white" alt="Back to Top">
    </a>
</div>

## 🤝 Contributing

We welcome contributions from the community! Here's how you can get involved:

### How to Contribute
1. **Fork the repository** on GitHub.
2. **Create a new branch** for your feature or bug fix:
   ```bash
   git checkout -b feature/your-feature-name
   ```
3. **Make your changes** and ensure they follow the project's coding standards.
4. **Test your changes** thoroughly.
5. **Commit your changes** with a descriptive message:
   ```bash
   git commit -m "Add: Brief description of your changes"
   ```
6. **Push to your branch**:
   ```bash
   git push origin feature/your-feature-name
   ```
7. **Create a Pull Request** on GitHub, describing your changes and why they should be merged.

### Contribution Guidelines
- Follow PHP PSR standards for code style.
- Write clear, concise commit messages.
- Add comments to complex code sections.
- Ensure your code is secure (e.g., use prepared statements for DB queries).
- Test on multiple browsers and devices for UI changes.
- Update documentation if needed.

### Areas for Contribution
- Bug fixes and code improvements
- New features (e.g., payment integration, advanced search)
- UI/UX enhancements
- Documentation updates
- Security improvements
- Performance optimizations

### Code of Conduct
Please be respectful and inclusive. We follow a standard code of conduct to ensure a positive environment for all contributors.

---

## 📞 Support

If you have questions, issues, or suggestions:
- **Open an Issue** on GitHub: [Issues](https://github.com/Mrigakshi-Rathore/Foodogram/issues)
- **Contact the Developer**: Reach out via LinkedIn or email.
- **Live Demo**: Check out the live version at [https://foodogram.infinityfreeapp.com](https://foodogram.infinityfreeapp.com)

Let's make Foodogram even better together! 🍔
