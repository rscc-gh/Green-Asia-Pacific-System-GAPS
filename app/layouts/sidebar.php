<?php

$currentPage = $_GET['page'] ?? 'home';

$pages = [
    'admin' => ['allstatistics', 'manageaccounts', 'createnotifications', 'myactivitiescreated', 'myrewardscreated', 'flaggedposts'],
    'moderator' => ['pendingactivities', 'pendingposts', 'pendingrewards', 'flaggedposts', 'activitycompletion'],
    'business' => ['mystatistics', 'verifyreward', 'myactivitiescreated', 'myposts', 'myrewardscreated'],
    'member' => ['myactivitiesjoined', 'myposts', 'myrewardsredeemed', 'mybadges', 'mypoints']
];

$pageNames = [
    'admin' => ['All Statistics', 'Manage Accounts', 'Create Notifications', 'My Activities', 'My Rewards', 'Flagged Posts'],
    'moderator' => ['Pending Activities', 'Pending Posts', 'Pending Rewards', 'Flagged Posts', 'Activity Completions'],
    'business' => ['My Statistics', 'Verify Voucher', 'My Activities', 'My Posts', 'My Rewards'],
    'member' => ['My Activities', 'My Posts', 'My Rewards', 'My Badges', 'My Points']
];

$pageArray = [];
$pageNameArray = [];

if (isset($_SESSION['user_id']) && isset($_SESSION['user_role'])) {
    $pageArray = $pages[$_SESSION['user_role']];
    $pageNameArray = $pageNames[$_SESSION['user_role']];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
</head>

<body>

    <aside class="sidebar closed" id="sidebar">

        <!-- Main Navigation -->
        <nav class="sidebar-nav">
            
            <?php for ($i = 0; $i < count($pageArray); $i++): ?>
                <a href="/RWDD2507/public/?page=<?= $pageArray[$i] ?>" class="nav-link">
                    <?= $pageNameArray[$i] ?>
                </a>
            <?php endfor; ?>
            
            <a href="/RWDD2507/public/?page=badges" class="nav-link">Badges</a>
            <a href="/RWDD2507/public/?page=leaderboard" class="nav-link">Leaderboard</a>
        </nav>

        <!-- Logout Button -->
        <nav class="sidebar-bottom">
            <a href="/RWDD2507/public/?page=logout" class="nav-link logout-link">Logout</a>
        </nav>

    </aside>

</body>

</html>