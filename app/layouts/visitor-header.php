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

            <a href="/?page=home" class="visitor-logo">Logo</a>

            <nav class="visitor-nav" id="visitorNav">
                <a href="/?page=home" class="visitor-nav-link <?= $currentPage == 'home' ? 'active' : ''?>" >Home</a>
                <a href="/?page=about" class="visitor-nav-link <?= $currentPage == 'about' ? 'active' : ''?>">About</a>
                <a href="/?page=contact" class="visitor-nav-link <?= $currentPage == 'contact' ? 'active' : ''?>">Contact Us</a>
                <a href="/?page=signup" class="visitor-nav-link signup-link">Sign Up</a>
                <a href="/?page=login" class="visitor-nav-link login-link">Log In</a>
            </nav>

        </div>
    </header>
</body>

</html>