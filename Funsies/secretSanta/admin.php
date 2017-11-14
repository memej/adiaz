<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection();

if (!isset($_SESSION['username'])) { // checks whether admin has logged in
    header("Location: index.php");
    exit();
}

function shufflePeople() {
    global $conn;
    
    if(isset($_POST['shuffle'])) {
        $users = getUsers();
        $santas = array();
        $assign = array();
        
        // Populate santas with first names.
        foreach($users as $u) {
            array_push($santas, $u['firstName']);
            array_push($assign, $u['firstName']);
        }
        
        // Shuffle initially
        shuffle($santas);
        
        // Do this until empty.
        while(!empty($santas)) {
            
            // Shuffle so no one gets themselves.
            while($assign[0] == $santas[0]) {
                shuffle($santas);
            }
            
            // SQL to update db.
            $sql = "UPDATE `secretsanta` SET `assigneeF` = :assignF WHERE firstName = :name";
            $namedParameters = array(":assignF" => $santas[0], ":name" => $assign[0]);
            
            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            
            // Remove first value from both arrays.
            array_shift($assign);
            array_shift($santas);
        }
    }
}

function getUsers() {
    global $conn;
    
    $sql = "SELECT * 
            FROM `secretsanta` WHERE firstName != 'admin'";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $users;
}


shufflePeople();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <style>
            @import url("css/styles.css");
            
            input[type=submit] {
                height: 100%;
                width: 100%;
                font-size: 10em;
                text-align: center;
            }
            
            #info {
                padding: 5% 0;
            }
            
            form {
                padding: 10% 0;
            }
        </style>
        
        <title>Admin Page </title>
    </head>
    
    <body id = "admin">
        <div id = "info">
            <form method="POST">
                <input type="submit" name="shuffle" value="Shuffle Santas" />
            </form>
            <form action = "logout.php">
                 <input type="submit" value="Logout" />
            </form>
        </div>
    </body>     
</html>