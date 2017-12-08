<?php
include '../dbConnection.php';
$conn = getDatabaseConnection();


$username = $_GET['passedUser'];
$password = sha1($_GET['passedPass']);



$sql = "SELECT *
        FROM tc_admin
        WHERE username = '$username' 
        AND   password = '$password'";

       
        
$stmt = $conn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

 if(empty($record)){
     echo "Wrong Username or Password. Try Again!";
 }
 else{
     echo "Correct";
     header("Location: admin.php");
 }


?>