<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//if (!defined("true-accress")) {
//    die("connot access");
//}
include_once 'database.php';



function check_user($username, $password) {
    list($dbc, $error) = connect_to_database();
    $success = false;
    if ($dbc) {
        
        $username_safe = mysqli_real_escape_string($dbc, $username);
        $password_safe = mysqli_real_escape_string($dbc,$password);

        $query = "SELECT * FROM users WHERE username = '" . $username_safe ."' AND password= '" .$password_safe ."'";
        //print_r($query);
        $result = mysqli_query($dbc, $query);

        if ($result) {
            //print_r($result);
            while ($user = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                
                $_SESSION['user'] = $user;
                $success = true;
                //print_r($user);
            }
            
        } else {
            echo "Wrong username or password";
        }
    }
    return $success;
}
