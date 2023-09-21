<?php
$css = array('../styles/admin.css');
$current = 'profile';
$current_nav = 'operatorData';
include('../includes/header.php');
include('./includes/nav_operator.php');
include('./includes/backup.php');
if (!$session->is_signed_in() || $current_permissions !== "operator" || $current_state != 1) {
  redirect("../index.php");
}

$the_message = "";
if (isset($_POST['backup'])) {
  $the_message = "Seleccione una opción primero.";

  if ($_POST['backup_type'] === 'agencias' || $_POST['backup_type'] === 'warehouse') {
    backup($_POST['backup_type']);
    $the_message = 'Respaldo de la tabla de' . ($_POST['backup_type']) . 'hecha.';
  }
}
?>

<!-- ================ DATA  ================= -->
<div class="container">
  <h1 class="py-3">Hacer un respaldo</h1>
  <p>Puede generar un respaldo de las tablas individuales para garantizar la seguridad de sus datos. Si prefiere respaldar tablas específicas, puede generar un respaldo de las tablas "agencias" y "almacen". Mantener copias de seguridad es esencial para proteger su información y asegurar su disponibilidad en caso de eventualidades.
  </p>
  <form action="" method="post">
    <div class="reports-container">
      Información generada a la zona horaria para Caracas. UTC -4.
      Venezuelan Standard Time (VET).

      <div class="reports-selection">
        <div class="reports-description">
          <div>Seleccionar datos a respaldar:</div>
        </div>

        <div class="reports-options">
          <div class="option">
          </div>
          <div class="option">
            <select name="backup_type" id="">
              <option value="">--Seleccionar data--</option>
              <option value="agencias">Agencias</option>
              <option value="warehouse">Almacén</option>
            </select>
          </div>
        </div>
      </div>
      <div class="reports-button center">
        <button type="submit" class="btn" name="backup">Aceptar</button>
      </div>
    </div>
  </form>
  <h4 class="center"><?php echo ($the_message); ?></h4>
</div>
</div>
</div>
</body>

</html>