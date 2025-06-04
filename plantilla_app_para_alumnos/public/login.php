<?php

session_start();

require_once('../app/vars.php');
require_once('../app/functions.php');



//Aquí se realiza el procesado de las variables que proceda.
//TO DO

if (isset($_POST['email']) && !empty($_POST['email']) && (isset($_POST['password']) && !empty($_POST['password']))) {

    foreach ($users as $user) {
        if ($_POST['email'] == $user['email'] && hash('sha256',$_POST['password']) == $user['hashed_password']) {
            $_SESSION['users'] = $user['user_name'];
            header("Location: index.php");
        }else {
            $_SESSION['mensaje'] = "Invalid credential";
        }
    }

}


$message = get_user_message();

require_once('../app/login_template.php');
?>