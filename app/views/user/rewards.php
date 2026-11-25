<?php
include __DIR__ . '/../../config/conn.php';

/*
$_SESSION['user_id'] = 4;
$_SESSION['user_role'] = "member";
*/

$query = "SELECT * FROM rewards WHERE status = 'Active'";

$result = mysqli_query($conn, $query);

$isMember = isset($_SESSION['user_id']) && ($_SESSION['user_role'] === "member");
$totalPoints = 0;

if ($isMember) {
    $pointsQuery = "SELECT SUM(points) AS total_points FROM points_ledger WHERE user_id = '{$_SESSION['user_id']}'";
    $pointsResult = mysqli_query($conn, $pointsQuery);
    $pointsRow = mysqli_fetch_assoc($pointsResult);
    $totalPoints = (int)($pointsRow['total_points'] ?? 0);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rewards</title>

    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/user-header.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/sidebar.css">

    <script src="/assets/js/sidebar.js" defer></script>

    <link rel="stylesheet" href="/assets/css/rewards.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <script src="/assets/js/rewards.js" defer></script>
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

            <!-- Reward Header -->
            <div class="reward-header">

                <h2>Rewards</h2>

                <div class="view-toggle">
                    <button type="button" data-view="list" title="List View">
                        <i class="fa-solid fa-list"></i>
                    </button>

                    <button type="button" data-view="grid" class="active" title="Grid View">
                        <i class="fa-solid fa-grip"></i>
                    </button>
                </div>

            </div>

            <!-- Rewards -->
            <div class="rewards"
                data-is-member="<?= $isMember ? '1' : '0' ?>"
                data-user-points="<?= $totalPoints ?>">

                <?php if (mysqli_num_rows($result) > 0): ?>

                    <?php
                    while ($reward = mysqli_fetch_assoc($result)):
                    ?>

                        <div class="reward-card">

                            <img src="<?= htmlspecialchars($reward['image_path']) ?>"
                                alt="<?= htmlspecialchars($reward['title']) ?>">

                            <h3>
                                <?= htmlspecialchars($reward['title']) ?>
                            </h3>

                            <a
                                href="#"
                                class="reward-details"
                                data-id="<?= (int) $reward['reward_id'] ?>"
                                data-title="<?= htmlspecialchars($reward['title'], ENT_QUOTES) ?>"
                                data-discount="<?= (int) $reward['discount'] ?>"
                                data-rebate="<?= (int) $reward['rebate'] ?>"
                                data-terms="<?= htmlspecialchars($reward['terms'] ?? '', ENT_QUOTES) ?>"
                                data-image="<?= htmlspecialchars($reward['image_path'], ENT_QUOTES) ?>"
                                data-expiry_date="<?= htmlspecialchars($reward['expiry_date'] ?? 'None', ENT_QUOTES) ?>"
                                data-points="<?= (int) $reward['point_cost'] ?>"
                                data-quantity="<?= (int) $reward['quantity'] ?>">Click to see details</a>

                        </div>

                    <?php endwhile; ?>

                <?php else: ?>

                    <p>No Rewards Yet. Come back later!</p>

                <?php endif; ?>

            </div>

        </main>

    </div>



    <!-- Footer -->
    <?php
    include __DIR__ . '/../../layouts/footer.php';
    ?>

    <!-- Rewards Popup -->
    <div class="modal-overlay" id="modal">
        <div class="modal">
            <button type="button" id="closeBtn">&times;</button>

            <img id="modalImage" src="" alt="">
            <h3 id="modalTitle"></h3>
            <p>Discount: <span id="modalDiscount"></span>%</p>
            <p>Rebate: RM <span id="modalRebate"></span></p>
            <p>Points needed: <span id="modalPoints"></span></p>
            <p>Expires: <span id="modalExpiry"></span></p>
            <p id="modalTerms"></p>

            <?php if ($isMember): ?>
                <form method="POST" action="/../../actions/redeem.php">
                    <input type="hidden" name="reward_id" id="modalRewardId">
                    <button type="submit" id="redeemBtn">Redeem</button>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <script>
        const userPoints = <?= $totalPoints ?>;
    </script>

</body>

</html>