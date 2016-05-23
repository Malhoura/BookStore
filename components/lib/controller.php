<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("model/database.php");
include_once("model/books.php");
include_once("model/purchases.php");
include_once("model/users.php");
include_once("model/register.php");
include_once("model/add.php");
include_once("view/layout.php");


function get_view_enabled($view)
{
	if ($view == "list")
		return "execute_book_list";
	else if ($view == "login")
		return "execute_login";
	else if ($view == "logout")
		return "execute_logout";
	else if ($view == "purchases")
		return "execute_purchase";
	else if ($view == "home")
                return "execute_login";
        else if ($view == "add")
                return "execute_add_book_form";
        else if ($view == "added")
                return "execute_added_book";
        else if ($view == "register")
                return "execute_register";
        else if ($view == "registered")
                return "execute_registered";
        else if ($view == "delete")
                return "execute_purchase_delete";
        else
		return false;
}

//check if view exists
function controller_route($view)
{
	if ($method = get_view_enabled($view))
	{
		$method(); //dynamic method invocation
	}
	else
	{
		die ("404 not found"); //this could be a view too!
	}
	
}

//show book list 
function execute_book_list()
{
	include_once("view/books_list.php");
        
	$data = array();
	$data["books"] = get_all_books();
	view($data);
}

//check if user exists
function execute_login()
{
    
	$username = $_POST['username'];
	$password = $_POST['password'];
	$success = check_user($username,$password);
	execute_book_list(); //view books after logging in
}

//unset user session
function execute_logout()
{
	/*
	* Logout and clear the session submission page
	*/
	session_unset ();
	execute_book_list(); //view books after logging out
}

//purchase a book and show all purchased books
function execute_purchase()
{
	include_once("view/purchases.php");
	
	$book = $_POST['book'];
	$username = $_POST['username'];
	purchases_buyBook($book,$username);
	$data = array();
	$data["purchases"] = purchases_getAll($username);
	
	view($data);
	
}

//crete new book
function execute_add_book_form(){
    include_once("view/add.php");
    $bookName = "";
    $data = array();
    $data["books"]= get_added_book($bookName);
    view($data);
}

//view added books
function execute_added_book(){
    include_once("view/add.php");
    
    
    $bookName = $_POST['bookname'];
    $date = $_POST['date'];
    $authorid = $_POST['authorid'];
    $price = $_POST['price'];
    add_book($bookName, $date, $authorid, $price);
    $data = array();
    $data["books"]= get_added_book($bookName);
    view($data);
}

//register new user
function execute_register(){
    include_once("view/register.php");
//    $username = $_POST['username'];
//    $emailaddress = $_POST['emailaddress'];
//    $password = $_POST['password'];
    $data["users"]= add_user();
    $data = array();
    view_user($data);
}

//view recently added users
function execute_registered(){
    include_once("view/register.php");
    
    
    $username = $_POST['username'];
    $emailaddress = $_POST['emailaddress'];
    $password = $_POST['password'];
    
    $data = array();
    $data["users"]= add_user();
    view_user($data);
}

function execute_purchase_delete(){
    
    
    delete_purchase($id);
}

?>