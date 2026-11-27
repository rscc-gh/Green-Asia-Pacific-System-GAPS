<?php
    require_once __DIR__ . '/../config/conn.php';

    //Only accept form submissions
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ?page=login');
        exit;
    }

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    function loginFail($message) {
        $_SESSION['login_error'] = $message;
        header('Location: ?page=login');
        exit;
    }

    if ($username === '' || $password === '') {
        loginFail('Enter your username or email and your password.');
    }

    //Look the user up from mysql databasase
    $stmt = mysqli_prepare($conn,
        "SELECT user_id, username, password, full_name, user_role, status
         FROM users WHERE username = ? OR email = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "ss", $username, $username);
    mysqli_stmt_execute($stmt);
    $user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    mysqli_stmt_close($stmt);

    //Works with hashed passwords and also the for now plain test data.
    //Once we all switch to password_hash() then can delete the hash_equals part.
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

    // when this success means new session id, then store who is logged in
    session_regenerate_id(true);
    $_SESSION['user_id']   = $user['user_id'];
    $_SESSION['username']  = $user['username'];
    $_SESSION['full_name'] = $user['full_name'];
    $_SESSION['user_role'] = $user['user_role'];

    header('Location: ?page=dashboard');
    exit;
