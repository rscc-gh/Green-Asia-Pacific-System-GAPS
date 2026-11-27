<?php

include __DIR__ . '/../../config/conn.php';

// Retrieve all badges
$query = "SELECT * FROM badges";
$result = mysqli_query($conn, $query);

// Group badges by category
$badges = [
    'Events' => [],
    'Goals' => [],
    'Streak' => []
];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {

        if ($row['events_required'] != 0) {
            $badges['Events'][] = $row;
        } else if ($row['goals_required'] != 0) {
            $badges['Goals'][] = $row;
        } else if ($row['streak_required'] != 0) {
            $badges['Streak'][] = $row;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="/RWDD2507/public/assets/css/global.css">
    <link rel="stylesheet" href="/RWDD2507/public/assets/css/user-header.css">
    <link rel="stylesheet" href="/RWDD2507/public/assets/css/footer.css">
    <link rel="stylesheet" href="/RWDD2507/public/assets/css/sidebar.css">

    <script src="/RWDD2507/public/assets/js/sidebar.js" defer></script>

    <link rel="stylesheet" href="/RWDD2507/public/assets/css/badges.css">

    <script src="/RWDD2507/public/assets/js/badges.js" defer></script>
</head>

<body>

    <!-- Header -->
    <?php
    include __DIR__ . '/../../layouts/user-header.php';
    ?>

    <!-- Main Layout + Sidebar -->
    <div class="main-layout">

        <!-- Sidebar -->
        <?php
        include __DIR__ . '/../../layouts/sidebar.php';
        ?>

        <!-- Main Body -->
        <main>

            <div class="badges-page">

                <h1>All Badges</h1>

                <?php foreach ($badges as $category => $categoryBadges): ?>

                    <section class="badge-section">

                        <div class="category-heading">

                            <h3 class="category-title">
                                <?php echo htmlspecialchars($category); ?> Badges
                            </h3>

                            <div class="info-wrapper">

                                <button type="button" class="info-btn"
                                    onclick="toggleInfo(this)">
                                    i
                                </button>

                                <div class="info-popup">
                                    <?php
                                    $info = [
                                        'Events' => 'Earn these badges by participating in eco-friendly events on the Activities page.',
                                        'Goals' => 'Earn these badges by completing GAPS goals on the Goals page.',
                                        'Streak' => 'Earn these badges by logging in consecutively.'
                                    ];

                                    echo htmlspecialchars($info[$category]);
                                    ?>
                                </div>

                            </div>

                        </div>

                        <?php if (empty($categoryBadges)): ?>

                            <p>No badges available.</p>

                        <?php else: ?>

                            <div class="badge-scroll">

                                <div class="badge-container">

                                    <?php foreach ($categoryBadges as $badge): ?>

                                        <div class="badge-card">

                                            <img
                                                src="<?php echo htmlspecialchars($badge['image_path']); ?>"
                                                alt="<?php echo htmlspecialchars($badge['badge_name']); ?>"
                                                class="badge-image">

                                            <p class="badge-name">
                                                <?php echo htmlspecialchars($badge['badge_name']); ?>
                                            </p>

                                            <a
                                                href="#"
                                                class="badge-details-btn"
                                                onclick="showBadgeDetails(event, this)"
                                                data-name="<?php echo htmlspecialchars($badge['badge_name'], ENT_QUOTES); ?>"
                                                data-events="<?php echo (int)$badge['events_required']; ?>"
                                                data-goals="<?php echo (int)$badge['goals_required']; ?>"
                                                data-streak="<?php echo (int)$badge['streak_required']; ?>">
                                                Click to view details
                                            </a>

                                        </div>

                                    <?php endforeach; ?>

                                </div>

                            </div>

                        <?php endif; ?>

                    </section>

                <?php endforeach; ?>

            </div>


            <!-- Badge Details Modal -->
            <div id="badgeModal" class="badge-modal">

                <div class="badge-modal-content">

                    <button
                        type="button"
                        class="close-modal"
                        onclick="closeBadgeDetails()">
                        &times;
                    </button>

                    <h2 id="modalBadgeName"></h2>

                    <p id="modalBadgeRequirement"></p>

                </div>

            </div>

        </main>

    </div>

    <!-- Footer -->
    <?php
    include __DIR__ . '/../../layouts/footer.php';
    ?>

</body>

</html>