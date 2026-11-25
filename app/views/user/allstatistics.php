<?php
include __DIR__ . '/../../config/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Statistics</title>

    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/user-header.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/sidebar.css">

    <script src="/assets/js/sidebar.js" defer></script>

    <link rel="stylesheet" href="/assets/css/allstatistics.css">

    <script src="/assets/js/allstatistics.js" defer></script>
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
        <main class="page-main">

            <div class="page-head">
                <div>
                    <h2>All Statistics</h2>
                    <p class="page-sub">An overview of the accounts in GAPS.</p>
                </div>
            </div>

            <!-- Summary -->
            <section class="stat-cards">

                <article class="stat-card" style="--accent:#23845b">
                    <p class="stat-label">Total accounts</p>
                    <p class="stat-value" id="totalAccounts">&mdash;</p>
                    <p class="stat-note">Every registered user</p>
                </article>

                <article class="stat-card" style="--accent:#16a34a">
                    <p class="stat-label">Active</p>
                    <p class="stat-value" id="activeAccounts">&mdash;</p>
                    <p class="stat-note">Accounts in good standing</p>
                </article>

                <article class="stat-card" style="--accent:#dc2626">
                    <p class="stat-label">Inactive or banned</p>
                    <p class="stat-value" id="inactiveAccounts">&mdash;</p>
                    <p class="stat-note">Accounts not in use</p>
                </article>

                <article class="stat-card" style="--accent:#2f6fed">
                    <p class="stat-label">Roles in use</p>
                    <p class="stat-value" id="roleTotal">&mdash;</p>
                    <p class="stat-note">Distinct account roles</p>
                </article>

            </section>

            <!-- Charts -->
            <section class="charts">

                <!-- Donut: accounts by role -->
                <article class="chart-card">

                    <h3>Accounts by role</h3>

                    <div class="donut-wrap">
                        <div class="donut" id="roleChart">
                            <div class="donut-center">
                                <span class="donut-total" id="donutTotal">0</span>
                                <span class="donut-caption">accounts</span>
                            </div>
                        </div>
                    </div>

                    <ul class="legend" id="roleLegend"></ul>

                </article>

                <!-- Stacked bar: accounts by status -->
                <article class="chart-card">

                    <h3>Accounts by status</h3>

                    <div class="stack" id="statusChart"></div>

                    <ul class="chips" id="statusLegend"></ul>

                </article>

            </section>

        </main>

    </div>

    <!-- Footer -->
    <?php
    include __DIR__ . '/../../layouts/footer.php';
    ?>

</body>

</html>
