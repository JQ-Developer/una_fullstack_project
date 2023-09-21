<?php
$css = array('../styles/admin.css');
$current = 'profile';
$current_nav = 'adminPermitions';
include('../includes/header.php');
include('./includes/nav.php');
if (!$session->is_signed_in() || $current_permissions != "admin" || $current_state != 1) {
  redirect("../signin.php");
}

if (isset($_POST['submit'])) {

  $accepted_user = trim($_POST['user_id']);
  $accepted_status = trim($_POST['user_accept']);
  $changed_status = trim($_POST['accept_as']);

  if (isset($_POST['accept_as']) && $_POST['accept_as'] != "") {
    $user = Users::find_user_by_id($accepted_user);
    $user->approved = 1;
    $user->permissions = $changed_status;
    $user->update();
  } else {
    $user = Users::find_user_by_id($accepted_user);
    $user->approved = 1;
    $user->permissions = $accepted_status;
    $user->update();
  }
} elseif (isset($_POST['delete_user'])) {

  $user_for_delete = trim($_POST['user_id']);
  $deleted_user = Users::find_user_by_id($user_for_delete);
  $deleted_user->delete();
} elseif (isset($_POST['change_permissions'])) {

  $user = trim($_POST['user_id']);
  $changed_status = trim($_POST['change_permission']);
  $changed_user = Users::find_user_by_id($user);
  $changed_user->permissions = $changed_status;
  $changed_user->update();
}
?>

<!-- ================ Users Card ================= -->
<div class="container">
  <h1 class="py-3">Usuarios pendientes de aprobación</h1>
  <div class="cards-container">
    <?php
    $users = Users::find_this_query("SELECT * FROM usuarios WHERE approved = '0'");
    foreach ($users as $user) {
      echo '<div class="card">';
      echo '<div class="card-data">';
      echo '<div>' . $user->username . '</div>';
      echo '<div>' . $user->email . '</div>';
      echo '<div>Solicitando: ' . $user->permissions . '</div>';
      echo '<div class="card-buttons">';
      echo '<form class="" action="" method="post">';
      echo '<input type="submit" name="submit" value="Aceptar" class="accept-btn" />';
      echo '<input type="submit" name="delete_user" value="Rechazar" class="deny-btn" />';
      echo '<input type="hidden" name="user_id" value="' . $user->id . '" />';
      echo '<input type="hidden" name="user_accept" value="' . $user->permissions . '" />';
      echo '<select name="accept_as">';
      echo '<option value="" selected>Aceptar como:</option>';
      echo '<option value="user">Usuario</option>';
      echo '<option value="tech">Técnico</option>';
      echo '<option value="operator">Operador</option>';
      echo '<option value="admin">Administrador</option>';
      echo '</select>';
      echo '</form>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }

    if (empty(Users::find_this_query("SELECT * FROM usuarios WHERE approved = '0'"))) {
      echo '<h3>No hay usuarios pendientes de aprobación.</h3>';
    }

    ?>
  </div>
  <h1 class="py-3">Usuarios con permisos especiales</h1>
  <div class="cards-container">
    <?php
    $users = Users::find_this_query("SELECT * FROM usuarios WHERE approved = '1' AND permissions != 'user'");
    foreach ($users as $user) {
      echo '<div class="card">';
      echo '<div class="card-data">';
      echo '<div>' . $user->username . '</div>';
      echo '<div>' . $user->email . '</div>';
      echo '<div class="card-buttons">';
      echo '<form class="" action="" method="post">';
      echo '<input type="hidden" name="user_id" value="' . $user->id . '" />';
      echo '<select name="change_permission" id="">';

      echo '<option value="user"';
      if ($user->permissions === 'user') {
        echo ('selected');
      } else {
        echo ('');
      }
      echo '>Usuario</option>';

      echo '<option value="tech"';
      if ($user->permissions == 'tech') {
        echo ('selected');
      } else {
        echo ('');
      }
      echo '>Técnico</option>';

      echo '<option value="operator"';
      if ($user->permissions == 'operator') {
        echo ('selected');
      } else {
        echo ('');
      }
      echo '>Operador</option>';

      echo '<option value="admin"';
      if ($user->permissions == 'admin') {
        echo ('selected');
      } else {
        echo ('');
      }
      echo '>Administración</option>';

      echo '</select>';
      echo '<div/>';
      echo '<input type="submit" name="change_permissions" value="Aceptar" class="accept-btn my-1" />';
      echo '</div>';
      echo '</form>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    ?>
  </div>
</div>
</div>
</div>
</body>

</html>