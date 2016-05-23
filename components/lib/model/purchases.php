<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once("database.php");
/*
* Purchases database
*/

function purchases_buyBook($book, $username)
{
	list($dbc, $error) = connect_to_database();
	
	$book_safe = mysqli_real_escape_string($dbc, $book); 
	$username_safe = mysqli_real_escape_string($dbc,$username); 
        $date = date("Y-m-d H:i:s");
	//$now = new date();
	
	$results = mysqli_query($dbc,"insert into purchases (username, book, date) values ('$username_safe','$book_safe', '$date')");
	
	return $results;
}

function purchases_getAll($username)
{
	list($dbc, $error) = connect_to_database();

	$username_safe = mysqli_real_escape_string($dbc,$username); 
	
	$results = mysqli_query($dbc,"select * from purchases join books on purchases.book = books.id where username='$username_safe'");
	
	$allPurchases = array();
	
	if ($results)
	{
		while ($purchase = mysqli_fetch_array($results,MYSQLI_ASSOC))
		{
			$allPurchases[] = $purchase;
		}
	}
	
	return $allPurchases;
}

function delete_purchase($id){
    list($dbc, $error) = connect_to_database();
    
    $resluts = mysqli_query($dbc, "DELETE FROM books WHERE Id = '$id'");
    
    return $resluts;
    
}
