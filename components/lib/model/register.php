<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'database.php';

//define("SALT", "salt");
//define("DB_HOST", "localhost");
//define("DB_USER", "mazen");
//define("DB_PASSWORD", "mazen");
function add_user(){
list($dbc, $error) = connect_to_database();

$username = isset($_POST['username']);
$check = "SELECT * FROM users WHERE username= '$username'";
$rs = mysqli_query($dbc,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);


$emailaddress = isset($_POST['emailaddress']);
$password = isset($_POST['password']);



if($data[0] > 1){
	echo "User Already Exists<br/>";
}
else{
//store the values in the database 
//we put question marks instead of the actual variables to prevent sql injection
$statement = mysqli_prepare($dbc, "INSERT INTO users (username, email, password) VALUES ('$username', '$emailaddress', '$password')");

if($username)
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);
$query = mysqli_query($dbc,$statement);

}
if ($query)
    {
        echo "You are now registered<br/>";
    }
    else
    {
        echo "Error adding user in database<br/>";
    }
mysqli_close($dbc);
}

function get_added_user(){
    list($dbc, $error) = connect_to_database();
    $results = mysqli_query($dbc,"select * from users");
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