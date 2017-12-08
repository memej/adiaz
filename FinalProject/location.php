<?php
        
include '../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $namedParam = $_GET['passedLoc'];
    
    $sql = "SELECT locations.*, tour_guides.* FROM locations JOIN tour_guides WHERE locations.locationId = tour_guides.locationId AND locations.locationId ='$namedParam'"; 

    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
    echo "<h2 id = 'locInfo'>More About This Location</h2><br>";
    foreach($records as $record){
        echo "<strong>Weather: </strong>" . $record['weather'] . "<br>";
        echo "<strong>Latitude: </strong>" . $record['latitude'] . ",<strong> Longitude: </strong>" . $record['longitude'] . "<br><br>";
        echo $record['description'] . "<br>";
        
        break;
    }
     
     echo "<br><hr>";
     echo "<h2 id = 'locInfo'>Tour Guides that Enjoy this Location</h2><br>";
    foreach ($records as $record) {
           $persId = (string)$record['personId'];
        echo "<h3 class = 'guideInfo'> " . $record['firstName'] . " " . $record['lastName']  . "</h3><br>";
        echo "<strong> More About this Tour Guide: </strong> <br>";
        echo $record['aboutme'];
        echo "<hr>";
        
    }
    
?>