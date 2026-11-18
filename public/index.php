
<!-- Reroute -->
<?php

    $page = $_GET['page'] ?? 'home';

    switch ($page) {

        case 'home':
            require '../app/views/visitor/home.php';
            break;

        case 'dashboard':
            require '../app/views/user/dashboard.php';
            break;

        case 'profile':
            require '../app/views/user/profile.php';
            break;

        default:
            http_response_code(404);
            require '../app/views/errors/404.php';
            break;
    }
    
?>