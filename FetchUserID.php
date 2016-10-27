<?php
function fetchUserId($email, $conn){

  $sql = "SELECT ID FROM ACTIVITY_TRACKER.USER WHERE USERNAME = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $id = $row["ID"];
      }
  } else {
      echo 'false';
  }

 return $id;

}

?>
