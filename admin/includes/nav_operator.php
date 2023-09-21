<div class="navigation">
    <ul>
        <li <?php
            if (isset($current_nav) && $current_nav == 'operatorProfile') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>
            <a href="operatorProfile.php">
                <span class="icon">
                    <i class="fas fa-solid fa-unlock"></i>
                </span>
                <span class="title">
                    <h2>Operador</h2>
                </span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'operatorUsers') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>
            <a href="./operatorUsers.php">
                <span class="icon">
                    <i class="fas fa-solid fa-users"></i>
                </span>
                <span class="title">Usuarios</span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'operatorWarehouse') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>
            <a href="./operatorWarehouse.php">
                <span class="icon">
                    <i class="fas fa-solid fa-hammer"></i>
                </span>
                <span class="title">Almacen</span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'operatorAgency') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>
            <a href="./operatorAgency.php">
                <span class="icon">
                    <i class="fas fa-solid fa-address-card"></i>
                </span>
                <span class="title">Agencias</span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'operatorReports') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="operatorReports.php">
                <span class="icon">
                    <i class="fas fa-solid fa-envelope-open-text"></i>
                </span>
                <span class="title">Reportes</span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'operatorData') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="./operatorData.php">
                <span class="icon">
                    <i class="fas fa-solid fa-database"></i>
                </span>
                <span class="title">Respaldos</span>
            </a>
        </li>

        <li>
            <a href="./includes/logout.php">
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
                    <li>Operador</li>
                </ul>
            </div>
        </div>