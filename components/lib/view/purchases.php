<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//defined("true-access") or die("Connot Access!");
include_once("layout.php");
/*
* Purchases layout
*/

/*
* Main function
*/
function view($data)
{
	
	users_renderLoginForm();
	$history = $data["purchases"];
	h1("Your Purchases:");
	foreach($history as $purchase)
	{
		purchases_render($purchase);
	}
	endOfPage();
}

function purchases_render($purchase)
{
    
    book_table_purchased($purchase['Title'], $purchase['Price'], $purchase['Publication_Date']);
    echo '<form id="add' . $purchase['Id'] . '" action="index.php?option=lib&view=purchasedeleted" method="POST">       ' . PHP_EOL;
    echo '	<input type="submit" value="Delete Purchase"/>                     ' . PHP_EOL;
    echo '</form> ';
     echo"<hr>";
//	h3($purchase['Title']);
//	p("for $".$purchase['Price']);
}

?>