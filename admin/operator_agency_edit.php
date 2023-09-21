<?php
$css = array('../styles/admin.css', '../styles/signup.css');
$current = 'profile';
$current_nav = 'operatorAgency';
include('../includes/header.php');
include('./includes/nav_operator.php');
if (!$session->is_signed_in() || $current_permissions != "operator" || $current_state != 1) {
  redirect("../index.php");
}

if (empty($_GET['id'])) {
  redirect("/UNA/index.php");
} else {
  $agency = Agency::find_agency_by_id($_GET['id']);
  if (isset($_POST['submit'])) {
    if ($agency) {
      $agency->name = $_POST['name'];
      $agency->responsible = $_POST['responsible'];
      $agency->assets = $_POST['assets'];
      $agency->email = $_POST['email'];
      $agency->address = $_POST['address'];
      $agency->telf = $_POST['telf'];
      $agency->save();
      redirect("/UNA/admin/operatorAgency.php");
    }
  } elseif (isset($_POST['delete'])) {
    $agency->delete();
    redirect("/UNA/admin/operatorAgency.php");
  }
}


?>
<!-- ================ Users Details  ================= -->
<div id="Users-container" class="container">
  <div id="merch-form" class="container">
    <h1 class="py-3 center">Editar agencia: <?php echo ($agency->name); ?></h1>
    <form action="" method="post">
      <div class="user-details">
        <div class="column">
          <div class="txt_field">
            <input type="text" name="name" id="" value="<?php echo ($agency->name); ?>" required />
            <span></span>
            <label for="">Nombre de la Agencia</label>
          </div>
          <div class="txt_field">
            <input type="text" name="address" value="<?php echo ($agency->address); ?>" required />
            <span></span>
            <label for="">Dirección</label>
          </div>
          <div class="txt_field">
            <input type="text" name="email" value=" <?php echo ($agency->email); ?>" required />
            <span></span>
            <label for="">Email</label>
          </div>
        </div>
        <div class="column">
          <div class="txt_field">
            <input type="number" name="telf" value="<?php echo ($agency->telf); ?>" required />
            <span></span>
            <label for="">Número de telefono</label>
          </div>
          <div class="txt_field">
            <input type="text" name="responsible" value=" <?php echo ($agency->responsible); ?>" required />
            <span></span>
            <label for="">Responsable</label>
          </div>
          <div class="txt_field">
            <input type="number" step=".01" name="assets" value="<?php echo ($agency->assets); ?>" required />
            <span></span>
            <label for="">Activos ($)</label>
          </div>
        </div>
      </div>
      <div class="center my-1">
        <input type="submit" name="submit" value="Guardar" class="btn" />
      </div>
      <div class="center">
        <input type="submit" name="delete" value="Eliminar" class="btn" />
      </div>
    </form>
  </div>
</div>
</div>
</div>
</body>

</html>