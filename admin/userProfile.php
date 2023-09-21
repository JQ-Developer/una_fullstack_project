<?php
$css = array('../styles/admin.css');
$current = 'profile';
$current_nav = 'userProfile';
include('../includes/header.php');
include('./includes/nav_user.php');
if (!$session->is_signed_in() || $current_permissions != "user" || $current_state != 1) {
  redirect("../index.php");
}
?>

<div class="container">
  <h1 class="py-3">Todo al alcance de una llamada...</h1>
  <p>Para hacer una compra por favor comunicarse con el siguiente número: 555-555-555</p>
  <div class="reports-container">
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error magnam doloribus accusantium ratione repudiandae voluptatem delectus laudantium deleniti, minus mollitia id expedita omnis reiciendis quibusdam quo, ad perspiciatis, eius porro.
  </div>
</div>

</div>
</div>
</body>

</html>