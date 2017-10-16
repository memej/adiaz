<?php

include '../../dbConnection.php';

$conn = getDatabaseConnection();

function getDeviceTypes() {
    global $conn;
    $sql = "SELECT DISTINCT(deviceType)
            FROM `tc_device` 
            ORDER BY deviceType";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['deviceType'] . "</option>";
        
    }
}


function displayDevices(){
    global $conn;
    
    $sql = "SELECT * FROM `tc_device` WHERE 1 ";
    
    
    if (isset($_GET['submit'])){
        
        $namedParameters = array();
        
        
        if (!empty($_GET['deviceName'])) {
           
             $sql .= " AND deviceName LIKE :deviceName"; //using named parameters
            $namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%";

         }
         
        if (!empty($_GET['deviceType'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
            
            $sql .= " AND deviceType = :deviceType"; //using named parameters
            $namedParameters[':deviceType'] =   $_GET['deviceType'] ;
            }
            

              
         
        if(isset($_GET['available'])) {
            $sql .= " AND status = 'A'";
       
        }
    
        if($_GET['orderBy'] == 'name') {
            $sql .= " ORDER BY deviceName";
        
            
        }
    
        if($_GET['orderBy'] == 'price') {
            $sql .= " ORDER BY price";
        
    }
    
    if(!isset($_GET['orderBy'])) {
        $sql .= " ORDER BY deviceName";
         
    
    }
        
        
        
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h2> Device Name | Device Type | Price | Status | Checkout History </h2>";
    echo "<br />";
     foreach ($records as $record) {
        
        echo "<h3> ". $record['deviceName'] . "  |  " . $record['deviceType'] . "  |  $" .
              $record['price'] .  "  |  " . $record['status'] . 
              " | <a target= 'checkoutHistory' href='checkoutHistory.php?deviceId=".$record['deviceId']."'> Checkout History </a> <br /> </h3>";
        
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 5: Device Search </title>
        
        <style>
            @import url('css/styles.css');
        </style>
    </head>
    <body>
        
        <h1> Technology Center: Checkout System </h1>
        
        <form>
            Device: <input type="text" name="deviceName" placeholder="Device Name"/>
            Type: 
            <select name="deviceType">
                        <option value=""> Select One</option>
                        <?=getDeviceTypes()?>
                    </select>
            
            <input type="checkbox" name="available" id="available">
            <label for="available"> Available? </label>
            
            <br>
            Order by:
            <input type="radio" name="orderBy" id="orderByName" value="name"/> 
             <label for="oderByName"> Name </label>
            <input type="radio" name="orderBy" id="orderByPrice" value="price"/> 
             <label for="oderByPrice"> Price </label>
            
            
            
            <input type="submit" value="Search!" name="submit" >
        </form>
        
        
        <hr>
        
        <?=displayDevices()?>
        <iframe name="checkoutHistory" width="400" height="400"></iframe>

    </body>
</html>