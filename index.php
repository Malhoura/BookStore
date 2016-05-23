<?php
//define("true-access", true);
session_start();
ob_start();
//ordinarily we would check the database using a core component for views to be registered
function get_option_enabled($option)
{
	if ($option == "lib") //we have this component enabled (hard coded)
		return "lib/controller.php";
	else
		return false;
}

//A Basic Router Function
//requires registering components and their router files
function route()
{
		//get query params from header
		$option = empty($_GET["option"]) ? "lib" : $_GET["option"];
		$view = empty($_GET["view"]) ? "list" : $_GET["view"];
		
		//get files to include from database
		if ($controller = get_option_enabled($option))
		{
			//include correct router
			include_once('components/'.$controller);
			controller_route($view); //router in controller should execute for a particular view - router in controller should implement function router_route($view)
		}
		else
		{
                    //print_r()
			die("404");
		}
}

//invoke basic router - the starting point of the journey
route();
ob_end_flush();


?>