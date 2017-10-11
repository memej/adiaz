<?php

function countPoints($Q1, $Q2, $Q3, $Q4, $Q5, $PQ1, $PQ2, $PQ3, $PQ4, $PQ5, $PQ6, $Q7, $Q8, $Q9, $Q10){
    $points = array(0,0,0,0,0);
    
   $dragName = $Q2;
   $points = questionOne($Q1, $points);
   $points = questionThree($Q3, $points);
   $points = questionFour($Q4, $points);
   $points = questionFive($Q5, $points);
   $points = questionSix($PQ1, $PQ2, $PQ3, $PQ4, $PQ5, $PQ6, $points);
   $points = questionSeven($Q7, $points);
   $points = questionEight($Q8, $points);
   $points = questionNine($Q9, $points);
   $points = questionTen($Q10, $points);
   
   printSandwich($points);
   
}

function questionOne($Q1, $points){
    if($Q1 == 'Q1'){
        $points[2]++;
    }
    
    if($Q1 == 'Q2'){
        $points[1]++;
    }
    
    if($Q1 == 'Q3'){
       $points[4]++; 
    }
    
    if($Q1 == 'Q4'){
        $points[3]++;
    }
    
    if($Q1 == 'Q5'){
        $points[0]++;
    }
    return $points;
}

//Meatball, Turkey, Vegetarian, Salami, Buffalo Chicken
function questionThree($Q3, $points){
    if($Q3 == 'Q1'){
        $points[4]++;
    }
    
    if($Q3 == 'Q2'){
        $points[3]++;
    }
    
    if($Q3 == 'Q3'){
       $points[1]++; 
    }
    
    if($Q3 == 'Q4'){
        $points[2]++;
    }
    
    if($Q3 == 'Q5'){
        $points[0]++;
    }
    return $points;
}

//Meatball, Turkey, Vegetarian, Salami, Buffalo Chicken
function questionFour($Q4, $points){
    if($Q4 == 'Q1'){
        $points[1]++;
    }
    
    if($Q4 == 'Q2'){
        $points[3]++;
    }
    
    if($Q4 == 'Q3'){
       $points[4]++; 
    }
    
    if($Q4 == 'Q4'){
        $points[2]++;
    }
    
    if($Q4 == 'Q5'){
        $points[0]++;
    }
    return $points;
}
//Meatball, Turkey, Vegetarian, Salami, Buffalo Chicken
function questionFive($Q5, $points){
    if($Q5 == 'Q1'){
        $points[4]++;
    }
    
    if($Q5 == 'Q2'){
        $points[2]++;
    }
    
    if($Q5 == 'Q3'){
       $points[0]++; 
    }
    
    if($Q5 == 'Q4'){
        $points[3]++;
    }
    
    if($Q5 == 'Q5'){
        $points[1]++;
    }
    return $points;
}

//Meatball, Turkey, Vegetarian, Salami, Buffalo Chicken
function questionSix($PQ1, $PQ2, $PQ3, $PQ4, $PQ5, $PQ6, $points){
    if($PQ1 !=""){
        $points[4]++;
    }
    
    if($PQ2 !=""){
        $points[1]++;
    }
    
    if($PQ3 !=""){
        $points[2]++;
    }
    
    if($PQ4 !=""){
        $points[3]++;
    }
    
    if($PQ5 !=""){
        $points[0]++;
    }
    
    if($PQ6 !=""){
        $points[0]++;
        $points[1]++;
        $points[2]++;
        $points[3]++;
        $points[4]++;
    }
    return $points;
}

function questionSeven($Q7, $points){
    if($Q7 == 'Q1'){
        $points[3]++;
    }
    
    if($Q7 == 'Q2'){
        $points[0]++;
    }
    
    if($Q7 == 'Q3'){
       $points[1]++; 
    }
    
    if($Q7 == 'Q4'){
        $points[2]++;
    }
    
    if($Q7 == 'Q5'){
        $points[4]++;
    }
    return $points;
}
//Meatball, Turkey, Vegetarian, Salami, Buffalo Chicken
function questionEight($Q8, $points){
    if($Q8 == 'Q1'){
        $points[4]++;
        $points[0]++;
    }
    
    if($Q8 == 'Q2'){
        $points[1]++;
        $points[3]++;
    }
    
    if($Q8 == 'Q3'){
       $points[2]++; 
    }
    
    return $points;
}

//Meatball, Turkey, Vegetarian, Salami, Buffalo Chicken
function questionNine($Q9, $points){
    if($Q9 == 'Q1'){
        $points[4]++;
    }
    
    if($Q9 == 'Q2'){
        $points[2]++;
    }
    
    if($Q9 == 'Q3'){
       $points[1]++; 
    }
    
    if($Q9 == 'Q4'){
        $points[0]++;
    }
    
    if($Q9 == 'Q5'){
        $points[3]++;
    }
    return $points;
}

//Meatball, Turkey, Vegetarian, Salami, Buffalo Chicken
function questionTen($Q10, $points){
    if($Q10 == 'Q1'){
        $points[2]++;
    }
    
    if($Q10 == 'Q2'){
        $points[1]++;
    }
    
    if($Q10 == 'Q3'){
       $points[4]++; 
    }
    
    if($Q10 == 'Q4'){
        $points[0]++;
    }
    
    if($Q10 == 'Q5'){
        $points[3]++;
    }
    return $points;
}
 
 function findWinner($points){
     
     $max = $points[0];
     for($i = 0; $i < 5; $i++){
         if($points[$i] > $max){
             $max = $i;
         }
         
     }
     return $max;
    
 }
 
 
 function printSandwich($points){
    echo "<div id = 'result'>";
    $index = findWinner($points);
    if($index == 0){
        echo "<h1> Meatball </h1>";
    }
    
    else if($index == 1){
         echo "<h1> Turkey </h1>";
    }
    
    else if($index == 2){
         echo "<h1> Vegetarian </h1>";
    }
    
    else if($index == 3){
         echo "<h1> Salami </h1>";
    }
    
    else if($index == 4){
         echo "<h1> Buffalo Chicken </h1>";
    }
  echo "</div>";  
 }




?>
