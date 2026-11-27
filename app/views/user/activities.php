<?php
include __DIR__ . '/../../config/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities</title>

    <link rel="stylesheet" href="/RWDD2507/public/assets/css/global.css">
    <link rel="stylesheet" href="/RWDD2507/public/assets/css/user-header.css">
    <link rel="stylesheet" href="/RWDD2507/public/assets/css/footer.css">
    <link rel="stylesheet" href="/RWDD2507/public/assets/css/sidebar.css">

    <script src="/RWDD2507/public/assets/js/sidebar.js" defer></script>
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
            <h>You can scroll down!</h>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <h>You can scroll down!</h>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <h>You can scroll down!</h>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <h>You can scroll down!</h>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <h>You can scroll down!</h>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <h>You can scroll down!</h>
        </main>

    </div>

    <!-- Footer -->
    <?php
    include __DIR__ . '/../../layouts/footer.php';
    ?>

</body>

</html>