<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
</head>

<body>

    <?php
    $currentPage = $_GET['page'] ?? 'home';
    ?>

    <aside class="sidebar closed" id="sidebar">

        <!-- Navigation -->
        <nav class="sidebar-nav">

            <a href="/RWDD2507/public/?page=dashboard" class="nav-link <?= $currentPage == 'page1' ? 'active' : '' ?>">Page 1</a>

            <a href="/RWDD2507/public/?page=dashboard" class="nav-link <?= $currentPage == 'page2' ? 'active' : '' ?>">Page 2</a>

            <a href="/RWDD2507/public/?page=dashboard" class="nav-link <?= $currentPage == 'page3' ? 'active' : '' ?>">Page 3</a>

        </nav>

    </aside>

</body>

</html>