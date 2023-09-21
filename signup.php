<?php
$css = array('./styles/signup.css');
$current = 'signin';
include('includes/header.php');

if ($session->is_signed_in()) {
    redirect("./index.php");
}

if (isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $age = trim($_POST['age']);
    $email = trim($_POST['email']);
    $status = trim($_POST['status']);

    //Method to check if user already exists
    if (Users::verify_email($email)) {
        $the_message = "Ya tienes una cuenta asociada a este correo.";
    } else {
        $user = new Users();
        $user->username = $username;
        $user->email = $email;
        $user->age = $age;
        $user->pwd = $password;
        $user->permissions = $status;

        $user->approved = $status == "user" ? 1 : 0;
        $user->create();

        //Session Init
        if ($user->approved == 1) {
            $new_user = Users::verify_user($username, $password);
            $session->login($new_user);
            redirect("./index.php");
        } else {
            $new_user = Users::verify_user($username, $password);
            $session->login($new_user);
            redirect("./pending.php");
        }
    }
} else {
    $the_message = "";
    $username = "";
    $password = "";
    $age = "";
    $email = "";
}
?>


<div class="container">
    <div>
        <h1 class="text-primary py-2 center">Regístrate</h1>
        <h4 class="center"><?php echo ($the_message); ?></h4>
    </div>
    <div class="forma">
        <form class="" action="" method="post">
            <div class="user-details">

                <div class="column">

                    <div class="txt_field">
                        <input input type="text" name="username" value="<?php echo htmlentities($username); ?>" require />
                        <span></span>
                        <label for="username">Nombre</label>
                    </div>
                    <div class="txt_field">
                        <input type="number" name="age" value="<?php echo htmlentities($age); ?>" require />
                        <span></span>
                        <label for="age">Edad</label>
                    </div>

                </div>

                <div class="column">

                    <div class="txt_field">
                        <input type="password" name="password" value="<?php echo htmlentities($password); ?>" require />
                        <span></span>
                        <label for="password">Contraseña</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="email" value="<?php echo htmlentities($email); ?>" require />
                        <span></span>
                        <label for="email">Email</label>
                    </div>

                </div>
            </div>
            <h3 class="center py-1">¿Cuál es tu estátus?</h3>
            <div class="status-selection py-1">
                <div class="select">
                    <select name="status">
                        <option value="user">Usuario</option>
                        <option value="tech">Técnico</option>
                        <option value="operator">Operador</option>
                        <option value="admin">Administración</option>
                    </select>
                </div>
            </div>
            <div class="center py-2">
                <input type="submit" name="submit" value="Ingresar" class="btn bg-dark" />
            </div>

        </form>
    </div>
</div>
</body>

</html>
<div class="clr"></div>

<?php include("includes/footer.php"); ?>