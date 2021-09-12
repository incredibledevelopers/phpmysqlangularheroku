<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    //If required
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS");         
 
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
    exit(0);
}
// Connect to database
$conn = mysqli_connect('us-cdbr-east-04.cleardb.com','b8c62a10097525','bb7f5e26','heroku_3e46dc0f1caa30f');
include_once('users.php');
$request_method = $_SERVER["REQUEST_METHOD"];
$data = json_decode(file_get_contents("php://input"));
$user = new Users;
switch($request_method)
{
  case 'GET':
    // Retrive Users
    if(!empty($_GET["user_id"]))
    {
      $user_id=intval($_GET["user_id"]);
      $user->getUsers($user_id);
    }
    else
    {
      $user->getUsers();
    }
    break;
  case 'POST':
    // Insert User
    $user->saveUser($data);
    break;
  case 'PUT':
    $user->updateUser($data);
    break;
  case 'DELETE':
    // Delete User
    $user->deleteUser($data);
    break;
  default:
    // Invalid Request Method
    header("HTTP/1.0 405 Method Not Allowed");
    break;
}