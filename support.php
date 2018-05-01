<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 06.03.2018
 * Time: 14:17
 */
$admin = false;
include "api/url_filling.php";
//include "api/error_handeling.php";
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: " . urls("/schulprojekt/"));
}

$con = new mysqli("localhost", 'root','04041977Manuela','ttsystem');
$con->set_charset('utf8');
$id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$result = $con->query("SELECT * FROM tickets WHERE support_id = $id;");
$rl = $result->num_rows;
$row = $result->fetch_assoc();

$ad = $row['creator'];
$r = $con->query("SELECT admin_id FROM admins WHERE user_id = $user_id;");

if($r->num_rows != 0){
    $admin = true;
} else {
    if($row['creator'] != $_SESSION['user_id']){
        header("Location: " . urls("/schulprojekt/"));
        $_SESSION['error'] = "notYourTicket";
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
                    <a class="dropdown-item" href="open_supp.php">Meine Offenen Supports
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

//getErrorMessage();

?>


<div class="container">
            <?php
            if(!isset($_GET['id'])){
                header("Location: " . urls("/schulprojekt/"));
            }

            if($admin == true){
                if($row['creator'] != $_SESSION['user_id']){
                    $result = $con->query("UPDATE tickets SET locked_by = $user_id WHERE support_id=$id");

                }
            } else {
                if($row['creator'] != $_SESSION['user_id']){
                    header("Location: " . urls("/schulprojekt/"));
                    $_SESSION['error'] = "notYourTicket";
                }
            }


            if($rl == 0){
                header("Location: " . urls("/schulprojekt/"));
                $_SESSION['error'] = "noTicket";
            }

            $res = $con->query("SELECT * FROM logins WHERE id = $ad;");
            $rk = $res->fetch_assoc();



            ?>

    <div class="row">
        <div class="col">

        </div>
        <div class="col-7">
            <form class="loginForm" method="post" action="add_answer.php">
                <div class="container">
                    <div class="row">
                        <table class="table">
                            <tr>
                                <td><span class="ticketHeader"><?php echo "Creator: " . $row['creator']; ?></span></td>
                                <td><span class="ticketHeader"><?php echo "Locked by: " . $row['locked_by'];

                                if($admin == true){
                                    echo '<a href="' . urls('/schulprojekt/unlock.php?support=' . $id) .'">(Unlock)</a>';
                                }

                                ?></span></td>
                            </tr>
                            <tr>

                                <td><span class="ticketHeader"><?php echo "Closed: " . $row['closed'];?></span></td>
                                <td><span class="ticketHeader"><?php echo "Created: " .$row['created']; ?></span></td>
                            </tr>
                            <tr>
                                <td><span class="ticketHeader"><?php echo "Ort: " . $row['ort']; ?></span></td>
                                <td><span class="ticketHeader"><?php echo "Subject: " . $row['subject']; ?>"</span></td>
                            </tr>
                            <tr>
                                <td style="width: 35%">
                                    Ticket:
                                </td>
                                <td>
                                    <?php echo $row['content']; ?>
                                </td>
                            </tr>
                            <?php

                            $antworten = json_decode($row['answers']);

                            for($x = 0; $x < count($antworten); $x++){
                                echo "<tr><td>Antwort: " . ($x+1) . "</td><td>";
                                echo "<span>" . $antworten[$x] . "</span>";
                                echo "</td></tr>";
                            }
                            ?>
                            <tr>
                                <td colspan="2">
                                    <textarea name="desc" style="width: 100%; resize: vertical" placeholder="Antwort:">Hallo <?php echo $rk['name'];?>, \n</textarea>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="">
                                    <?php
                                    if($admin == true){
                                    ?>
                                    <select name="closen" class="form-control">
                                        <option value="false">
                                            Nicht Schließen!
                                        </option>
                                        <option value="true">
                                            Ticket schließen!
                                        </option>
                                    </select>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td><select name="support_id" hidden>
                                        <option value="<?php echo $row['support_id'];?>">test</option>
                                    </select><button type="submit" class="btn btn-primary">Senden</button>
                                </td>
                            </tr>


                        </table>
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