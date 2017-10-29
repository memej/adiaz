<?php

global $dept;

function displayUserInformation() {
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * 
            FROM `tc_user` 
            WHERE userId = :userId " ;
            
    
    
     $namedParam = array(":userId"=>$_GET['userId']);
   
   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<h2> " . $record['firstName'] . " " . $record['lastName'] . " Information </h2>";
        echo "<br />";
        echo  "User ID: " . $record['userId'] . "<br/>";
        echo  "Email: " . $record['email'] . "<br/>";
        echo  "University ID: " . $record['universityId'] . "<br/>";
        echo  "Gender: " . $record['gender'] . "<br/>";
        echo  "Phone Number: " . $record['phone']. "<br/>";
        echo  "Role: " . $record['role'] . "<br/>";
        $dept = $record['deptId'];
        
    }
    
     $sql = "SELECT * 
            FROM `tc_department` 
            WHERE departmentId = :deptId" ;
            
    
     $namedParam = array(":deptId"=>$dept);
   
 
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        echo "Department: " . $record['deptName'] . "<br/>";
        echo "College: " . $record['college'];
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
        
        <title> User Information </title>
    </head>
    <body>
        


        <?=displayUserInformation()?>

    </body>
</html>

