<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//if (!defined("true-access")) {
//    die("cannot access");
//}

define("DB_HOST", "localhost");
define("DB_USER", "mazen");
define("DB_PASSWORD", "mazen");

function connect_to_database($database = "books_database") {
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, $database);
    $error = "";

    if ($dbc) {
        //good news everyone!
        mysqli_set_charset($dbc, "utf8");

    } else {
        $error = mysqli_connect_error();
    }

    return array($dbc,$error);
}

?>
