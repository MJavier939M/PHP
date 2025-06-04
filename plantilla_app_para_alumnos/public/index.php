<?php

session_start();

require_once('../app/vars.php');
require_once('../app/functions.php');

//Aquí se realiza el procesado de las variables que proceda.
//TO DO

$_SESSION['mensaje'] = 'Welcome '.$_SESSION['users'];

if (!isset($_SESSION['users']) || empty($_SESSION['users'])) {
    header("Location: login.php");
}

$datos_session = isset($_SESSION['booked_courses']) ? $_SESSION['booked_courses'] : array();

if (isset($_POST['id']) && !empty($_POST['id'])) {

    if (!in_array($_POST['id'],$datos_session)) {
        $datos_session[] = $_POST['id'];
        $_SESSION['booked_courses'] = $datos_session;
        $_SESSION['mensaje'] = "Added event: ".$_POST['id'];
    }
}

if (isset($_POST['borrar']) && !empty($_POST['borrar'])) {
    foreach ($_SESSION['booked_courses'] as $key => $event) {
        if ($_POST['borrar'] == $event) {
            unset($_SESSION['booked_courses'][$key]);
            $_SESSION['mensaje'] = "Event deleted: ".$_POST['borrar'];
        }
    }
}



$events_markup = get_events_form_markup($events);
$booked_courses_markup = get_modal_booked_events_form();

$message = get_user_message();

require_once('../app/main_template.php');
?>