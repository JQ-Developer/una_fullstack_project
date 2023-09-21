<?php
$css = array('../styles/admin.css', '../styles/signup.css');
$current = 'profile';
$current_nav = 'operatorAgency';
include('../includes/header.php');
include('./includes/nav_operator.php');
if (!$session->is_signed_in() || $current_permissions != "operator" || $current_state != 1) {
  redirect("../index.php");
}
if (isset($_POST['submit'])) {

  $name = trim($_POST['name']);
  $responsible = trim($_POST['responsible']);
  $assets = trim($_POST['assets']);
  $email = trim($_POST['email']);
  $address = trim($_POST['address']);
  $telf = trim($_POST['telf']);

  //Method to check if merch already exists
  $agency = new Agency();
  $agency->name = $name;
  $agency->responsible = $responsible;
  $agency->assets = $assets;
  $agency->email = $email;
  $agency->address = $address;
  $agency->telf = $telf;
  $agency->create();
  $the_message = "";
  redirect("/UNA/admin/OperatorAgency.php");
} else {
  $name = "";
  $responsible = "";
  $assets = "";
  $email = "";
  $address = "";
  $telf = "";
}

?>
<div class="container">
  <h1 class="py-3">Registrar una agencia</h1>
  <div class="forma">
    <form action="" method="post">
      <div class="user-details">
        <div class="column">
          <div class="txt_field">
            <input type="text" name="name" id="" required />
            <span></span>
            <label for="">Nombre de la Agencia</label>
          </div>
          <div class="txt_field">
            <input type="text" name="address" required />
            <span></span>
            <label for="">Dirección</label>
          </div>
          <div class="txt_field">
            <input type="text" name="email" required />
            <span></span>
            <label for="">Email</label>
          </div>
        </div>
        <div class="column">
          <div class="txt_field">
            <input type="number" name="telf" required />
            <span></span>
            <label for="">Número de telefono</label>
          </div>
          <div class="txt_field">
            <input type="text" name="responsible" required />
            <span></span>
            <label for="">Responsable</label>
          </div>
          <div class="txt_field">
            <input type="number" step=".01" name="assets" required />
            <span></span>
            <label for="">Activos ($)</label>
          </div>
        </div>
      </div>
      <div class="center py-2">
        <input type="submit" value="Registrar" name="submit" class="btn btn-dark" />
      </div>
    </form>
  </div>
</div>

<!-- ================ Agencies list ================= -->
<div id="Users-container" class="container">
  <h1 class="py-1">Lista de agencias</h1>
  <ul id="users-list">
    <li class="agencies-card">
      <span class="accent">Nombre</span>
      <span class="accent">Responsable</span>
      <span class="accent">Contacto</span>
      <span class="accent">Numero</span>
      <span class="accent">Activos ($)</span>
      <span class="accent">Opciones</span>
    </li>

    <?php
    $agencies = Agency::find_all_agencies();
    foreach ($agencies as $agency) {
      echo '<li class="agencies-card">';
      echo '<span>' . $agency->name . '</span>';
      echo '<span>' . $agency->responsible . '</span>';
      echo '<span>' . $agency->email . '</span>';
      echo '<span>' . $agency->telf . '</span>';
      echo '<span>' . $agency->assets . '</span>';
      echo '<span class="accent"><a href="./operator_agency_edit.php?id=' . $agency->id . '">Editar</a></span>';

      echo '</li>';
    }
    ?>

    <li class="agencies-card">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </li>
  </ul>
</div>
</div>
</div>
</body>

</html>