<?php
//CommonResponseModel response1 =  new CommonResponseModel();
class Users
{
  
  function getUsers()
  {
    global $conn;
    $query = "SELECT * FROM users ORDER BY id DESC";
    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  //Get User by id
  function getUserById($user_id)
  {
    global $conn;
    $query = "SELECT * FROM users where id=" . $user_id;
    $response = array();
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);
    if ($rows > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
      }
    } else {
      array_push($response, "No Data Found");
    }

    header('Content-Type: application/json');
    echo json_encode($response);
  }

  //Save user
  function saveUser($data)
  {
    global $conn;
    $query = "INSERT INTO users (firstName, lastName,email) VALUES ('" . $data->firstName . "', '" . $data->lastName . "', '" . $data->email . "')";
	echo $query;
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
    //Respond success / error messages
  }
  //Update user
  function updateUser($data)
  {
    global $conn;
    $query = "UPDATE users SET firstName='" . $data->firstName . "', lastName='" . $data->lastName . "', email='" . $data->email. "' WHERE id=$data->id.";
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
    //Respond success / error messages
  }
  //Delete user
  function deleteUser($user_id)
  {
    global $conn;
    $query = "DELETE FROM users WHERE id=" . $user_id;
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
    //Respond success / error messages
  }
}
