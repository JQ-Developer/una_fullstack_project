<?php
$css = array('./styles/signup.css');
$current = 'profile';
include('includes/header.php');

if (!$session->is_signed_in() || $current_state != 0) {
    redirect("./index.php");
}
?>


<div class="container">
    <div>
        <h2 class="py-3 my-3 center">Usuario pendiente de aprobación.</h2>
    </div>
</div>
</body>

</html>
<div class="clr"></div>