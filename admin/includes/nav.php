<div class="navigation">
    <ul>
        <li <?php
            if (isset($current_nav) && $current_nav == 'adminProfile') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>
            <a href="adminProfile.php">
                <span class="icon">
                    <i class="fas fa-solid fa-unlock"></i>
                </span>
                <span class="title">
                    <h2>Administrador</h2>
                </span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'adminUsers') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="/UNA/admin/adminUsers.php">
                <span class="icon">
                    <i class="fas fa-solid fa-users"></i>
                </span>
                <span class="title">Usuarios</span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'adminWarehouse') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="/UNA/admin/adminWarehouse.php">
                <span class="icon">
                    <i class="fas fa-solid fa-hammer"></i>
                </span>
                <span class="title">Almacen</span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'adminPermitions') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="/UNA/admin/adminPermissions.php">
                <span class="icon">
                    <i class="fas fa-solid fa-key"></i>
                </span>
                <span class="title">Permisos</span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'adminAgency') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="/UNA/admin/adminAgency.php">
                <span class="icon">
                    <i class="fas fa-solid fa-address-card"></i>
                </span>
                <span class="title">Agencias</span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'adminReports') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="/UNA/admin/adminReports.php">
                <span class="icon">
                    <i class="fas fa-solid fa-envelope-open-text"></i>
                </span>
                <span class="title">Reportes</span>
            </a>
        </li>

        <li <?php
            if (isset($current_nav) && $current_nav == 'adminData') {
                echo ('class="nav-current"');
            } else {
                echo ('class=""');
            } ?>>

            <a href="./adminData.php">
                <span class="icon">
                    <i class="fas fa-solid fa-database"></i>
                </span>
                <span class="title">Respaldos</span>
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
                    <li>
                        <h4>
                            <?php echo ($current_name) ?>
                        </h4>
                    </li>
                    <li>Administrador</li>
                </ul>
            </div>
        </div>