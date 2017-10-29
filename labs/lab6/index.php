<?php
session_start();
//print_r($_POST);


function getInfo(){
include '../../dbConnection.php';
$conn = getDatabaseConnection();

//print_r($conn);

$username = $_POST['username'];
$password = sha1($_POST['password']);



$sql = "SELECT *
        FROM tc_admin
        WHERE username = :username 
        AND   password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;        
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

//print_r($record);

if (empty($record)) {
    
    echo "<h1>Wrong Username or Password!</h1>";
    
} else {
    
    //echo "right credentials!";
    $_SESSION['username'] = $record['username'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
   
   header("Location: admin.php"); //redirecting to admin portal
}
}

function isPressed(){
if (isset($_POST['login'])){
    getInfo();
}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
         <style>
            @import url("css/styles.css");
        </style>
        
        <title> Lab 6: Admin Login Page </title>
    </head>
    <body>
        
       <h1> Admin Login </h1>
        
        <form method="POST">
            
            Username: <input type="text" name="username"/> <br />
            
            Password: <input type="password" name="password"/> <br />
            
            <input type="submit" name="login" value="Login"/>
            
            
        </form>
    <?=isPressed() ?>
    
    <hr>
    
    
    </body>
</html>