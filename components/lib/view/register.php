<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'layout.php';

function view_user($data){
    render_register_form();
    $added = $data["users"];
    //h1("Successfully Registered:");
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
    
//    echo '<form id="add' . $add['Id'] . '" action="index.php?option=lib&view=delete" method="POST">       ' . PHP_EOL;
//    echo '	<input type="submit" value="Delete Book"/>                     ' . PHP_EOL;
//    echo '</form> ';
    h3($add['username']);
    p($add['emailaddress']);

}

?>
