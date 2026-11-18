<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Header</title>
</head>

<body>
    
    <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
    ?>

    <header class="main-header">
        <div class="main-header-container">

            <div class="main-header-left">

                <a href="/?page=dashboard" class="main-logo">Logo</a>

                <nav class="main-nav" id="mainNav">
                    <a href="/?page=dashboard" class="main-nav-link <?= $currentPage == 'home.php' ? 'active' : '' ?>">Home</a>
                    <a href="/?page=home" class="main-nav-link <?= $currentPage == 'activities.php' ? 'active' : '' ?>">Activities</a>
                    <a href="/?page=home" class="main-nav-link <?= $currentPage == 'rewards.php' ? 'active' : '' ?>">Rewards</a>
                    <a href="/?page=home" class="main-nav-link <?= $currentPage == 'community.php' ? 'active' : '' ?>">Community</a>
                </nav>

            </div>

            <div class="main-header-right">
                <a href="/?page=home" class="profile-link">Profile</a>
            </div>

        </div>
    </header>
    
</body>

</html>