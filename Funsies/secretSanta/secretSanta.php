<?php
session_start();
include '../../dbConnection.php';
$conn = getDatabaseConnection();
$yourSantaInfo = null;

if (!isset($_SESSION['username'])) { // checks whether admin has logged in
    header("Location: index.php");
    exit();
}

function displayUser() {
    global $conn, $yourSantaInfo;
    
    $id = $_SESSION['personId'];
    $sql = "SELECT * 
            FROM secretsanta WHERE 
            personId= :personId";
    
    $nameParameters = array();
    $nameParameters[':personId'] = $id;
    $statement = $conn->prepare($sql);
    $statement->execute($nameParameters);
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    
    echo "<h3>Your current interests:</h3>";
    echo " - ";
    echo (empty($user['firstInterest']) ? "None! Add one so your santa can give you stuff." : $user['firstInterest']) . "<br>";
    echo " - ";
    echo (empty($user['secondInterest']) ? "None! Add one so your santa can give you stuff." : $user['secondInterest']) . "<br>";
    echo " - ";
    echo (empty($user['thirdInterest']) ? "None! Add one so your santa can give you stuff." : $user['thirdInterest']) . "<br>";
    echo "<h4>Additional Info:</h4>";
    echo " - ";
    echo (empty($user['additionalInfo']) ? "You have no additional info listed." : $user['additionalInfo']) . "<br>";
    
    $yourSantaInfo = getSantaInfo($user['assigneeF']);
}

function getSantaInfo($assigneeFirst) {
    global $conn;
    
    $sql = "SELECT firstName, firstInterest, secondInterest, thirdInterest, additionalInfo
            FROM `secretsanta` WHERE firstName = :afn";
    $namedParameters = array(":afn" => $assigneeFirst);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $info = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $info;
}

function displaySantaInfo() {
    global $yourSantaInfo;
    
    echo "<h3>You have " . $yourSantaInfo['firstName'] . "!</h3>";
    echo "<h4>Their interests are:</h4>";
    echo " - ";
    echo (empty($yourSantaInfo['firstInterest']) ? ($yourSantaInfo['firstName'] . " has not added a 1st interest.") : $yourSantaInfo['firstInterest']);
    echo "<br>";
    echo " - ";
    echo (empty($yourSantaInfo['secondInterest']) ? ($yourSantaInfo['firstName'] . " has not added a 2nd interest.") : $yourSantaInfo['secondInterest']);
    echo "<br>";
    echo " - ";
    echo (empty($yourSantaInfo['thirdInterest']) ? ($yourSantaInfo['firstName'] . " has not added a 3rd interest.") : $yourSantaInfo['thirdInterest']);
    echo "<br>";
    echo "<h4>Additional Info:</h4>";
    echo " - ";
    echo (empty($yourSantaInfo['additionalInfo']) ? ($yourSantaInfo['firstName'] . " has no additional info.") : $yourSantaInfo['additionalInfo']);
}

function updateData() {
    global $conn;
    
    if(isset($_POST['update']) && (!empty($_POST['interestOne']) || !empty($_POST['interestTwo']) || !empty($_POST['interestThree']) || !empty($_POST['addition']))) {
        $fI = $_POST['interestOne'];
        $sI = $_POST['interestTwo'];
        $tI = $_POST['interestThree'];
        $iI = $_POST['addition'];
        $pId = $_SESSION['personId'];
        
        $sql = "UPDATE `secretsanta` SET";
        $namedParameters = array(":id" => $pId);
        
        if(!empty($fI)) {
            $sql .= ((!empty($sI) || !empty($tI) || !empty($iI)) ? " `firstInterest` = :inOne," : " `firstInterest` = :inOne");
            $namedParameters[":inOne"] = $fI;
        }
        if(!empty($sI)) {
            $sql .= ((!empty($tI) || !empty($iI)) ? " `secondInterest` = :inTwo," : " `secondInterest` = :inTwo");
            $namedParameters[":inTwo"] = $sI;
        }
        if(!empty($tI)) {
            $sql .= (!empty($iI) ? " `thirdInterest` = :inThree," : " `thirdInterest` = :inThree");
            $namedParameters[":inThree"] = $tI;
        }
        if(!empty($iI)) {
            $sql .= " `additionalInfo` = :info";
            $namedParameters[":info"] = $iI;
        }

        $sql .= " WHERE `secretsanta`.`personId` = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        
        header("Location: secretSanta.php");
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        
         <style>
            @import url("css/styles.css");
            @import url('https://fonts.googleapis.com/css?family=Roboto');
            @import url('https://fonts.googleapis.com/css?family=Berkshire+Swash');
            
            hr {
                width: 50%;
                border-color: black;
            }
        </style>
        
        <title>SECRET SANTA</title>
    </head>
    
    <body id = "reInterest">
        <div >
            <h1> Welcome to the CS++ Secret Santa <?=$_SESSION['FullName']?>! </h1>
            <hr>
            
            <div id = "info">
                <?=displayUser()?>
                <hr>
                <?=displaySantaInfo()?>
                <hr>
            
                <h4>Update your interests (You can update them individually):</h4>
                <form method="POST">
                    Interest 1: <br>
                    <textarea name="interestOne" class = "textColor" placeholder="A thing you like. [Character Limit: 500]"></textarea><br>
                    Interest 2: <br>
                    <textarea name="interestTwo" class = "textColor" placeholder="Another thing you like [Character Limit: 500]."></textarea><br>
                    Interest 3: <br>
                    <textarea name="interestThree" class = "textColor" placeholder="Another thing you like[Character Limit: 500]."></textarea><br>
                    Additional Info: <br>
                    <textarea name="addition" class = "textColor" placeholder="Allergies? Caveats? Enter it here[Character Limit: 500]."></textarea><br>
                    <input type="submit" name="update" class = "button1" class = "textColor" value="Submit"><br>
                </form>
                <br>
                 <form action="logout.php">
                    <input type="submit" class = "button1" class = "textColor" value="Logout"/>
                </form>
            </div>
        
            <br><br>
            <?=updateData()?>
        </div>
        
        <br>
        <center><span>Designed by: Arthur Diaz and Kirk Worley</span></center>
        <br>
    </body>     
</html>