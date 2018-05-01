<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 06.03.2018
 * Time: 14:17
 */
session_start();
include "api/url_filling.php";
if(!isset($_SESSION['user_id'])){
    header("Location: " . urls("/schulprojekt/"));
}
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
                <a class="nav-link" href="https://xd0m3.eu/schulprojekt/">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="https://xd0m3.eu/schulprojekt/supports.php">Support</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Eingeloggt als <?php echo $_SESSION['name']?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Einstellung (Disabled)</a>
                    <a class="dropdown-item" href="open_supp.php">Meine Offenen Supports</a>
                    <?php

                    if($admin == true){
                        ?>

                        <a class="dropdown-item" href="admin_tickets.php">Admin Tickets</a>

                        <?php
                    }

                    ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php urli("/schulprojekt/logout.php") ?>">Logout</a>
                </div>
            </li>

        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col">

        </div>
        <div class="col-7">
            <form class="loginForm" method="post" action="add_ticket.php">
                <div class="form-group row">
                    <label for="betreff" class="col-sm-2 col-form-label">Betreff</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="betreff" placeholder="Betreff" name="betreff">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ort" class="col-sm-2 col-form-label">Ort</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Ort" placeholder="Ort" name="ort">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="art" class="col-sm-2 col-form-label">Problem</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="art" name="art">
                            <option value="drpc">Drucker & PC's</option>
                            <option value="klassen">Klassenräume</option>
                            <option value="werk">Werkstatt</option>
                            <option value="anderes">Anderes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desc" class="col-sm-2 col-form-label">Beschreibung</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="desc" rows="3" name="desc"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Senden</button>
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
