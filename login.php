<?php
session_start();
require('model/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login &amp; Register | Workout Routine Manager</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a href="index.html" class="brand">
                FitTrack PHP
                <span>Exercise &amp; Workout Routine Manager</span>
            </a>
            <nav class="main-nav">
                <!-- PHP TODO: Dynamically show count from $_SESSION['routine'], and toggle "+ Add Exercise" / "Logout" based on $_SESSION['username'] -->
                <a href="index.html">Exercise Catalog</a>
                <a href="routine_builder.html">Active Routine (3)</a>
                <a href="saved_routine.html">Saved Routines</a>

                <!-- Capitulo 12 del libro -->
                <?php if (isset($_SESSION['username'])) : ?> 
                    <a href="exercise_form.html">+ Add Exercise</a>
                    <a href="logout.php">Logout</a>
                <?php else : ?>
                    <a href="login.php" class="active">Login / Register</a>
                <?php endif; ?>
                
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="dev-banner">
            <strong>Authentication Note:</strong> Logging in is only required to Add, Edit, or Delete exercises in MySQL.
            Guests can build and save workout routines without logging in. Pre-seeded test accounts in
            <code>users</code>: <strong>admin</strong> / <code>Admin123!</code> or <strong>coach1</strong> / <code>Coach123!</code>.
        </div>

        <div class="two-col-grid">
            <!-- Login Card -->
            <section class="card">
                <h2 style="color: var(--navy); margin-bottom: 0.35rem;">Sign In</h2>
                <p class="subtitle" style="margin-bottom: 1.1rem;">Log in to manage exercises in the database.</p>

                <!-- PHP TODO: Display validation or invalid login error message here -->
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="login">

                    <div class="form-group">
                        <label for="login_username">Username</label>
                        <input type="text" id="login_username" name="username" class="form-control"
                               value="admin" placeholder="e.g., admin" required>
                    </div>

                    <div class="form-group">
                        <label for="login_password">Password</label>
                        <input type="password" id="login_password" name="password" class="form-control"
                               placeholder="Enter password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Log In</button>
                </form>
            </section>

            <!-- Registration Card -->
            <section class="card">
                <h2 style="color: var(--navy); margin-bottom: 0.35rem;">Create an Account</h2>
                <p class="subtitle" style="margin-bottom: 1.1rem;">Register a new authorized editor account.</p>

                <!-- PHP TODO: Validate inputs, hash password with password_hash(), and insert into users table -->
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="register">

                    <div class="form-group">
                        <label for="reg_username">Username (Primary Key)</label>
                        <input type="text" id="reg_username" name="username" class="form-control"
                               placeholder="Letters, numbers, underscores (3–50 chars)" required>
                    </div>

                    <div class="form-group">
                        <label for="reg_email">Email Address</label>
                        <input type="email" id="reg_email" name="email" class="form-control"
                               placeholder="coach@example.com" required>
                    </div>

                    <div class="form-group">
                        <label for="reg_password">Password</label>
                        <input type="password" id="reg_password" name="password" class="form-control"
                               placeholder="Create a strong password" required>
                    </div>

                    <div class="form-group">
                        <label for="reg_confirm">Confirm Password</label>
                        <input type="password" id="reg_confirm" name="confirm_password" class="form-control"
                               placeholder="Re-enter password" required>
                    </div>

                    <button type="submit" class="btn btn-secondary">Register Account</button>
                </form>
            </section>
        </div>
    </main>

    <footer class="site-footer">
        PHP &amp; MySQL Capstone Project &bull; Starter Front-End Template
    </footer>
</body>
</html>
