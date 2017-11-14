<?php
session_start();

function getInfo(){
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    $sql = "SELECT *
            FROM `secretsanta`
            WHERE username = :username 
            AND   password = :password";
    
    $namedParameters = array();
    $namedParameters[':username'] = $username;
    $namedParameters[':password'] = $password;        
            
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (empty($record)) {
        echo "<br><br>";
        
        echo "<h1>Wrong Username or Password!</h1>";
    } 
    else {
        
        if($record['username'] == "admin") {
            header("Location: admin.php");
        }
        else {
            $_SESSION['username'] = $record['username'];
            $_SESSION['FullName'] = $record['firstName'] . " " . $record['lastName'];
            $_SESSION['personId'] = $record['personId'];
       
            header("Location: secretSanta.php");
        }
    }
}

function isPressed() {
    if (isset($_POST['login'])) {
        getInfo();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Designed by: Arthur Diaz and Kirk Worley -->
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title> Secret Santa Login </title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Berkshire+Swash');
            @import url('https://fonts.googleapis.com/css?family=Roboto');
            @import url("css/styles.css");
        </style>
        <style>
         
            #parent {
                padding: 5% 0;
            }
            
            #child {
                padding: 10% 0;
            }
            
            table {
                margin: 5px;
            }
            
            tr {
                margin: 2px;
                padding: 2px;
            }
            
            td {
                padding: 3px 2px;
            }
            
            hr {
                width: 21%;
                border-color: black;
            }
            
        </style>
    </head>
    
    <body id="parent">
        <div>
            <center>
                <div id="content">
                    <br><br>
                    <img src="http://i.imgur.com/FrCUG8u.png" alt="santa hat" width=70 height=70>
                    
                    <h1>Secret Santa Login</h1>
                    
                    <hr/>
                    
                    <form method="POST">
                        <table>
                            <tr>
                                <td><strong>Username:</strong></td>
                                <td><input type="text" class = "textColor" name="username"/></td>
                            </tr>
                        
                        <tr>
                             <td><strong>Password:</strong></td>
                             <td><input type="password" class = "textColor" name="password"/></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            
                            <td><input type="submit" name="login" class = "button" value="Login"/></td>
                        </tr>
                        
                        </table>
                    </form>
            
                    <?=isPressed()?>
                
                    <hr/>
                </div>
            </center>
        </div>
        
        <br><br>
        <center>Designed by: Arthur Diaz and Kirk Worley</center>
    </body>
</html>