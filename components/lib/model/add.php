<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("database.php");

function add_book($title, $date, $authorid, $price)
{
	list($dbc, $error) = connect_to_database();
	
	$title_safe = mysqli_real_escape_string($dbc, $title); 
	$author_safe = mysqli_real_escape_string($dbc,$authorid); 
	$price_safe = mysqli_real_escape_string($dbc,$price); 
	//$date = new date();
	
	$results = mysqli_query($dbc,"insert into books (Title, Publication_Date, Author, Price) values ('$title_safe','$date','$author_safe','$price_safe')");
	
	return $results;
}

function get_added_book($title){
    //include_once("addBook.html");
    list($dbc, $error) = connect_to_database();
    //$title = $_POST['bookname'];
    $title_safe = mysqli_real_escape_string($dbc, $title);
    
    $results = mysqli_query($dbc,"select * from books join authors on books.Author = authors.id where Title ='$title_safe'");
    
    $added = array();
    if ($results)
	{
		while ($add = mysqli_fetch_array($results,MYSQLI_ASSOC))
		{
			$added[] = $add;
		}
	}
	
	return $added;
    
}
