<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection();
$value=$_GET['passValue'];
 $sql="SELECT COUNT(*) AS c FROM `walmartapi` WHERE search='$value' GROUP BY search";
    
          
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $records=$stmt->fetch(PDO::FETCH_ASSOC);
 
  echo $records['c'];
?>
