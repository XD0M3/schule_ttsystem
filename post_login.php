<?php
/**
 * Created by PhpStorm.
 * User: autvi
 * Date: 06.03.2018
 * Time: 09:23
 */

session_start();
include "api/url_filling.php";

if(isset($_POST['email'], $_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($_POST['email'] == ""){

    }
    if($_POST['password'] == ""){

    }

    $con = new mysqli("localhost", 'root','','ttsystem');
    $con->set_charset('utf8');

    $result = $con->query("SELECT password,id,name FROM logins WHERE email = '$email';");

    if($result->num_rows > 0){
        $passwort = $result->fetch_row();
        $passworx = $passwort[0];
        if(password_verify($password, $passworx)){
            $_SESSION['user_id'] = $passwort[1];
            $_SESSION['name'] = $passwort[2];
            header("Location: " . urls("/schulprojekt/"));
        }

    } else {
        $_SESSION['error'] = "wrongLogin";
        header("Location: " . urls("/schulprojekt/login.php"));
    }

} else {
    $_SESSION['error'] = "wrongLogin";
    header("Location: " . urls("/schulprojekt/login.php"));
}
