<?php
/**
 * Created by PhpStorm.
 * User: autvi
 * Date: 05.03.2018
 * Time: 10:03
 */

function urli ($arg){
    echo "https://" . $_SERVER['SERVER_NAME'] . $arg;
}

function urls ($arg){
    return "https://" . $_SERVER['SERVER_NAME'] . $arg;
}