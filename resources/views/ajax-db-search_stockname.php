<?php
include('connection.php');
if (isset($_GET['term'])) {
     
   $query = "SELECT name FROM stockname WHERE name LIKE '{$_GET['term']}%'";
    $result = mysqli_query($conn, $query);
 
    if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
      $res[] = $user['name'];
     }
    } else {
      $res = array();
    }
    //return json res
    echo json_encode($res);
}
?>