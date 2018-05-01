<?php
/**
 * Created by PhpStorm.
 * User: autvi
 * Date: 08.03.2018
 * Time: 08:22
 */
session_start();
include "api/url_filling.php";
include "api/error_handeling.php";


if(isset($_POST['betreff'], $_POST['ort'], $_POST['art'], $_POST['desc'])){
    $user_id = $_SESSION['user_id'];
    $subject = $_POST['betreff'];
    $ort = $_POST['ort'];
    $art = $_POST['art'];
    $content = $_POST['desc'];

    $con = new mysqli("localhost","root", "","ttsystem");
    $con->set_charset("utf8");

    if($subject == ""){

    }
    if($subject == ""){

    }
    if($subject == ""){

    }
    if($subject == ""){

    }



    $boolean = true;

    while($boolean){
        $randomId = rand(1000000,9999999);

        $result = $con->query("SELECT support_id FROM WHERE support_id = $randomId");

        if($result->num_rows == 0){
            $result = $con->query("INSERT INTO tickets VALUES ($randomId, '$subject', $user_id, '$ort', '$art', '$content', '[]', 'No' , NULL, CURRENT_TIMESTAMP,'N');");
            echo $con->error;
            $boolean = false;
            header("Location: " . urls("/schulprojekt/support.php?id=$randomId"));
        }


    }

} else {
    $_SESSION['error'] = "emptySupportForm";
    $user_id = $_SESSION['user_id'];
    $subject = $_POST['betreff'];
    $ort = $_POST['ort'];
    $art = $_POST['art'];
    $content = $_POST['desc'];

    echo $user_id.$subject.$ort.$art.$content;
    //header("Location: " . urls("/schulprojekt/supports.php"));
}
