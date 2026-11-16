<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Header</title>
</head>

<body>
    
    <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
    ?>

    <header class="visitor-header">
        <div class="visitor-header-container">

            <a href="/" class="visitor-logo">Logo</a>

            <nav class="visitor-nav" id="visitorNav">
                <a href="index.php" class="visitor-nav-link <?= $currentPage == 'index.php' ? 'active' : ''?>" >Home</a>
                <a href="index.php" class="visitor-nav-link <?= $currentPage == 'about.php' ? 'active' : ''?>">About</a>
                <a href="index.php" class="visitor-nav-link <?= $currentPage == 'contact.php' ? 'active' : ''?>">Contact Us</a>
                <a href="index.php" class="visitor-nav-link signup-link">Sign Up</a>
                <a href="index.php" class="visitor-nav-link login-link">Log In</a>
            </nav>

        </div>
    </header>
</body>

</html>