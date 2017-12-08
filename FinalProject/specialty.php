<?php
        
 include '../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $namedParam = $_GET['passedSpec'];
    
    $sql = "SELECT specialty.*, tour_guides.* FROM specialty JOIN tour_guides WHERE specialty.specialtyId = tour_guides.specialtyId AND specialty.specialtyId ='$namedParam'"; 

    
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    echo "<h2 id = 'locInfo'>Our Guides Trained at the Prestigious: </h2><br>";
    foreach($records as $record){
        echo "<h3>" .$record['training'] . "</h3><br>";
        
        break;
    }
    
     echo "<br><hr>";
     echo "<h2 id = 'SpecInfo'>Tour Guides that have this Specialty</h2><br>";
    foreach ($records as $record) {
           $persId = (string)$record['personId'];
        echo "<h3 class = 'guideInfo'> " . $record['firstName'] . " " . $record['lastName']  . "</h3><br>";
        echo "<strong> More About this Tour Guide: </strong> <br>";
        echo $record['aboutme'];
        echo "<hr>";
        
    }
 
        
?>