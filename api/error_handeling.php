<?php
/**
 * Created by PhpStorm.
 * User: autvi
 * Date: 07.03.2018
 * Time: 08:58
 */
session_start();
function getErrorMessage(){
    /*
     if($_SESSION['error'] == ""){
        ?>

        <?php
        $_SESSION['error'];
    }
     */

    //LEERES FORMULAR - REGRESTRIEREN
    if($_SESSION['error'] == "emptyFormRegister"){
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
    if($_SESSION['error'] == "emailAlreadyInUse"){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Die von Ihnen angegebene Email ist schon in Verwendung.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        $_SESSION['error'] = '';
    }
    if($_SESSION['error'] == "emptyFormLogin"){
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
    if($_SESSION['error'] == "emailNotInUse"){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Die angegeben Email gibt es nicht.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        $_SESSION['error'] = "";
    }
    if($_SESSION['error'] == "pwIsWrong"){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Das von ihnen eingegebene Passwort ist falsch!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        $_SESSION['error'] = "";
    }
    if($_SESSION['support'] == "send" ){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Ticket erfolgreich gesendet!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        $_SESSION['support'] = "";
    }
    if($_SESSION['error'] == "noTicket"){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Das von ihnen geforderte Ticket exestiert nicht.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        $_SESSION['error'] = '';
    }
    if($_SESSION['error'] == "notYourTicket"){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Kein Ticket von euch :I
            Zugriff verweigert!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        $_SESSION['error'] = "";
    }

}