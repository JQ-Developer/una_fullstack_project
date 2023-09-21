<div class="navigation">
    <ul>
        <li <?php
            if (isset($current_nav) && $current_nav == 'techProfile') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="techProfile.php">
                <span class="icon">
                    <i class="fas fa-solid fa-unlock"></i>
                </span>
                <span class="title">
                    <h2>Técnico</h2>
                </span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'techWarehouse') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="./techWarehouse.php">
                <span class="icon">
                    <i class="fas fa-solid fa-hammer"></i>
                </span>
                <span class="title">Almacen</span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'techData') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="./techData.php">
                <span class="icon">
                    <i class="fas fa-solid fa-database"></i>
                </span>
                <span class="title">Respaldos</span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'techReports') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="techReports.php">
                <span class="icon">
                    <i class="fas fa-solid fa-envelope-open-text"></i>
                </span>
                <span class="title">Reportes</span>
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
                    <li>Técnico</li>
                </ul>
            </div>
        </div>