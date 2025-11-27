# Contributing to Foodogram 🍔

Thank you for your interest in contributing to **Foodogram**! We're excited to have you help make this project better. This document will guide you through the contribution process.

---

## Table of Contents

1. [Getting Started](#getting-started)
2. [Development Setup](#development-setup)
3. [Making Changes](#making-changes)
4. [Submitting a Pull Request](#submitting-a-pull-request)
5. [Coding Standards](#coding-standards)
6. [Dos and Don'ts](#dos-and-donts)
7. [Issue Guidelines](#issue-guidelines)

---

## Getting Started

### Fork the Repository

1. Go to the [Foodogram repository](https://github.com/Mrigakshi-Rathore/Foodogram)
2. Click the **"Fork"** button in the top right corner
3. This creates a copy of the repository under your GitHub account

### Clone Your Fork

```bash
# Clone your forked repository
git clone https://github.com/YOUR-USERNAME/Foodogram.git

# Navigate into the project directory
cd Foodogram

# Add the upstream remote to keep your fork updated
git remote add upstream https://github.com/Mrigakshi-Rathore/Foodogram.git
```

### Verify the Setup

```bash
# Check your remotes
git remote -v
# You should see both 'origin' (your fork) and 'upstream' (original repo)
```

---

## Development Setup

### Prerequisites

Before you start contributing, ensure you have the following installed:

- **PHP**: Version 7.4 or higher
  - Required extensions: `mysqli`, `pdo`, `pdo_mysql`
- **MySQL**: Version 5.7 or higher (MariaDB is also supported)
- **Web Server**: Apache (recommended) or Nginx
  - **Easier alternative**: Use XAMPP, WAMP, or MAMP for an all-in-one solution
- **Git**: For version control
- **Browser**: Any modern browser for testing

### Local Setup Steps

1. **Set up your web server**:
   - **XAMPP/WAMP/MAMP users**: Place the `Foodogram` folder in the `htdocs` (XAMPP) or `www` (WAMP/MAMP) directory
   - **Apache users**: Configure a virtual host pointing to the `Foodogram` directory

2. **Create a MySQL database**:
   ```bash
   # Using command line (replace placeholders)
   mysql -u root -p
   
   # In MySQL prompt:
   CREATE DATABASE foodogram;
   USE foodogram;
   ```
   - Or use phpMyAdmin for a GUI approach

3. **Import the database schema**:
   - Check if there's a `.sql` file in the repository and import it
   - If not, refer to the schema in `db_connect.php` and the README for table structures

4. **Configure database connection**:
   - Open `db_connect.php`
   - Update the credentials to match your local setup:
     ```php
     $host     = "localhost";          // Your MySQL host
     $username = "root";               // Your MySQL username
     $password = "your_password";      // Your MySQL password
     $dbname   = "foodogram";          // Your database name
     ```

5. **Start your local server**:
   - **XAMPP/WAMP/MAMP**: Start Apache and MySQL from the control panel
   - **Apache command line**: `sudo systemctl start apache2` (Linux) or use Services (Windows)

6. **Access the application**:
   - Open your browser and navigate to: `http://localhost/Foodogram/` or your configured virtual host

---

## Making Changes

### Create a Feature Branch

Always create a new branch for your work. This keeps your changes organized and allows multiple contributions to be worked on simultaneously.

```bash
# Update your local repository with the latest changes from upstream
git fetch upstream
git rebase upstream/main

# Create a new branch with a descriptive name
git checkout -b <branch-type>/<branch-name>
```

#### Branch Naming Convention

Use the following format for branch names:

- `feature/add-user-dashboard` - For new features
- `bugfix/cart-calculation-error` - For bug fixes
- `docs/update-readme` - For documentation updates
- `refactor/optimize-database-queries` - For refactoring
- `test/add-unit-tests` - For test additions

**Example**: If you're adding a notification system, name your branch: `feature/add-notification-system`

### Make Your Changes

1. Edit the relevant files
2. Test your changes locally to ensure they work correctly
3. Keep your commits small and focused (each commit should solve one problem)

### Commit Your Changes

Write clear, descriptive commit messages following this format:

```
<type>: <short description>

<optional detailed description>

Fixes #<issue-number> (if applicable)
```

**Commit types**:
- `feat`: A new feature
- `fix`: A bug fix
- `docs`: Documentation changes
- `style`: Code style changes (formatting, missing semicolons, etc.) - no functional changes
- `refactor`: Code refactoring without feature changes
- `perf`: Performance improvements
- `test`: Adding or updating tests
- `chore`: Build process, dependencies, or tooling changes

**Examples**:
```bash
git commit -m "feat: add user profile page with avatar upload"
git commit -m "fix: resolve shopping cart price calculation bug"
git commit -m "docs: update installation instructions in README"
git commit -m "refactor: optimize database queries in menu.php"
```

---

## Submitting a Pull Request

### Before You Submit

1. **Pull the latest changes from upstream**:
   ```bash
   git fetch upstream
   git rebase upstream/main
   ```

2. **Test your changes thoroughly**:
   - Verify all functionality works as expected
   - Test on different browsers if possible
   - Check for any JavaScript console errors
   - Ensure the database queries work correctly

3. **Follow coding standards** (see below)

### Creating the Pull Request

1. **Push your branch to your fork**:
   ```bash
   git push origin <your-branch-name>
   ```

2. **Go to the original repository** and you'll see a prompt to create a pull request

3. **Fill in the PR template**:
   ```
   ## Description
   A clear description of what this PR does.

   ## Related Issue
   Fixes #<issue-number>

   ## Type of Change
   - [ ] Bug fix
   - [ ] New feature
   - [ ] Documentation update
   - [ ] Refactoring

   ## Testing
   Describe how you tested your changes.

   ## Checklist
   - [ ] My code follows the coding standards
   - [ ] I have tested my changes locally
   - [ ] I have updated documentation (if needed)
   - [ ] My commit messages are clear and descriptive
   ```

4. **Submit the PR** for review

### PR Review Process

- The maintainers will review your PR
- They may request changes or ask questions
- Make updates based on feedback and push them to your branch
- Once approved, your PR will be merged 🎉

---

## Coding Standards

### PHP Code Style

- **Indentation**: Use 4 spaces (not tabs)
- **Naming Conventions**:
  - Classes: PascalCase (`UserProfile`, `OrderManager`)
  - Functions/Methods: camelCase (`getUserData()`, `calculateTotal()`)
  - Variables: snake_case (`$user_id`, `$order_status`)
  - Constants: UPPER_SNAKE_CASE (`DB_HOST`, `MAX_ITEMS`)
- **Line Length**: Keep lines under 120 characters
- **Documentation**: Add comments for complex logic
  ```php
  // Good
  // Calculate total price including tax
  $total = $subtotal * (1 + $tax_rate);
  
  // Bad
  // Multiply
  $total = $subtotal * (1 + $tax_rate);
  ```

### HTML/CSS/JavaScript

- Use semantic HTML5
- Use lowercase for HTML tags and attributes
- Use CSS classes for styling (avoid inline styles)
- Use const/let instead of var in JavaScript
- Add meaningful comments for complex code sections

### File Organization

```
├── index.php              // Main entry point
├── db_connect.php         // Database connection
├── header.php             // Common header
├── footer.php             // Common footer
├── login.php              // Login functionality
├── [feature].php          // Feature-specific files
└── images/               // Image assets
```

---

## Dos and Don'ts

### ✅ Do's

- ✅ Create one feature/fix per branch and PR
- ✅ Write clear commit messages
- ✅ Test your changes before submitting
- ✅ Update relevant documentation
- ✅ Keep your fork updated with the main repository
- ✅ Be respectful and professional in discussions
- ✅ Start with smaller issues if you're new to the project
- ✅ Ask questions if you're unsure about something

### ❌ Don'ts

- ❌ Don't commit sensitive information (passwords, API keys, credentials)
- ❌ Don't make changes to multiple unrelated features in one PR
- ❌ Don't ignore code review feedback
- ❌ Don't push directly to the main branch
- ❌ Don't use deprecated functions or practices
- ❌ Don't submit PRs without testing locally
- ❌ Don't modify database credentials in commits (use `.env` or `.gitignore`)
- ❌ Don't write comments in unnecessary places or with poor grammar

### Security Best Practices

- Always validate user input
- Use prepared statements for database queries (prevent SQL injection)
- Sanitize output before displaying on the page
- Never store passwords in plain text
- Use HTTPS for live deployments
- Keep dependencies updated

---

## Issue Guidelines

### Reporting Bugs

When creating an issue, please include:

1. **Clear title**: "Login fails with special characters in password"
2. **Description**: What happened and what you expected
3. **Steps to reproduce**:
   ```
   1. Navigate to login page
   2. Enter email: test@test.com
   3. Enter password: P@ss!word
   4. Click login
   ```
4. **Expected behavior**: What should happen
5. **Actual behavior**: What actually happened
6. **Environment**: Browser, OS, PHP version, etc.
7. **Screenshots**: If applicable

### Requesting Features

When suggesting a new feature:

1. **Clear title**: "Add order tracking with real-time updates"
2. **Description**: What feature you want and why
3. **Use cases**: How would users benefit
4. **Additional context**: Any references or examples

---

## Getting Help

- 📖 Check the [README.md](README.md) for project overview
- 💬 Check existing issues for similar problems
- 🤝 Reach out to maintainers on the issue discussions
- 📚 Review existing PRs to see how others contributed

---

## License

By contributing to Foodogram, you agree that your contributions will be licensed under the same license as the project.

---

## Thank You! 🙏

We appreciate your contribution to making Foodogram better. Happy coding! 🚀

If you have any questions, feel free to open an issue or discuss with the maintainers.

**Happy Contributing!** 🎉
