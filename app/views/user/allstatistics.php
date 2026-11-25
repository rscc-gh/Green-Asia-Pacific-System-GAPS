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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

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
                    <h2>All Post Statistics</h2>
                    <p class="page-sub">Admin &rsaquo; Flagged Post Statistics &rsaquo; All Post Statistics</p>
                </div>

                <a href="/?page=manageaccounts" class="btn btn-ghost">
                    <i class="fa-solid fa-arrow-left"></i>
                    Back
                </a>
            </div>

            <!-- Range -->
            <div class="filter-row">

                <div class="filter-field">
                    <label for="dateRange">Date Range</label>
                    <input type="text" id="dateRange" placeholder="Start date &ndash; End date">
                </div>

                <div class="filter-field">
                    <label for="statFilter">Filter</label>
                    <select id="statFilter">
                        <option value="all">All time</option>
                        <option value="week">Last 7 days</option>
                        <option value="month">Last 30 days</option>
                        <option value="year">This year</option>
                    </select>
                </div>

            </div>

            <!-- Summary -->
            <section class="stat-cards">

                <article class="stat-card">
                    <p class="stat-label">Total Posts</p>
                    <p class="stat-value" id="totalPosts">&mdash;</p>
                </article>

                <article class="stat-card">
                    <p class="stat-label">Total Comments</p>
                    <p class="stat-value" id="totalComments">&mdash;</p>
                </article>

                <article class="stat-card">
                    <p class="stat-label">Reported Posts</p>
                    <p class="stat-value" id="reportedPosts">&mdash;</p>
                </article>

                <article class="stat-card">
                    <p class="stat-label">Users' Comments</p>
                    <p class="stat-value" id="userComments">&mdash;</p>
                </article>

            </section>

            <!-- Chart -->
            <section class="chart-card">
                <div class="chart" id="postChart"></div>
                <p class="chart-caption" id="chartCaption">Posts per period</p>
            </section>

            <!-- Detail table -->
            <div class="table-card">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Content</th>
                            <th>Comments</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody id="postRows">
                        <tr class="table-placeholder">
                            <td colspan="6">Post statistics will show up here.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </main>

    </div>

    <!-- Footer -->
    <?php
    include __DIR__ . '/../../layouts/footer.php';
    ?>

</body>

</html>
