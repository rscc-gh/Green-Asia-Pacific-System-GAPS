<?php
    // For sign up request and authentication handling
    require_once __DIR__ . '/../config/conn.php';

    //Only accept form submissions
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ?page=signup');
        exit;
    }

    $full_name = trim($_POST['full_name'] ?? '');
    $username  = trim($_POST['username'] ?? '');
    $mob_num   = trim($_POST['mob_num'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $password  = $_POST['password'] ?? '';
    $confirm   = $_POST['confirm_password'] ?? '';

    function signupFail($message, array $old) {
        $_SESSION['signup_error'] = $message;
        $_SESSION['signup_old']   = $old;
        header('Location: ?page=signup');
        exit;
    }

    // so the form keeps what the user typed when something is wrong
    $old = [
        'full_name' => $full_name,
        'username'  => $username,
        'mob_num'   => $mob_num,
        'email'     => $email,
    ];

    if ($full_name === '' || $username === '' || $email === '' || $password === '' || $confirm === '') {
        signupFail('Please fill in every required field.', $old);
    }

    // the users table is narrow, so check the real column limits here
    if (strlen($full_name) > 64) {
        signupFail('Full name cannot be longer than 64 characters.', $old);
    }

    if (!preg_match('/^[A-Za-z0-9_]{3,32}$/', $username)) {
        signupFail('Username must be 3-32 characters, using letters, numbers or underscore only.', $old);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 32) {
        signupFail('Enter a valid email address (32 characters max).', $old);
    }

    if ($mob_num !== '' && !preg_match('/^[0-9]{8,16}$/', $mob_num)) {
        signupFail('Mobile number must be 8-16 digits.', $old);
    }

    if (strlen($password) < 6 || strlen($password) > 32) {
        signupFail('Password must be 6-32 characters.', $old);
    }

    // a password made of spaces (or with spaces inside) is not a real password
    // \p{Z} also covers no-break and other unicode space characters
    if (preg_match('/[\s\p{Z}]/u', $password)) {
        signupFail('Password cannot contain spaces or blank characters.', $old);
    }

    if ($password !== $confirm) {
        signupFail('Password and confirm password do not match.', $old);
    }

    // username and email both have to be free
    $stmt = mysqli_prepare($conn,
        "SELECT user_id FROM users WHERE username = ? OR email = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $exists = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    mysqli_stmt_close($stmt);

    if ($exists) {
        signupFail('That username or email is already registered.', $old);
    }

    // anyone signing up becomes a member and can log in straight away
    $user_role = 'member';
    $status    = 'Active';
    $mobile    = ($mob_num === '') ? null : $mob_num;

    // NOTE: users.password is varchar(32), so a password_hash() value will not fit yet.
    // Stored as plain text like the rest of the test data until the column is widened.
    $stmt = mysqli_prepare($conn,
        "INSERT INTO users (username, password, full_name, email, mob_num, user_role, status)
         VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssssss", $username, $password, $full_name, $email, $mobile, $user_role, $status);

    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        signupFail('Could not create the account. Please try again.', $old);
    }

    $new_user_id = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);

    // log the new member in with a fresh session id
    session_regenerate_id(true);
    $_SESSION['user_id']   = $new_user_id;
    $_SESSION['username']  = $username;
    $_SESSION['full_name'] = $full_name;
    $_SESSION['user_role'] = $user_role;

    header('Location: ?page=dashboard');
    exit;
