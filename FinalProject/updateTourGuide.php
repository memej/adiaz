<?php
session_start();


include("../dbConnection.php");
$conn = getDatabaseConnection();

function getGuideInfo($userId) {
    global $conn;    
    $sql = "SELECT * FROM `tour_guides` WHERE personId = $userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    
    return $record;
}



if(isset($_GET['updateGuideForm'])) {
    
    $sql = "UPDATE tour_guides
            SET firstName = :fName,
                lastName = :lName, specialtyId = :specId, locationId = :locId, aboutme = :abtme
			WHERE personId = :userId";
	$namedParameters = array();
	$namedParameters[":fName"] = $_GET['firstName'];
	$namedParameters[":lName"] = $_GET['lastName'];
	$namedParameters[":specId"] = $_GET['specId'];
	$namedParameters[":locId"] = $_GET['locId'];
	$namedParameters[":abtme"] = $_GET['aboutMe'];
	$namedParameters[":userId"] = $_GET['userId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    header("Location: admin.php");
}

if(isset($_GET['personId'])) {
    $userInfo = getGuideInfo($_GET['personId']);
}
?>      
        <title> Admin: Update Employee </title>
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

   

    
        
        <div style = "background-color: white;"><br><h1> Update Employee </h1> </div>
        
        <form>
             <input type="hidden" name="userId" value="<?=$userInfo['personId']?>" />
            First Name: <input type="text" name="firstName" value="<?=$userInfo['firstName']?>" required /> <br>
            Last Name: <input type="text" name="lastName" required value="<?=$userInfo['lastName']?>"/> <br>
            
            Specialty: <select name = "specId" >
                 <option value = "1" <?=(lcfirst($userInfo['specialtyId']) == '1') ? "selected":""?>>Rock Climbing</option>
                <option value = "2" <?=(lcfirst($userInfo['specialtyId']) == '2') ? "selected":""?>>Mountain Biking</option>
                <option value = "3"<?=(lcfirst($userInfo['specialtyId']) == '3') ? "selected":""?>>Archery</option>
                <option value = "4" <?=(lcfirst($userInfo['specialtyId']) == '4') ? "selected":""?>>Hunting</option>
                <option value = "5" <?=(lcfirst($userInfo['specialtyId']) == '5') ? "selected":""?>>Tracking</option>
            </select>
            <br />
                        
            Location: <select name = "locId">
              
                 <option value = "1" <?=(lcfirst($userInfo['locationId']) == '1') ? "selected":""?>>Niagara Falls, NY </option>
                <option value = "2"<?=(lcfirst($userInfo['locationId']) == '2') ? "selected":""?>>Big Sur, CA</option>
                <option value = "3" <?=(lcfirst($userInfo['locationId']) == '3') ? "selected":""?>>Monterey, CA</option>
                <option value = "4" <?=(lcfirst($userInfo['locationId']) == '4') ? "selected":""?>>Carmel, CA</option>
                <option value = "5" <?=(lcfirst($userInfo['locationId']) == '5') ? "selected":""?>>Grand Canyon, AZ</option>
                <option value = "6" <?=(lcfirst($userInfo['locationId']) == '6') ? "selected":""?>>Washington Monument, VA</option>
            </select>
            <br>
            About Me:
             <input type = "text" name="aboutMe" value="<?=$userInfo['aboutme']?>"><br>
            <input type="submit" name="updateGuideForm" value="Update!"/>
        </form>
        
    


    </body>
</html>

