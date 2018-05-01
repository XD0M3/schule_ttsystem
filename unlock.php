<?php
/**
 * Created by PhpStorm.
 * User: autvi
 * Date: 13.04.2018
 * Time: 08:18
 */
include "api/url_filling.php";
$admin = false;
session_start();
if(!isset($_SESSION['user_id'], $_GET['support'])){
    header("Location: " . urls("/schulprojekt/"));
}
$user_id = $_SESSION['user_id'];
$support_id = $_GET['support'];
$con = new mysqli("localhost", 'root','04041977Manuela','ttsystem');
$r = $con->query("SELECT admin_id FROM admins WHERE user_id = $user_id");
if($r->num_rows > 0){
    $admin = true;

    $result = $con->query("UPDATE tickets SET locked_by = NULL WHERE support_id=$support_id");

    header("Location: " . urls("/schulprojekt/admin_tickets.php"));
} else {
    header("Location: " . urls("/schulprojekt/"));
    $_SESSION['error'] = "noAdmin!";
}

