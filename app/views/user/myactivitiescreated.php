<?php
include __DIR__ . '/../../config/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Activities Created</title>

    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/user-header.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/sidebar.css">

    <script src="/assets/js/sidebar.js" defer></script>

    <link rel="stylesheet" href="/assets/css/myactivitiescreated.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <script src="/assets/js/myactivitiescreated.js" defer></script>
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
                    <h2>My Activities Created</h2>
                    <p class="page-sub">Dashboard &rsaquo; My Activities Created</p>
                </div>

                <a href="#" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    Create Activity
                </a>
            </div>

            <!-- Filters -->
            <div class="filter-row">

                <div class="filter-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" id="createdSearch" placeholder="Search activity title">
                </div>

                <select id="createdStatus" aria-label="Filter by status">
                    <option value="">All statuses</option>
                    <option value="Open">Open</option>
                    <option value="Closed">Closed</option>
                    <option value="Draft">Draft</option>
                </select>

                <button type="button" class="btn btn-ghost" id="createdReset">
                    <i class="fa-solid fa-rotate-left"></i>
                    Reset
                </button>

            </div>

            <!-- Activities table -->
            <div class="table-card">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Activity</th>
                            <th>Points</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Participants</th>
                            <th>Completions</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="createdBody">
                        <tr class="table-placeholder">
                            <td colspan="9">Activities you create will show up here.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav class="pager" aria-label="Activity pages">
                <button type="button" class="pager-btn" aria-label="Previous page">&#8249;</button>
                <button type="button" class="pager-btn is-current">1</button>
                <button type="button" class="pager-btn">2</button>
                <button type="button" class="pager-btn">3</button>
                <button type="button" class="pager-btn" aria-label="Next page">&#8250;</button>
            </nav>

        </main>

    </div>

    <!-- Footer -->
    <?php
    include __DIR__ . '/../../layouts/footer.php';
    ?>

</body>

</html>
