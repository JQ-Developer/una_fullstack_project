<?php
$css = array('../styles/admin.css', '../styles/signin.css', '/UNA/styles/signup.css');
$current = 'profile';
$current_nav = 'techWarehouse';
include('../includes/header.php');
include('./includes/nav_tech.php');
if (!$session->is_signed_in() || $current_permissions != "tech" || $current_state != 1) {
  redirect("../index.php");
}

if (isset($_POST['submit'])) {

  $merch_name = trim($_POST['merch_name']);
  $price = trim($_POST['price']);
  $orders = trim($_POST['orders']);
  $code = trim($_POST['code']);
  $status = trim($_POST['status']);
  $amount = trim($_POST['amount']);

  //Method to check if merch already exists
  if (Merch::verify_code($code)) {
    $the_message = "Ya existe mercancía asociada a este código.";
  } else {
    $merch = new Merch();
    $merch->merch_name = $merch_name;
    $merch->amount = $amount;
    $merch->price = $price;
    $merch->orders = $orders;
    $merch->code = $code;
    $merch->status = $status;
    $merch->create();
    $the_message = "";
    redirect("/UNA/admin/techWarehouse.php");
  }
} else {
  $the_message = "";
  $merch_name = "";
  $price = "";
  $orders = "";
  $code = "";
  $status = "";
}
?>

<div id="merch-form" class="container">
  <h1 class="py-3 center">Añadir un producto al almacén</h1>
  <h4 class="center"><?php echo ($the_message); ?></h4>
  <form class="forma" action="" method="post">
    <div class="txt_field">
      <input type="text" name="merch_name" id="" required value="<?php echo htmlentities($merch_name); ?>" />
      <span></span>
      <label for="">Nombre de mercancía</label>
    </div>
    <div class="txt_field">
      <input type="number" name="amount" id="" required value="<?php echo htmlentities($amount); ?>" />
      <span></span>
      <label for="">Cantidad (Toneladas)</label>
    </div>
    <div class="txt_field">
      <input type="number" name="orders" id="" required value="<?php echo htmlentities($orders); ?>" />
      <span></span>
      <label for="">Pedidos</label>
    </div>
    <div class="txt_field">
      <input type="number" step=".01" name="price" id="" required value="<?php echo htmlentities($price); ?>" />
      <span></span>
      <label for="">Precio</label>
    </div>
    <div class="txt_field">
      <input type="number" name="code" id="" required value="<?php echo htmlentities($code); ?>" />
      <span></span>
      <label for="">Código</label>
    </div>
    <h3 class="center py-1">Estátus</h3>
    <div class="status-selection py-1">
      <div class="select">
        <select name="status">
          <option value="Disponible">Disponible</option>
          <option value="No disponible">No Disponible</option>
        </select>
      </div>
    </div>
    <div class="py-2 center">
      <input type="submit" value="Guardar" name="submit" class="btn bg-dark center" />
    </div>
  </form>
</div>


<!-- ================ Merch list ================= -->
<div id="Users-container" class="container">
  <h1 class="py-3 center">Productos en almacén</h1>
  <ul id="users-list">
    <li class="merch-card">
      <span class="accent">Mercancia</span>
      <span class="accent">Cantidad (Toneladas)</span>
      <span class="accent">Precio($)</span>
      <span class="accent">Código</span>
      <span class="accent">Pedidos</span>
      <span class="accent">Estado</span>
      <span class="accent">Opciones</span>
    </li>

    <?php
    $merchandise = Merch::find_all_merch();
    foreach ($merchandise as $merch) {
      echo '<li class="merch-card">';
      echo '<span>' . $merch->merch_name . '</span>';
      echo '<span>' . $merch->amount . '</span>';
      echo '<span>' . $merch->price . '</span>';
      echo '<span>' . $merch->code . '</span>';
      echo '<span>' . $merch->orders . '</span>';
      echo '<span>' . $merch->status . '</span>';
      echo '<span class="accent"><a href="./tech_warehouse_edit.php?id=' . $merch->id . '">Editar</a></span>';

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