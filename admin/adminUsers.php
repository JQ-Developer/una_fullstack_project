<?php
$css = array('/UNA/styles/admin.css');
$current = 'profile';
$current_nav = 'adminUsers';
include('../includes/header.php');
include('./includes/nav.php');
if (!$session->is_signed_in() || $current_permissions != "admin" || $current_state != 1) {
  redirect("../signin.php");
}
?>
<!-- ================ Users Details List ================= -->
<div id="Users-container" class="container">
  <h1 class="py-3">Lista de usuarios</h1>
  <ul id="users-list">
    <li class="users-card">
      <span class="name accent">Nombre</span>
      <span class="user-rights accent">Permisos</span>
      <span class="user-email accent">Email</span>
      <span class="user-age accent">Edad</span>
      <span class="user-options accent">Opciones</span>
    </li>
    <?php
    $users = Users::find_this_query("SELECT * FROM usuarios");
    foreach ($users as $user) {
      echo '<li class="users-card">';
      echo '<span class="name">' . $user->username . '</span>';
      echo '<span class="user-rights">' . $user->permissions . '</span>';
      echo '<span class="user-email">' . $user->email . '</span>';
      echo '<span class="user-age">' . $user->age . '</span>';
      echo '
      <h4 class="user-options primary"><a href="./admin_user_edit.php?id=' . $user->id . '">Editar</a></h4>';
      echo '</li>';
    }
    ?>
  </ul>

  <h4 class="center .add_user_txt "><a href="/UNA/admin/admin_user_add.php">Añadir un usuario</a></h4>

</div>
</div>
</div>
</body>
<a href=""></a>

</html>