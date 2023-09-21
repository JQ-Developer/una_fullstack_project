<?php
$css = array('../styles/admin.css');
$current = 'profile';
$current_nav = 'adminProfile';
include('../includes/header.php');
include('./includes/nav.php');
if (!$session->is_signed_in() || $current_permissions != "admin" || $current_state != 1) {
  redirect("../signin.php");
}
?>
<?php
// $user = new Users();
// $user->username = "Joe";
// $user->email = "Joe@ht";
// $user->age = 20;
// $user->pwd = "tech";
// $user->permissions = "tech";
// $user->approved = TRUE;

// $user->create();

// $user = Users::find_user_by_id(2);
// $user->username = "Willi";
// $user->update();

// $user = Users::find_user_by_id(5);
// $user->delete();
// $user = Users::find_user_by_id(4);
// $user->username = "Washington";
// $user->save();

// $user = new Users();
// $user->username = "Ezzio";
// $user->age = 40;
// $user->save();
?>
<!-- ======================= Cards ================== -->
<div class="cardBox">

  <a href="./adminUsers.php" class="card">
    <div>
      <div class="numbers">
        <?php
        $users = Users::find_all_users();
        echo (count($users));
        ?>
      </div>
      <div class="cardName">Usuarios</div>
    </div>
    <div class="iconBx">
      <i class="fas fa-solid fa-database"></i>
    </div>
  </a>


  <a href="./adminPermissions.php" class="card">
    <div>
      <div class="numbers">
        <?php
        $pendings = Users::find_this_query("SELECT * FROM usuarios WHERE approved != 1");
        echo (count($pendings));
        ?>
      </div>
      <div class="cardName">Permisos pendientes</div>
    </div>

    <div class="iconBx">
      <i class="fas fa-solid fa-lightbulb"></i>
    </div>
  </a>

  <a href="./adminWarehouse.php" class="card">
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
      <a href="adminWarehouse.php" class="btn">Ver todo</a>
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

  <!-- ================= New Customers ================ -->
  <div class="recentCustomers">
    <div class="cardHeader">
      <h2>Nuevos usuarios</h2>
    </div>

    <table>
      <?php
      $users = Users::find_this_query("SELECT * FROM usuarios WHERE approved = 1");

      // Obtener los últimos 6 elementos del array
      $ultimos_Usuarios = array_reverse(array_slice($users, -7));

      foreach ($ultimos_Usuarios as $user) {
        echo '<tr>';
        echo '<td>';
        echo '<h4>';
        echo ($user->username) . '<br />';
        echo '<span>' . $user->email . '</span>';
        echo '</h4>';
        echo '</td>';
        echo '</tr>';
      }
      ?>
    </table>
  </div>
</div>
</div>
</div>
</body>

</html>