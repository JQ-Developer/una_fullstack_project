<?php
$css = array('../styles/admin.css', '../styles/signin.css', '/UNA/styles/signup.css');
$current = 'profile';
$current_nav = 'techWarehouse';
include('../includes/header.php');
include('./includes/nav_tech.php');
if (!$session->is_signed_in() || $current_permissions != "tech" || $current_state != 1) {
  redirect("../index.php");
}

if (empty($_GET['id'])) {
  redirect("/UNA/index.php");
} else {
  $merch = Merch::find_merch_by_id($_GET['id']);
  if (isset($_POST['submit'])) {
    if ($merch) {
      $merch->merch_name = $_POST['merch_name'];
      $merch->amount = $_POST['amount'];
      $merch->price = $_POST['price'];
      $merch->orders = $_POST['orders'];
      $merch->code = $_POST['code'];
      $merch->status = $_POST['status'];
      $merch->save();
      redirect("/UNA/admin/techWarehouse.php");
    }
  } elseif (isset($_POST['delete'])) {
    $merch->delete();
    redirect("/UNA/admin/techWarehouse.php");
  }
}


?>
<!-- ================ Users Details  ================= -->
<div id="Users-container" class="container">
  <div id="merch-form" class="container">
    <h1 class="py-3 center">Editar usuario</h1>
    <form class="forma my-1" action="" method="post">
      <div class="txt_field">
        <input type="text" name="merch_name" id="" required value="<?php echo ($merch->merch_name); ?>" />
        <span></span>
        <label for="">Nombre de mercancía</label>
      </div>
      <div class="txt_field">
        <input type="number" name="amount" id="" required value="<?php echo ($merch->amount); ?>" />
        <span></span>
        <label for="">Cantidad (Toneladas)</label>
      </div>
      <div class="txt_field">
        <input type="number" name="orders" id="" required value="<?php echo ($merch->orders); ?>" />
        <span></span>
        <label for="">Pedidos</label>
      </div>
      <div class="txt_field">
        <input type="number" step=".01" name="price" id="" required value="<?php echo ($merch->price); ?>" />
        <span></span>
        <label for="">Precio</label>
      </div>
      <div class="txt_field">
        <input type="number" name="code" id="" required value="<?php echo ($merch->code); ?>" />
        <span></span>
        <label for="">Código</label>
      </div>
      <h4 class="center">Permisos</h4>
      <div class="status-selection py-1">
        <div class="select">
          <select name="status">
            <option value="Disponible" <?php
                                        if ($merch->status == 'Disponible') {
                                          echo ('selected');
                                        } else {
                                          echo ('');
                                        }
                                        ?>>Disponible</option>
            <option value="No disponible" <?php
                                          if ($merch->status == 'No disponible') {
                                            echo ('selected');
                                          } else {
                                            echo ('');
                                          }
                                          ?>>No disponible</option>

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