<?php

function displaySymbol($symbols){
    echo "<img src = '../labs/lab2/img/$symbols.png' width = '70' />";
}
$symbols = array("lemon","orange","grapes");

print_r($symbols);

echo $symbols[0];

$symbols[2] = "seven";

array_push($symbols, "grapes");


for($i = 0; $i < count($symbols); $i++){
    displaySymbol($symbols[$i]);
}

sort($symbols);
print_r($symbols);

//shuffle($symbols);
echo "<hr>";
print_r($symbols);
echo "<hr>";


$lastSymbol = array_pop($symbols);
displaySymbol($lastSymbol);
echo "<hr>";
print_r($symbols);


foreach($symbols as $symbol){
    displaySymbol($symbol);
    
unset($symbols[2]);
echo "<hr>";
print_r($symbols);
$symbols = array_values($symbols);
echo "<hr>";
print_r($symbols);


displaySymbol($symbols[rand(0,count($symbols)-1)]);
}


?>



<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
      
        
    </head>
    <body>
        
      <!-- For class finish 1, 2, and 3 -->
        
    </body>
</html>