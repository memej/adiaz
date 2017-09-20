<?php



function displayPlayer($play){
    for($i = 0; $i < count($play); $i++)
        if($i == 3){
        echo "<br>";
        echo "<img src = 'img/$play[$i].png' alt = 'Dice' class = 'dice' />";
        }
    else
        echo "<img src = 'img/$play[$i].png' alt = 'Dice' class = 'dice' />";
}


function winner($play1Sum,$play2Sum){
    
    echo "<div class = 'output'>";
    if($play1Sum > $play2Sum){
        echo "<h1> Player 1 Wins </h1>";
    }
    
    if($play2Sum > $play1Sum){
        echo "<h1> Player 2 Wins </h1>";
    }
    
    if($play1Sum == $play2Sum){
        echo "<h1> Tie </h1>";
    }
    
    echo "</div>";
}



function play(){
    $play1 = array();
    $play2 = array();
    
    for($i = 0; $i < 6; $i++){
        $randomValue1 = rand(1,6);
        $randomValue2 = rand(1,6);
        $play1Sum = $play1Sum + $randomValue1;
        $play2Sum = $play2Sum + $randomValue2;
        array_push($play1, "dice" . $randomValue1);
        array_push($play2, "dice" . $randomValue2);
    }
    
    
   //To shuffle the dice so it doesn't look as uniform 
   shuffle($play1);
   shuffle($play2);
   
    echo "<div id = 'tie'>";
   if($play1Sum == $play2Sum){
       echo "<br />";
       echo "<img src = 'img/tiecat.jpg' alt = 'It's a Tie' />";
       echo "<h3> \"No One Wins >:) \"</h3>";
        echo "<br />";
    echo "<div id = 'p1tie'>";
    echo "<h1 class = 'output'>Player 1 </h1>";
    displayPlayer($play1);
    echo "<h2>Points: $play1Sum </h2>";
    echo "</div>";
    
    echo "<div id = 'p2tie'>";
     echo "<h1 class = 'output'>Player 2 </h1>";
    displayPlayer($play2);
    echo "<h2>Points: $play2Sum </h2>";
    echo "</div>";
   }
   
   echo "</div>";
   
   
   echo "<div class = 'p1'>";
  
    if($play1Sum > $play2Sum){
         echo "<h1 class = 'output'> Player 1 </h1>";
        echo "<img src = 'img/happy1.jpg' alt = 'Player 1 Wins' />";
        echo "<br />";
        echo "<h3> \"I win!!!\"</h3>";
        echo "<br />";
        displayPlayer($play1);
        echo "<h2>Points: $play1Sum </h2>";
    }
    
    if($play2Sum > $play1Sum){
         echo "<h1 class = 'output'> Player 1 </h1>";
         echo "<img src = 'img/sadcat1.jpg' alt = 'Player 1 Loses' />";
         echo "<br />";
         echo "<h3>\"I lose :( \"</h3>";
         echo "<br />";
         displayPlayer($play1);
         echo "<h2>Points: $play1Sum </h2>";
    }
   echo "</div>";
 
   
   echo "<div class = 'p2'>";
   if($play2Sum > $play1Sum){
       echo "<h1 class = 'output'>Player 2 </h1>";
        echo "<img src = 'img/happy2.jpg' alt = 'Player 2 Wins' />";
         echo "<br />";
        echo "<h3> \"I win!!!\"</h3>";
        echo "<br />";
        displayPlayer($play2);
        echo "<h2>Points: $play2Sum </h2>";
    }
    
     if($play1Sum > $play2Sum){
         echo "<h1 class = 'output'>Player 2 </h1>";
       echo "<img src = 'img/sadcat2.jpg' alt = 'Player 2 Loses' />";
        echo "<br />";
        echo "<h3>\"I lose :( \"</h3>";
        echo "<br />";
        displayPlayer($play2);
        echo "<h2>Points: $play2Sum </h2>";
   }
   echo "</div>";
   
   
   winner($play1Sum,$play2Sum);
   
   
  
   
   
   
   
}
    



?>