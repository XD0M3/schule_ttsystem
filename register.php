<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 02.03.2018
 * Time: 14:49
 */
if(isset($_SESSION['user_id'])){
    header("https://xd0m3.eu/schulprojekt");
}
include "api/url_filling.php";
session_start();

$admin = false;
$con = new mysqli("localhost", 'root','','ttsystem');
$con->set_charset('utf8');
$user_id = $_SESSION['user_id'];
$r = $con->query("SELECT admin_id FROM admins WHERE user_id = $user_id;");
if($r->num_rows != 0){
    $admin = true;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/core.css">
    <title>Trouble Ticket | Rewgrestrierung</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Trouble Ticket</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php urli("/schulprojekt/")?>">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://www.htl-hl.ac.at/cms/">HTL Website</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php urli("/schulprojekt/register.php");?>">Registrierung</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php urli("/schulprojekt/login.php");?>">Login</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <?php
    if($_SESSION['error'] == "wrongRegister"){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Bitte geben Sie auch Daten ein und senden sie nicht einfach ein leeres Formular weg!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        $_SESSION['error'] = "";
    }
    ?>
    <div class="row">
        <div class="col">

        </div>
        <div class="col-5">
            <form class="loginForm" method="post" action="post_register.php">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName3" placeholder="Vor und Nachname" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col">

        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/alert_dissmiss.js"></script>
</body>
</html>
