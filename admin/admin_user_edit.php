<?php
$css = array('/UNA/styles/admin.css', '/UNA/styles/signin.css', '/UNA/styles/signup.css');
$current = 'profile';
$current_nav = 'adminUsers';
include('../includes/header.php');
include('./includes/nav.php');
if (!$session->is_signed_in() || $current_permissions != "admin" || $current_state != 1) {
  redirect("../signin.php");
}

if (empty($_GET['id'])) {
  redirect("/UNA/index.php");
} else {
  $user = Users::find_user_by_id($_GET['id']);
  if (isset($_POST['submit'])) {
    if ($user) {
      $user->username = $_POST['username'];
      $user->email = $_POST['email'];
      $user->age = $_POST['age'];
      $user->pwd = $_POST['pwd'];
      $user->permissions = $_POST['permissions'];

      $user->save();
    }
  } elseif (isset($_POST['delete'])) {
    $user->delete();
    redirect("/UNA/admin/adminUsers.php");
  }
}




?>
<!-- ================ Users Details  ================= -->
<div id="Users-container" class="container">
  <div id="merch-form" class="container">
    <h1 class="py-3 center">Editar usuario</h1>
    <form class="forma my-1" action="" method="post">
      <div class="txt_field">
        <input type="text" name="username" id="" value="<?php echo ($user->username) ?>" />
        <span></span>
        <label for="">Nombre</label>
      </div>
      <div class="txt_field">
        <input type="text" name="email" id="" value="<?php echo ($user->email) ?>" />
        <span></span>
        <label for="">Email</label>
      </div>
      <div class="txt_field">
        <input type="number" name="age" id="" value="<?php echo ($user->age) ?>" />
        <span></span>
        <label for="">Edad</label>
      </div>
      <div class="txt_field">
        <input type="text" name="pwd" id="" value="<?php echo ($user->pwd) ?>" />
        <span></span>
        <label for="">Contraseña</label>
      </div>
      <h4 class="center">Permisos</h4>
      <div class="status-selection py-1">
        <div class="select">
          <select name="permissions">
            <option value="user" <?php
                                  if ($user->permissions == 'user') {
                                    echo ('selected');
                                  } else {
                                    echo ('');
                                  }
                                  ?>>Usuario</option>
            <option value="tech" <?php
                                  if ($user->permissions == 'tech') {
                                    echo ('selected');
                                  } else {
                                    echo ('');
                                  }
                                  ?>>Técnico</option>
            <option value="operator" <?php
                                      if ($user->permissions == 'operator') {
                                        echo ('selected');
                                      } else {
                                        echo ('');
                                      }
                                      ?>>Operador</option>
            <option value="admin" <?php
                                  if ($user->permissions == 'admin') {
                                    echo ('selected');
                                  } else {
                                    echo ('');
                                  }
                                  ?>>Administración</option>
          </select>
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