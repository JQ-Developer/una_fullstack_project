<?php
ob_start();
require_once("/xampp/htdocs/UNA/admin/includes/init.php");

if ($session->is_signed_in()) {
    $current_name = show_username($session->user_id);
    $current_permissions = show_user_permissions($session->user_id);
    $current_state = show_user_state($session->user_id);
    $permission_url = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Welcome to the most cool hotel in Boston Massachusetts" />
    <meta name="keywords" content="articulos, hogar, limpieza" />
    <title>Articulos De Limpieza | UNA</title>
    <link rel="stylesheet" href="/UNA/styles/global.css" />
    <link rel="icon" href="/UNA/img/UNAlogo.png">
    <?php
    if (isset($css) && is_array($css))
        foreach ($css as $path)
            printf('<link rel="stylesheet" type="text/css" href="%s" />', $path);
    ?>

    <script src="https://kit.fontawesome.com/13d2a8b214.js" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <nav id="navbar">
            <div class="container">
                <h1 class="logo">
                    <a href="/UNA/index.php"><span class="text-primary">Artículos </span>De Limpieza</a>
                </h1>
                <ul>
                    <li><a <?php
                            if (isset($current) && $current == 'index') {
                                echo ('class="current"');
                            } else {
                                echo ('class=""');
                            } ?> href='/UNA/index.php'>Inicio</a></li>

                    <?php if ($session->is_signed_in() && $current_state != 0) {
                        echo ("<li><a ");
                        if (isset($current) && $current == 'profile') {
                            echo 'class="current" href="/UNA/admin/' . $current_permissions . 'Profile.php">Perfil</a></li>';
                        } else {
                            echo 'class="" href="/UNA/admin/' . $current_permissions . 'Profile.php">Perfil</a></li>';
                        }
                    } elseif ($session->is_signed_in() && $current_state != 1) {
                        echo ("<li><a ");
                        if (isset($current) && $current == 'profile') {
                            echo ('class="current" href="/UNA/pending.php">Perfil</a></li>');
                        } else {
                            echo ('class="" href="/UNA/pending.php" >Perfil</a></li>');
                        }
                    } else {
                        echo ("<li><a ");
                        if (isset($current) && $current == 'signin') {
                            echo ('class="current" href="/UNA/signin.php">Iniciar sesión</a></li>');
                        } else {
                            echo ('class="" href="/UNA/signin.php">Iniciar sesión</a></li>');
                        }
                    }
                    ?>

                    <li><a <?php
                            if (isset($current) && $current == 'about') {
                                echo ('class="current"');
                            } else {
                                echo ('class=""');
                            } ?> href='/UNA/about.php'>Información</a></li>
                    <li><a <?php
                            if (isset($current) && $current == 'contact') {
                                echo ('class="current"');
                            } else {
                                echo ('class=""');
                            } ?> href='/UNA/contact.php'>Contactar</a></li>

                    <?php if ($session->is_signed_in()) {

                        echo ('<li><a class="" href="/UNA/admin/includes/logout.php">Salir</a></li>');
                    } ?>
                </ul>
            </div>
        </nav>
    </header>