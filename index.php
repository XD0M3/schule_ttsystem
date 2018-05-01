<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 02.03.2018
 * Time: 14:49
 */
include "api/error_handeling.php";
include "api/url_filling.php";
session_start();

$admin = false;
if(isset($_SESSION['user_id'])){
    $con = new mysqli("localhost", 'root','04041977Manuela','ttsystem');
    $con->set_charset('utf8');
    $user_id = $_SESSION['user_id'];
    $r = $con->query("SELECT admin_id FROM admins WHERE user_id = $user_id;");
    if($r->num_rows != 0){
        $admin = true;
    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/core.css">
    <title>Trouble Ticket</title>
</head>
<body>
<?php

if(isset($_SESSION['user_id'])){
  ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Trouble Ticket</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="https://xd0m3.eu/schulprojekt/">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://xd0m3.eu/schulprojekt/supports.php">Support</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Eingeloggt als <?php echo $_SESSION['name']?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Einstellung</a>
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

<?php
} else {
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Trouble Ticket</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php urli("/schulprojekt/") ?>">Home<span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.htl-hl.ac.at/cms/">HTL Website</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php urli("/schulprojekt/register.php"); ?>">Registrierung</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php urli("/schulprojekt/login.php"); ?>">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
}
getErrorMessage()
?>
<div class="container-fluid">
    <div class="row neuigkeiten">
        <div class="col-sm">

        </div>
        <div class="col-sm">
            <h1 style="text-align: center">Neuigkeiten</h1>
            <?php echo $url; ?>
        </div>
        <div class="col-sm">

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