<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("layout.php");




function view($data)
{
	
	render_add_book();
	$added = $data["books"];
	h1("Your Added Book:");
        if(is_array($added) || is_object($added)){
	foreach($added as $add)
	{
		add_render($add);
	}
        }
	endOfPage();
}

function add_render($add)
{
    
//    if(isset($_POST['bookname']) && isset($_POST['price']) && isset($_POST['data']) && isset($_POST['Id'])){
    book_table_purchased($add['Title'], $add['Price'], $add['Publication_Date']);
    echo '<form id="add' . $add['Id'] . '" action="index.php?option=lib&view=delete" method="POST">       ' . PHP_EOL;
    echo '	<input type="submit" value="Delete Book"/>                     ' . PHP_EOL;
    echo '</form> ';
    //}else{
        //echo"Something wrong";
    //}
//    h3($add['Title']);
//    p("for $".$add['Price']);

}




?>
