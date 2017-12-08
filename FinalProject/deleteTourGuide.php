<?php

    include("../dbConnection.php");
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM tour_guides 
            WHERE personId = " . $_GET['personId'];

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");
    
?>