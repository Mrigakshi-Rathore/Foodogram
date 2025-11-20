    <footer class="footer text-white bg-black">
        <div class="container">
            <div class="row align-items-start">
                <!-- Logo and Description -->
                <div class="col-md-4">
                    <h5 style="color: #ffc800;">🍽️ Foodogram</h5>
                    <p>
                        Your go-to destination for fresh, fast & delicious food delivered at your door.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-3">
                    <h6 style="color: #ffc800;">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li>
                            <a href="about.php" class="text-white text-decoration-none">About Us</a>
                        </li>
                        <li>
                            <a href="menu.php" class="text-white text-decoration-none">Menu</a>
                        </li>
                        <li>
                            <a href="profile.php" class="text-white text-decoration-none">Profile</a>
                        </li>
                        <li>
                            <a href="contact.php" class="text-white text-decoration-none">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div class="col-md-3">
                    <h6 style="color: #ffc800;">Follow Us</h6>
                    <div class="social-links">
                        <a href="#" class="text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary" />
            <div class="copyright text-center">
                &copy; 2025 Foodogram. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        const toggle = document.getElementById('darkModeToggle');
        toggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            toggle.textContent =
                document.body.classList.contains('dark-mode') ? '☀️ Light Mode' : 'Dark Mode';
        });
    </script>
</body>
</html>