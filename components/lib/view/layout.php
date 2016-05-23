<?php

//defined("true-access") or die("No script kiddies please!");

/*
 * common layout
 */

function startOfPage() {
    echo '<!doctype html> ' . PHP_EOL;
    echo '<html>          ' . PHP_EOL;
    echo '</head>         ' . PHP_EOL;
    echo '<body>          ' . PHP_EOL;
}

function endOfPage() {
    echo '</body> ' . PHP_EOL;
    echo '</html> ' . PHP_EOL;
}

function siteTitle($content) {
    echo "<h1><a style='color:red' href='index.php'>" . $content . "<a></h1>" . PHP_EOL;
}

function startContent() {
    echo '<article>' . PHP_EOL;
}

function endContent() {
    echo '</article>' . PHP_EOL;
}

function startAside() {
    echo '<aside>' . PHP_EOL;
}

function endAside() {
    echo '</aside>' . PHP_EOL;
}

function h1($content) {
    echo "<h1 align ='center'>" . $content . "</h1>" . PHP_EOL;
}

function h3($content) {
    echo "<h3>" . $content . "</h3>" . PHP_EOL;
}

function h2($content) {
    echo "<h2>" . $content . "</h2>" . PHP_EOL;
}

function p($content) {
    echo "<p>" . $content . "</p>" . PHP_EOL;
}

function users_loggedIn() {
    return (isset($_SESSION['user']));
}

//function book_table($dd1, $dd2, $dd4) {
//
//    echo"<dt>" . "Book Name:" . "</dt>" . PHP_EOL;
//    echo"<dd>" . $dd1 . "</dd>" . PHP_EOL;
//    echo"<dt>" . "Price:" . "</dt>" . PHP_EOL;
//    echo"<dd>" . $dd2 . "</dd>" . PHP_EOL;
//    
//    echo"<dt>" . "Publish Date:" . "</dt>" . PHP_EOL;
//    echo"<dd>" . $dd4 . "</dd>" . PHP_EOL;
//}
function book_table_purchased($dd1, $dd2, $dd3) {
    echo "<table border=\"1\"  style=\"width:100%;\ border-collapse=\"collapse\" >" . PHP_EOL;
    echo "<tr>" . PHP_EOL;
    echo"<th border=\"1\" style=\"width:35%\">" . "Book Name:" . "</td>" . PHP_EOL;
    echo"<th border=\"1\" style=\"width:35%\">" . "Price:" . "</td>" . PHP_EOL;
    echo"<th border=\"1\" style=\"width:35%\">" . "Publish Date:" . "</td>" . PHP_EOL;
    echo "</tr>" . PHP_EOL;
    echo "<tr>" . PHP_EOL;
    echo"<td border=\"1\">" . $dd1 . "</td>" . PHP_EOL;
    echo"<td border=\"1\">". "$" . $dd2 . "</td>" . PHP_EOL;
    echo"<td border=\"1\">" . $dd3 . "</td>" . PHP_EOL;
    echo "</tr>" . PHP_EOL;
    echo "</table>" . PHP_EOL;
}

function book_table_2($dd1, $dd2, $dd3, $dd4) {
    echo "<table border=\"1\" border=\"solid\"  style=\"width:100%;\ border-collapse=\"collapse\" >" . PHP_EOL;
    echo "<tr>" . PHP_EOL;
    echo"<th border=\"1\" style=\"width:35%\">" . "Book Name:" . "</td>" . PHP_EOL;
    echo"<th border=\"1\" style=\"width:10%\">" . "Price:" . "</td>" . PHP_EOL;
    echo"<th border=\"1\" style=\"width:35%\">" . "Author:" . "</td>" . PHP_EOL;
    echo"<th border=\"1\" style=\"width:35%\">" . "Publish Date:" . "</td>" . PHP_EOL;
    echo "</tr>" . PHP_EOL;
    echo "<tr>" . PHP_EOL;
    echo"<td border=\"1\">" . $dd1 . "</td>" . PHP_EOL;
    echo"<td border=\"1\">" . "$" . $dd2 . "</td>" . PHP_EOL;
    echo"<td border=\"1\">" . $dd3 . "</td>" . PHP_EOL;
    echo"<td border=\"1\">" . $dd4 . "</td>" . PHP_EOL;
    echo "</tr>" . PHP_EOL;
    echo "</table>" . PHP_EOL;
}

function users_renderLoginForm() {
    if (!users_loggedIn()) {

        include 'header.html';
        include 'form.html';
    } else {
        p("Welcome!!!");
        echo '<form action="index.php?option=lib&view=logout" method="post">                          ' . PHP_EOL;
        echo '	<input type="submit" value="Logout"/>                       ' . PHP_EOL;
        echo '</form>                                                      ' . PHP_EOL;
        echo '<form action="index.php?option=lib&view=login" method="post">                          ' . PHP_EOL;
        echo '	<input type="submit" value="Book List"/>                       ' . PHP_EOL;
        echo '</form>                                                      ' . PHP_EOL;

        //echo '<a href="index.php?option=lib&view=login"">Home</a>    ' . PHP_EOL;
    }
}

function render_add_book(){
    include 'addBook.html';
}

function render_register_form(){
    include_once 'register.html';
}

?>
