<?php
$css = array('../styles/admin.css');
$current = 'profile';
$current_nav = 'operatorUsers';
include('../includes/header.php');
include('./includes/nav_operator.php');
if (!$session->is_signed_in() || $current_permissions != "operator" || $current_state != 1) {
  redirect("../index.php");
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
    </li>
    <?php
    $users = Users::find_this_query("SELECT * FROM usuarios");
    foreach ($users as $user) {
      echo '<li class="users-card">';
      echo '<span class="name">' . $user->username . '</span>';
      echo '<span class="user-rights">' . $user->permissions . '</span>';
      echo '<span class="user-email">' . $user->email . '</span>';
      echo '<span class="user-age">' . $user->age . '</span>';
      echo '</li>';
    }
    ?>
  </ul>
</div>
</div>
</div>
</body>

</html>