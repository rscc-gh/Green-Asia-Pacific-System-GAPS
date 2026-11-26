
<!-- Reroute -->
<?php

    require_once __DIR__ . '/../app/config/session.php';

    $page = $_GET['page'] ?? 'home';

    switch ($page) {

        case 'home':
            require __DIR__ . '/../app/views/visitor/home.php';
            break;
            
        case 'about':
            require __DIR__ . '/../app/views/visitor/about.php';
            break;
        
        case 'contact':
            require __DIR__ . '/../app/views/visitor/contact.php';
            break;
            
        case 'signup':
            require __DIR__ . '/../app/views/visitor/signup.php';
            break;
            
        case 'login':
            require __DIR__ . '/../app/views/visitor/login.php';
            break;

        case 'dashboard':
            require __DIR__ . '/../app/views/user/dashboard.php';
            break;

        case 'myprofile':
            require __DIR__ . '/../app/views/user/myprofile.php';
            break;
            
        case 'activities':
            require __DIR__ . '/../app/views/user/activities.php';
            break;
        
        case 'rewards':
            require __DIR__ . '/../app/views/user/rewards.php';
            break;
        
        case 'manageaccounts':
            require __DIR__ . '/../app/views/user/manageaccounts.php';
            break;

        case 'allstatistics':
            require __DIR__ . '/../app/views/user/allstatistics.php';
            break;

        case 'createnotifications':
            require __DIR__ . '/../app/views/user/createnotifications.php';
            break;

        case 'myactivitiescreated':
            require __DIR__ . '/../app/views/user/myactivitiescreated.php';
            break;

        case 'myrewardscreated':
            require __DIR__ . '/../app/views/user/myrewardscreated.php';
            break;

        case 'community':
            require __DIR__ . '/../app/views/user/community.php';
            break;

        case 'redeem':
            require __DIR__ . '/../app/actions/redeem.php';
            break;

        case 'loginprocess':
            require __DIR__ . '/../app/actions/login.php';
            break;

        default:
            http_response_code(404);
            require __DIR__ . '/../app/views/errors/404.php';
            break;
    }
    
?>