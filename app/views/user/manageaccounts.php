<?php
include __DIR__ . '/../../config/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Accounts</title>

    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/user-header.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/sidebar.css">

    <script src="/assets/js/sidebar.js" defer></script>

    <link rel="stylesheet" href="/assets/css/manageaccounts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <script src="/assets/js/manageaccounts.js" defer></script>
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
                    <h2>Manage Accounts</h2>
                    <p class="page-sub">Admin &rsaquo; Manage Accounts</p>
                </div>

                <a href="#" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    Create Account
                </a>
            </div>

            <!-- Filters -->
            <div class="filter-row">

                <div class="filter-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" id="accountSearch" placeholder="Search username, name or email">
                </div>

                <select id="roleFilter" aria-label="Filter by role">
                    <option value="">All roles</option>
                    <option value="admin">Admin</option>
                    <option value="moderator">Moderator</option>
                    <option value="business">Business</option>
                    <option value="member">Member</option>
                </select>

                <select id="statusFilter" aria-label="Filter by status">
                    <option value="">All statuses</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Banned">Banned</option>
                </select>

            </div>

            <!-- Accounts table -->
            <div class="table-card">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="accountsBody">
                        <tr class="table-placeholder">
                            <td colspan="7">Accounts will show up here.</td>
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
