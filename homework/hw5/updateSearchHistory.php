<?php


include '../../dbConnection.php';
$conn = getDatabaseConnection();

$value = $_GET['passValue'];
echo $value;
$sql = "INSERT INTO `walmartapi` (`search`, `time`) VALUES ('$value', CURRENT_TIMESTAMP)"; 


$stmt = $conn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

//print_r($record);


?>
