<?php

function classAutoLoader($class)
{
    $class = strtolower($class);
    $the_path = "/xampp/htdocs/UNA/admin/includes/{$class}.php";

    if (file_exists($the_path) && !class_exists($class)) {
        require_once($the_path);
    } else {
        die("This file name {$class}.php was not found.");
    }
}

spl_autoload_register('classAutoloader');

function redirect($location)
{
    header("Location: {$location}");
}

// Show username
function show_username($id)
{
    if ($user_data = Users::find_this_query("SELECT * FROM usuarios WHERE id = '{$id}' LIMIT 1")) {
        return ($user_data[0]->username);
    }
}

// Show permissions
function show_user_permissions($id)
{
    if ($user_data = Users::find_this_query("SELECT * FROM usuarios WHERE id = '{$id}' LIMIT 1")) {
        return ($user_data[0]->permissions);
    }
}

// Show approved state
function show_user_state($id)
{
    if ($user_data = Users::find_this_query("SELECT * FROM usuarios WHERE id = '{$id}' LIMIT 1")) {
        return ($user_data[0]->approved);
    }
}
