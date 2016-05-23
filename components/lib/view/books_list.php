<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("layout.php");

/*
 * Main function
 */

function view($data) {


    users_renderLoginForm();
    $books = $data["books"];
    if (!empty($books)) {
        foreach ($books as $book) {
            books_render($book);
        }
    }

    endContent();
    endOfPage();
}

/*
 * books layout helpers
 */

function books_render($book) {
    book_table_2($book['Title'], " $" .$book['Price'], $book['FirstName']." ".$book["LastName"], $book['Publication_Date']);

    //h3($book['Title']." $".$book['Price']);
    //p("by: ".$book['FirstName']." ".$book["LastName"]);
    if (users_loggedIn()) {
        books_renderPurchaseForm($book);
    }
}

function books_renderPurchaseForm($book) {

    echo '<form id="buy' . $book['Id'] . '" action="index.php?option=lib&view=purchases" method="POST">       ' . PHP_EOL;
    echo '	<input name="username" type="hidden" value="' . $_SESSION['user']['username'] . '"/>' . PHP_EOL;
    echo '	<input name="book" type="hidden" value="' . $book['Id'] . '"/>' . PHP_EOL;
    echo '	<input type="submit" value="Purchase"/>                     ' . PHP_EOL;
    echo '</form> ';

    echo '<form id="add' . $book['Id'] . '" action="index.php?option=lib&view=add" method="POST">       ' . PHP_EOL;
    echo '	<input type="submit" value="Add New Book"/>                     ' . PHP_EOL;
    echo '</form> ';
     echo"<hr>";
}




?>

