<?php
include __DIR__ . '/../../config/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Announcements</title>

    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/user-header.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/sidebar.css">

    <script src="/assets/js/sidebar.js" defer></script>

    <link rel="stylesheet" href="/assets/css/createnotifications.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <script src="/assets/js/createnotifications.js" defer></script>
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
                    <h2>Create Announcements</h2>
                    <p class="page-sub">Admin &rsaquo; Announcements</p>
                </div>
            </div>


            <form class="compose-card" id="notifyForm">

                <textarea id="notifyMessage" name="content" rows="6" maxlength="255"
                    placeholder="Write the announcement here..."></textarea>

                <div class="compose-foot">
                    <span class="compose-count" id="notifyCount">0 / 255</span>

                    <div class="compose-actions">
                        <button type="button" class="btn btn-primary" id="notifySend">
                            Send Announcement
                        </button>
                        <button type="button" class="btn btn-ghost">Cancel</button>
                    </div>
                </div>

            </form>


            <div class="filter-row">
                <div class="filter-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" id="announcementSearch" placeholder="Search announcements">
                </div>
            </div>


            <div class="table-card">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Announcements</th>
                            <th>Date Sent</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="announcementsBody">
                        <tr class="table-placeholder">
                            <td colspan="4">No announcements sent yet.</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <nav class="pager" aria-label="Announcement pages">
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
