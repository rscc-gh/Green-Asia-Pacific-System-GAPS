<?php
    // If user allready logged in, skip the login page
    if (isset($_SESSION['user_id'])) {
        header('Location: /?page=dashboard');
        exit;
    }

    // this is a 1 time error message set by actions/login.php
    $error = $_SESSION['login_error'] ?? '';
    unset($_SESSION['login_error']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/visitor-header.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/login.css">
</head>

<body>

    <!--Header-->
    <?php
        include __DIR__ . '/../../layouts/visitor-header.php';
    ?>

    <!--Main Body-->
    <main class="login-main">

        <!--Left side image (replace this div with img when got the real GAPS picture)-->
        <div class="login-image" role="img" aria-label="Login illustration"></div>

        <!--Right side login block-->
        <section class="login-card">
            <p class="login-intro">Log in to continue helping our planet bit by bit</p>

            <?php if ($error !== ''): ?>
                <p class="login-error" role="alert"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form action="/?page=loginprocess" method="post">
                <label for="username">Username/Email</label>
                <input type="text" id="username" name="username" required autofocus>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>

            <a href="/?page=signup" class="login-signup">New here? Sign Up</a>
        </section>

    </main>

    <!-- Footer -->
    <?php
        include __DIR__ . '/../../layouts/footer.php';
    ?>

</body>
</html>
