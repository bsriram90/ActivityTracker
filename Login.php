<?php
include 'DatabaseCredentials.php';
include 'FetchUserID.php';

list($servername,$username,$password,$dbname,$serverport) = creds();

$email = $_POST['email'];
$pass = $_POST['password'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT COUNT(*) as count, USER_ROLE, PASSWORD FROM ACTIVITY_TRACKER.USER WHERE USERNAME = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $count = $row["count"];
        $userTypeID = $row["USER_ROLE"];
        $password = $row["PASSWORD"];
    }
} else {
  $arr = array('success' => "false", 'userID' => 'null');
  echo json_encode($arr);
}

if($count == 1 && password_verify($pass, $password)){
    //if only 1 user is found, update last login time
    $sql = "UPDATE ACTIVITY_TRACKER.USER SET LAST_LOGIN_TIMESTAMP = now() WHERE USERNAME = '$email'";
    if ($conn->query($sql) === TRUE) {
        $id = fetchUserId($email, $conn);
        $arr = array('success' => "true", 'userID' => $id);
        echo json_encode($arr);
    } else {
        $arr = array('success' => "false", 'userID' => 'null');
        echo json_encode($arr);
    }
}
else{
  $arr = array('success' => "false", 'userID' => 'null');
  echo json_encode($arr);
}

mysqli_close($conn);
?>
