<?php
//if (!defined("true-access"))
//{
//	die("cannot access");
//}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'database.php';

function get_all_books(){

    $books = array();
    list($dbc, $error) = connect_to_database(); 
    if($dbc){
    $query = "SELECT books.Id, Title, FirstName, LastName, Price, Publication_Date FROM BOOKS join AUTHORS where books.author = authors.id;";

    $result = mysqli_query($dbc, $query);
    
    if($result){
        
        while($book = mysqli_fetch_array($result)){
            $books[] = $book;;
        }
        
    }
}
return $books;

}

?>
