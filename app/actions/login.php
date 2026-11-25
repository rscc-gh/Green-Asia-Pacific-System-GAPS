<?php
    // Connection must be at the very top
    require_once __DIR__ . '/../config/conn.php';

    // Only accept form submissions
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: /?page=login');
        exit;
    }

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    function loginFail($message) {
        $_SESSION['login_error'] = $message;
        header('Location: /?page=login');
        exit;
    }

    if ($username === '' || $password === '') {
        loginFail('Enter your username or email and your password.');
    }

    // Look the user up (prepared statement = safe from SQL injection)
    $stmt = mysqli_prepare($conn,
        "SELECT user_id, username, password, full_name, user_role, status
         FROM users WHERE username = ? OR email = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "ss", $username, $username);
    mysqli_stmt_execute($stmt);
    $user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    mysqli_stmt_close($stmt);

    // Works with hashed passwords AND the current plain-text test data.
    // Once the team switches to password_hash(), delete the hash_equals part.
    $valid = $user && (
        password_verify($password, $user['password']) ||
        hash_equals($user['password'], $password)
    );

    if (!$valid) {
        loginFail('Username/email or password is incorrect.');
    }

    if ($user['status'] !== 'Active') {
        loginFail('This account is not active. Contact an admin.');
    }

    // Success: new session id, then store who is logged in
    session_regenerate_id(true);
    $_SESSION['user_id']   = $user['user_id'];
    $_SESSION['username']  = $user['username'];
    $_SESSION['full_name'] = $user['full_name'];
    $_SESSION['user_role'] = $user['user_role'];

    header('Location: /?page=dashboard');
    exit;
