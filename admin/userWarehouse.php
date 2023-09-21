<?php
$css = array('../styles/admin.css');
$current = 'profile';
$current_nav = 'userWarehouse';
include('../includes/header.php');
include('./includes/nav_user.php');
if (!$session->is_signed_in() || $current_permissions != "user" || $current_state != 1) {
  redirect("../index.php");
}
?>
<!-- ================ Merch list ================= -->
<div id="Users-container" class="container">
  <h1 class="py-3 center">Productos en almacén</h1>
  <ul id="users-list">
    <li class="merch-user-card center">
      <span class="accent">Mercancia</span>
      <span class="accent">Precio por unidad($)</span>
      <span class="accent">Estado</span>
    </li>

    <?php
    $merchandise = Merch::find_all_merch();
    foreach ($merchandise as $merch) {
      echo '<li class="merch-user-card center">';
      echo '<span>' . $merch->merch_name . '</span>';
      echo '<span>' . $merch->price . '</span>';
      echo '<span>' . $merch->status . '</span>';
      echo '</li>';
    }
    ?>
    <li class="users-card">
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