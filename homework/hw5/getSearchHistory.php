<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection();
$value=$_GET['passValue'];
 $sql="SELECT * 
          FROM walmartapi
          WHERE search='$value'";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $records=$stmt->fetchAll();
  
  echo "Search History: <br>";
  foreach($records as $record){
        echo $record['time']."<br>";
  }
  
  
?>