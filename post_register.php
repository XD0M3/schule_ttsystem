<?php
/**
 * Created by PhpStorm.
 * User: autvi
 * Date: 05.03.2018
 * Time: 09:02
 */
include "api/url_filling.php";
session_start();

if(isset($_POST['email'], $_POST['name'], $_POST['password'])){

    $email = $_POST['email'];
    $name = $_POST['name'];
    $unhashedPW = $_POST['password'];

    if($name == ""){
        $_SESSION['error'] = "wrongRegister";
        header( "Location: " . urls("/schulprojekt/register.php"));
        exit;
    }
    if($name == ""){
        $_SESSION['error'] = "wrongRegister";
        header( "Location: " . urls("/schulprojekt/register.php"));
        exit;
    }
    $hashedPw = password_hash($unhashedPW, PASSWORD_BCRYPT);

    $con = new mysqli("localhost", 'root','','ttsystem');
    $con->set_charset('utf8');

    $boolean = true;

    while($boolean){
        $randomId = rand(100000,999999);

        $result = $con->query("SELECT id FROM logins WHERE id=$randomId") or header(urls("/schulprojekt/register.php?error=wrongRegister"));

        if($result->num_rows == 0){
            $result = $con->query("INSERT INTO logins VALUES ($randomId,'$email','$name','$hashedPw');") or header(urls("/schulprojekt/register.php?error=wrongRegister"));
            $boolean = false;
            $_SESSION['login'] = "done";
            header("Location: " . urls("/schulprojekt/login.php"));
        }


    }


} else {
    $_SESSION['error'] = "wrongRegister";
    header("Location: " . urls("/schulprojekt/register.php"));
}

