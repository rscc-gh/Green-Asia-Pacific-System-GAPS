<?php
include __DIR__ . '/../../config/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Rewards Created</title>

    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/user-header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">

    <script src="assets/js/sidebar.js" defer></script>

    <link rel="stylesheet" href="assets/css/myrewardscreated.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <script src="assets/js/myrewardscreated.js" defer></script>
</head>

<body>


    <?php
    include __DIR__ . '/../../layouts/user-header.php';
    ?>


    <div class="main-layout">


        <?php
        include __DIR__ . '/../../layouts/sidebar.php';
        ?>


        <main class="page-main">

            <div class="page-head">
                <div>
                    <h2>My Rewards Created</h2>
                    <p class="page-sub">Dashboard &rsaquo; My Rewards Created</p>
                </div>

                <a href="#" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    Create Reward
                </a>
            </div>


            <div class="filter-row">

                <div class="filter-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" id="rewardSearch" placeholder="Search reward title">
                </div>

                <select id="rewardStatus" aria-label="Filter by status">
                    <option value="">All statuses</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Expired">Expired</option>
                </select>

                <button type="button" class="btn btn-ghost" id="rewardReset">
                    <i class="fa-solid fa-rotate-left"></i>
                    Reset
                </button>

            </div>


            <div class="table-card">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Reward</th>
                            <th>Points Cost</th>
                            <th>Quantity Left</th>
                            <th>Claimed</th>
                            <th>Expiry</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="rewardBody">
                        <tr class="table-placeholder">
                            <td colspan="8">Rewards you create will show up here.</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <nav class="pager" aria-label="Reward pages">
                <button type="button" class="pager-btn" aria-label="Previous page">&#8249;</button>
                <button type="button" class="pager-btn is-current">1</button>
                <button type="button" class="pager-btn">2</button>
                <button type="button" class="pager-btn">3</button>
                <button type="button" class="pager-btn" aria-label="Next page">&#8250;</button>
            </nav>

        </main>

    </div>


    <?php
    include __DIR__ . '/../../layouts/footer.php';
    ?>

</body>

</html>