<?php


 include("../dbConnection.php");
 $conn = getDatabaseConnection();



if (isset($_GET['addGuideForm'])){
    
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $spId  = $_GET['specId'];
    $locId = $_GET['locId'];
    $abme   = $_GET['aboutMe'];
   
   
 

    $sql = "INSERT INTO tour_guides
            (firstName, lastName, specialtyId, locationId, aboutme, personId)
            VALUES
            ('$firstName', '$lastName', '$spId', '$locId', '$abme', NULL)";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    
    header("Location: admin.php");  
    
}

?>

<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        
        <title> Admin: Adding New Employee </title>
 <style>
            @import url('https://fonts.googleapis.com/css?family=Spectral+SC');
            body{
                background-color:#faaf87;
                text-align: center;
                font-family: 'Spectral SC', serif;
            }
        </style>
    </head>
    <body>

   

    <fieldset>
        
        <legend style = "background-color:white;"><h1> Add New Employee </h1></legend>
        
        <form>
            
            First Name: <input type="text" name="firstName" required /> <br>
            Last Name: <input type="text" name="lastName" required/> <br>
            Specialty: <select name = "specId">
                 <option value = "1">Rock Climbing</option>
                <option value = "2">Mountain Biking</option>
                <option value = "3">Archery</option>
                <option value = "4">Hunting</option>
                <option value = "5">Tracking</option>
            </select>
            <br />
                        
            Location: <select name = "locId">
              
                 <option value = "1">Niagara Falls, NY</option>
                <option value = "2">Big Sur, CA</option>
                <option value = "3">Monterey, CA</option>
                <option value = "4">Carmel, CA</option>
                <option value = "5">Grand Canyon, AZ</option>
                <option value = "6">Washington Monument, VA</option>
            </select>
            <br>
            About Me:
             <textarea name="aboutMe"  placeholder="[Character Limit: 150]."></textarea><br>
            <input type="submit" name="addGuideForm" value="Hire!"/>
        </form>
        
    </fieldset>


    </body>
</html>