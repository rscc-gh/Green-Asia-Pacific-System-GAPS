
<!-- Reroute -->
<?php

    require_once __DIR__ . '/../app/config/session.php';

    $page = $_GET['page'] ?? 'home';

    switch ($page) {

        case 'home':
            require '../app/views/visitor/home.php';
            break;
            
        case 'about':
            require '../app/views/visitor/about.php';
            break;
        
        case 'contact':
            require '../app/views/visitor/contact.php';
            break;
            
        case 'signup':
            require '../app/views/visitor/signup.php';
            break;
            
        case 'login':
            require '../app/views/visitor/login.php';
            break;

        case 'dashboard':
            require '../app/views/user/dashboard.php';
            break;

        case 'myprofile':
            require '../app/views/user/myprofile.php';
            break;
            
        case 'activities':
            require '../app/views/user/activities.php';
            break;
        
        case 'rewards':
            require '../app/views/user/rewards.php';
            break;
        
        case 'manageaccounts':
            require '../app/views/user/manageaccounts.php';
            break;

        case 'allstatistics':
            require '../app/views/user/allstatistics.php';
            break;

        case 'createnotifications':
            require '../app/views/user/createnotifications.php';
            break;

        case 'myactivitiescreated':
            require '../app/views/user/myactivitiescreated.php';
            break;

        case 'myrewardscreated':
            require '../app/views/user/myrewardscreated.php';
            break;

        case 'community':
            require '../app/views/user/community.php';
            break;

        case 'redeem':
            require '../app/actions/redeem.php';
            break;

        default:
            http_response_code(404);
            require '../app/views/errors/404.php';
            break;
    }
    
?>