<?php
/**
 * Created by PhpStorm.
 * User: autvi
 * Date: 15.03.2018
 * Time: 08:12
 */

include "api/url_filling.php";
if(isset($_POST['support_id'], $_POST['desc'])){
    $id = $_POST['support_id'];
    $antwort = $_POST['desc'];

    $con = new mysqli("localhost","root", "04041977Manuela","ttsystem");
    $con->set_charset("utf8");

    $result = $con->query("SELECT answers FROM tickets WHERE support_id = $id");

    if($result->num_rows == 0){
        die("Something went clearly wrong!");
    }

    $anwsers = $result->fetch_row()[0];

    echo $anwsers;

    if($anwsers == "[]"){
        $antworten = array();
    } else {
        $antworten = json_decode($anwsers);
    }

    if($_POST['closen'] == 'true'){
        $result = $con->query("UPDATE tickets SET closed = 'Y' WHERE support_id=$id");
    }
    $antworten[] = $antwort;
    $endAntworten = json_encode($antworten);
    echo "<br>";
    $result = $con->query("UPDATE tickets SET answers = '$endAntworten' WHERE support_id=$id");

    header("Location: " . urls("/schulprojekt/support.php?id=$id"));

}