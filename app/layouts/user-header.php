<?php

    include __DIR__ . '/../config/conn.php';

    $currentPage = $_GET['page'] ?? 'home';

    // Checks if any unread notifications
    $unreadNotifications = 0;

    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $query = "SELECT COUNT(*) FROM notification_reads WHERE user_id = '{$userId}' AND status = 'Unread'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_row($result);
            $unreadNotifications = (int) $row[0];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Header</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <header class="main-header">
        <div class="main-header-container">

            <div class="main-header-left">

                <!-- Sidebar Toggle -->
                <button type="button" class="sidebar-toggle" onclick="toggleSidebar()">☰</button>

                <a href="/RWDD2507/public/?page=dashboard" class="main-logo">Logo</a>

                <nav class="main-nav" id="mainNav">
                    <a href="/RWDD2507/public/?page=dashboard" class="main-nav-link <?= $currentPage == 'dashboard' ? 'active' : '' ?>">Home</a>
                    <a href="/RWDD2507/public/?page=activities" class="main-nav-link <?= $currentPage == 'activities' ? 'active' : '' ?>">Activities</a>
                    <a href="/RWDD2507/public/?page=rewards" class="main-nav-link <?= $currentPage == 'rewards' ? 'active' : '' ?>">Rewards</a>
                    <a href="/RWDD2507/public/?page=community" class="main-nav-link <?= $currentPage == 'community' ? 'active' : '' ?>">Community</a>
                </nav>

            </div>

            <div class="main-header-right">

                <!-- Notifications -->
                <a href="/RWDD2507/public/?page=notifications" class="notification-link" aria-label="Notifications">
                    <i class="fa-regular fa-bell"></i>
                    <?php if ($unreadNotifications): ?>
                        <span class="notification-dot"></span>
                    <?php endif; ?>
                </a>

                <!-- Profile -->
                <a href="/RWDD2507/public/?page=myprofile" class="profile-link">
                    Profile
                </a>

            </div>

        </div>
    </header>

</body>

</html>