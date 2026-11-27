<?php
// If user allready logged in, skip the login page
if (isset($_SESSION['user_id'])) {
    header('Location: ?page=dashboard');
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

    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/visitor-header.css">
    <link rel="stylesheet" href="assets/css/footer.css">

    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

    <!--Header-->
    <?php
    include __DIR__ . '/../../layouts/visitor-header.php';
    ?>

    <!--Main Body-->
    <main class="login-page">

        <!--Soft glow blobs that sit behind the card-->
        <span class="login-glow login-glow-one" aria-hidden="true"></span>
        <span class="login-glow login-glow-two" aria-hidden="true"></span>

        <div class="login-stage">

            <!--One floating white card. The old left picture box is gone on purpose-->
            <div class="login-card">

                <span class="login-medallion" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 20A7 7 0 0 1 4 13C4 8 8 4 20 4c0 12-4 16-9 16Z" />
                        <path d="M4 20c3-4 6-6 11-8" />
                    </svg>
                </span>

                <div class="login-card-top">
                    <span class="login-tag">Member access</span>
                    <span class="login-dots" aria-hidden="true"><i></i><i></i><i></i></span>
                </div>

                <h1>Welcome back</h1>
                <p class="login-lead">Log in to pick up your green journey right where you left it.</p>

                <?php if ($error !== ''): ?>
                    <p class="login-error" role="alert"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>

                <form class="login-form" action="?page=loginprocess" method="post">

                    <div class="login-field">
                        <label for="username">Username / Email</label>
                        <input type="text" id="username" name="username" placeholder="Your username or email" required autofocus>
                    </div>

                    <div class="login-field">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Your password" required>
                    </div>

                    <button type="submit" class="login-submit">
                        Login <span class="login-submit-arrow" aria-hidden="true">&rarr;</span>
                    </button>

                </form>

                <p class="login-switch">New to GAPS? <a href="?page=signup">Create an account</a></p>

            </div>

            <ul class="login-notes">
                <li>Complete green activities</li>
                <li>Earn green points</li>
                <li>Redeem rewards</li>
            </ul>

        </div>

    </main>

    <!-- Footer -->
    <?php
    include __DIR__ . '/../../layouts/footer.php';
    ?>

</body>

</html>
