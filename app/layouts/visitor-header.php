<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Header</title>
</head>

<body>
    
    <?php
        $currentPage = $_GET['page'] ?? 'home';
    ?>

    <header class="visitor-header">
        <div class="visitor-header-container">

            <a href="/RWDD2507/public/?page=home" class="visitor-logo">Logo</a>

            <nav class="visitor-nav" id="visitorNav">
                <a href="/RWDD2507/public/?page=home" class="visitor-nav-link <?= $currentPage == 'home' ? 'active' : ''?>" >Home</a>
                <a href="/RWDD2507/public/?page=about" class="visitor-nav-link <?= $currentPage == 'about' ? 'active' : ''?>">About</a>
                <a href="/RWDD2507/public/?page=contact" class="visitor-nav-link <?= $currentPage == 'contact' ? 'active' : ''?>">Contact Us</a>
                <a href="/RWDD2507/public/?page=signup" class="visitor-nav-link signup-link">Sign Up</a>
                <a href="/RWDD2507/public/?page=login" class="visitor-nav-link login-link">Log In</a>
            </nav>

        </div>
    </header>
</body>

</html>