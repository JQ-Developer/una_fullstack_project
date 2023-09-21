<?php
$css = array('../styles/admin.css');
$current = 'profile';
$current_nav = 'techProfile';
include('../includes/header.php');
include('./includes/nav_tech.php');
if (!$session->is_signed_in() || $current_permissions != "tech" || $current_state != 1) {
  redirect("../index.php");
}
?>
<!-- ======================= Cards ================== -->
<div class="cardBox">
  <a href="./techWarehouse.php" class="card">
    <div>
      <div class="numbers">

        <?php
        $merchandise = Merch::find_all_merch();
        echo (count($merchandise));
        ?>

      </div>
      <div class="cardName">Productos totales</div>
    </div>

    <div class="iconBx">
      <i class="fas fa-solid fa-briefcase"></i>
    </div>
  </a>
</div>

<!-- ================ Order Details List ================= -->
<div class="details">
  <div class="recentOrders">
    <div class="cardHeader">
      <h2>Mercancia nueva</h2>
      <a href="techWarehouse.php" class="btn">Ver todo</a>
    </div>
    <table>
      <thead>
        <tr>
          <td>Nombre</td>
          <td>Precio</td>
          <td>Código</td>
          <td>Disponibilidad</td>
        </tr>
      </thead>
      <tbody>
        <?php
        $merch_list = Merch::find_all_merch();

        // Obtener los últimos 6 elementos del array
        $last_merch = array_reverse(array_slice($merch_list, -8));

        foreach ($last_merch as $merch) {
          echo '<tr>';
          echo '<td>' . $merch->merch_name . '</td>';
          echo '<td> $ ' . $merch->price . '</td>';
          echo '<td>' . $merch->code . '</td>';
          echo '<td><span class="status ';
          if ($merch->status === 'Disponible') {
            echo 'delivered';
          } else {
            echo 'return';
          }
          echo '">' . $merch->status . '</span></td>';
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</body>

</html>