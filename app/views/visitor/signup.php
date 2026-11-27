<?php
// If user allready logged in, skip the sign up page
if (isset($_SESSION['user_id'])) {
    header('Location: ?page=dashboard');
    exit;
}

// these are 1 time values set by actions/signup.php
$error = $_SESSION['signup_error'] ?? '';
unset($_SESSION['signup_error']);

$old = $_SESSION['signup_old'] ?? [];
unset($_SESSION['signup_old']);

$val = function (string $key) use ($old): string {
    return htmlspecialchars($old[$key] ?? '', ENT_QUOTES, 'UTF-8');
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/visitor-header.css">
    <link rel="stylesheet" href="assets/css/footer.css">

    <link rel="stylesheet" href="assets/css/signup.css">
</head>

<body>

    <!--Header-->
    <?php
    include __DIR__ . '/../../layouts/visitor-header.php';
    ?>

    <!--Main Body-->
    <main class="signup-page">

        <!--Soft glow blobs that sit behind the card-->
        <span class="signup-glow signup-glow-one" aria-hidden="true"></span>
        <span class="signup-glow signup-glow-two" aria-hidden="true"></span>

        <div class="signup-stage">

            <!--One floating white card. The old left picture box is gone on purpose-->
            <div class="signup-card">

                <span class="signup-medallion" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 20A7 7 0 0 1 4 13C4 8 8 4 20 4c0 12-4 16-9 16Z" />
                        <path d="M4 20c3-4 6-6 11-8" />
                    </svg>
                </span>

                <div class="signup-card-top">
                    <span class="signup-tag">New member</span>
                    <ol class="signup-progress" aria-hidden="true">
                        <li class="is-on"><span>1</span>Details</li>
                        <li class="is-on"><span>2</span>Security</li>
                        <li><span>3</span>Ready</li>
                    </ol>
                </div>

                <h1>Create your account</h1>
                <p class="signup-lead">A minute now, and every green action you take will start counting.</p>

                <?php if ($error !== ''): ?>
                    <p class="signup-error" role="alert"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>

                <form class="signup-form" action="?page=signupprocess" method="post">

                    <section class="signup-section">
                        <h2 class="signup-section-title">Your details</h2>

                        <div class="signup-grid">

                            <div class="signup-field signup-field-full">
                                <label for="full_name">Full Name</label>
                                <input type="text" id="full_name" name="full_name" maxlength="64" placeholder="Your full name"
                                    value="<?= $val('full_name') ?>" autocomplete="name" required autofocus>
                            </div>

                            <div class="signup-field">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" maxlength="32" placeholder="3 to 32 characters"
                                    value="<?= $val('username') ?>" autocomplete="username" required>
                            </div>

                            <div class="signup-field">
                                <label for="mob_num">Mobile Number <span class="signup-optional">optional</span></label>
                                <input type="tel" id="mob_num" name="mob_num" maxlength="16" placeholder="e.g. 91234567"
                                    value="<?= $val('mob_num') ?>" autocomplete="tel">
                            </div>

                            <div class="signup-field signup-field-full">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" maxlength="32" placeholder="you@example.com"
                                    value="<?= $val('email') ?>" autocomplete="email" required>
                            </div>

                        </div>
                    </section>

                    <section class="signup-section">
                        <h2 class="signup-section-title">Secure your account</h2>

                        <div class="signup-grid">

                            <div class="signup-field">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" minlength="6" maxlength="32"
                                    pattern="[^\s]{6,32}" title="6-32 characters, with no spaces"
                                    placeholder="At least 6 characters" autocomplete="new-password" required>
                            </div>

                            <div class="signup-field">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" id="confirm_password" name="confirm_password" minlength="6" maxlength="32"
                                    pattern="[^\s]{6,32}" title="6-32 characters, with no spaces"
                                    placeholder="Repeat your password" autocomplete="new-password" required>
                            </div>

                        </div>

                        <p class="signup-hint">6-32 characters. No spaces or blank characters.</p>
                    </section>

                    <button type="submit" class="signup-submit">
                        Create account <span class="signup-submit-arrow" aria-hidden="true">&rarr;</span>
                    </button>

                </form>

                <p class="signup-switch">Already a member? <a href="?page=login">Login</a></p>

            </div>

            <ul class="signup-notes">
                <li>Track your green points</li>
                <li>Join partner activities</li>
                <li>Claim rewards</li>
            </ul>

        </div>

    </main>

    <!-- Footer -->
    <?php
    include __DIR__ . '/../../layouts/footer.php';
    ?>

</body>

</html>
