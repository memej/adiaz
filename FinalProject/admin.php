<?php

include '../dbConnection.php';
$conn = getDatabaseConnection();


function displayGuides() {
    
    
    global $conn;
    $sql = "SELECT * 
            FROM tour_guides WHERE 1";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($users);
    foreach($users as $user){
        $counter++;
    }
    return $users;
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
         <style>
            @import url('https://fonts.googleapis.com/css?family=Spectral+SC');
            body{
                background-color:#faaf87;
                text-align: center;
                font-family: 'Spectral SC', serif;
            }
        </style>
        <title>Admin Page </title>
        
        <style>
            body{
                text-align: center;
            }
        </style>
        
        <script>
            
            function confirmDelete(firstName) {
                
                
                return confirm("Are you sure you want to delete " + firstName + "?");
                
            }
            
            
        </script>
    </head>
    <body>
        <div style = "background-color:white;">
        <br>
        <h1>Admin Page</h1><br>
        </div>
       
        <h2>Finance Report</h2>
        
        <?php
        function finance() {
            $counter = 0;
            global $conn;
            $sql = "SELECT * 
                    FROM tour_guides WHERE 1";
            $statement = $conn->prepare($sql);
            $statement->execute();
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            //print_r($users);
            foreach($users as $user){
                $counter++;
            }
             echo "<h4> Current Number of Employees: " . $counter . "</h4>";
             echo "<h4> Current Price per Tour Based on # of Employees: $" . (20* $counter)/4 . "</h4>";
             echo "<h4> Current # of Employees able to operate in each location (approx): " . (intval($counter / 6)) . "</h4>";
            }
        finance();
        
       
        
        ?>
        
        <hr>
        <h2>Hire, Update, or Fire an Employee Tour Guide</h2>
        
        <hr>
        <div id = "info">
        <form action="addTourGuide.php">
            
            <input type="submit" class="btn btn-info btn-lg" value="Add Employee" />
            
        </form>
        
        
        
        
        
        <br /><br />
        <h4>Current Employee Roster:</h4>
        <?php
        
        $users =displayGuides();
        
        foreach($users as $user) {
            
            echo $user['firstName'] . "  " . $user['lastName'] . "|";
            echo "[<a href='updateTourGuide.php?personId=".$user['personId']."'> Update </a> ]";
            echo "<form action='deleteTourGuide.php' style='display:inline' onsubmit='return confirmDelete(\"".$user['firstName']."\")'>
                     <input type='hidden' name='personId' value='".$user['personId']."' />
                     <input type='submit' value='Fire'>
                  </form>
                ";
            
            echo "<br />";
            
        }
        
        
        
        ?>
        <br><br>
        <form action="index.php">
            
            <input type="submit" class="btn btn-info btn-lg" value="Logout" />
            
        </form>
        
        <br><br>
        </div>
    </body>     
</html>