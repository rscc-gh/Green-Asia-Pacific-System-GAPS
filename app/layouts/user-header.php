<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Header</title>
</head>

<body>

    <?php
    $currentPage = $_GET['page'] ?? 'home';
    ?>

    <header class="main-header">
        <div class="main-header-container">

            <div class="main-header-left">

                <!-- Sidebar Toggle -->
                <button type="button" class="sidebar-toggle" onclick="toggleSidebar()">☰</button>

                <a href="?page=dashboard" class="main-logo">Logo</a>

                <nav class="main-nav" id="mainNav">
                    <a href="?page=dashboard" class="main-nav-link <?= $currentPage == 'dashboard' ? 'active' : '' ?>">Home</a>
                    <a href="?page=activities" class="main-nav-link <?= $currentPage == 'activities' ? 'active' : '' ?>">Activities</a>
                    <a href="?page=rewards" class="main-nav-link <?= $currentPage == 'rewards' ? 'active' : '' ?>">Rewards</a>
                    <a href="?page=community" class="main-nav-link <?= $currentPage == 'community' ? 'active' : '' ?>">Community</a>
                </nav>

            </div>

            <div class="main-header-right">
                <a href="?page=myprofile" class="profile-link">Profile</a>
            </div>

        </div>
    </header>

</body>

</html>