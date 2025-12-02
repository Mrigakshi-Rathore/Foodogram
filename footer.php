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
                <div class="col-md-4 mb-3">
                    <h6 style="color: yellow;" class="fw-bold">Follow Us</h6>
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-white me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512" fill="currentColor" style="vertical-align: middle;">
                        <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>
            <hr class="border-secondary" />
            <div style="color: yellow;" class="text-center small">
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