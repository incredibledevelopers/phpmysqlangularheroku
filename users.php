<?php
class Users{
  //Get users
  function getUsers()
  {
    global $conn;
    $query="SELECT * FROM users ORDER BY id DESC";
    $response=array();
    $result=mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result))
    {
      $response[]=$row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }
  //Save user
  function saveUser($data){
    global $conn;
    $query="INSERT INTO users (first_name, last_name) VALUES ('".$data->first_name."', '".$data->last_name."')";
    echo $result=mysqli_query($conn, $query);
    header('Content-Type: application/json');
    //Respond success / error messages
  }
  //Update user
  function updateUser($data){
    global $conn;
    $query = "UPDATE users SET first_name='".$data->first_name."', last_name='".$data->last_name."' WHERE id=$data->id.";
    echo $result=mysqli_query($conn, $query);
    header('Content-Type: application/json');
    //Respond success / error messages
  }
  //Delete user
  function deleteUser($data){
    global $conn;
    $query = "DELETE FROM users WHERE id=".$data->id;
    echo $result=mysqli_query($conn, $query);
    header('Content-Type: application/json');
    //Respond success / error messages
  }
}