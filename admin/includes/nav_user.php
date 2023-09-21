<div class="navigation">
    <ul>
        <li <?php
            if (isset($current_nav) && $current_nav == 'userProfile') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="userProfile.php">
                <span class="icon">
                    <i class="fas fa-solid fa-unlock"></i>
                </span>
                <span class="title">
                    <h2><?php echo ($current_name) ?></h2>
                </span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'userWarehouse') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="./userWarehouse.php">
                <span class="icon">
                    <i class="fas fa-solid fa-hammer"></i>
                </span>
                <span class="title">Almacen</span>
            </a>
        </li>

        <li>
            <a href="/UNA/admin/includes/logout.php">
                <span class="icon">
                    <i class="fas fa-solid fa-door-closed"></i>
                </span>
                <span class="title">Salir</span>
            </a>
        </li>
    </ul>
</div>

<div class="container">
    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">

            <div class="top-item">
                <ul>
                    <h4><?php echo ($current_name) ?></h4>
                    <li>Qué bueno tenerte de vuelta, cuéntanos ¿Qué deseas adquirir?</li>
                </ul>
            </div>
        </div>