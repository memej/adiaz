

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
   
   //Makes sure the are filled out before the sandwich is chosen
   if(!isset($Q1) && !isset($Q2) && !isset($Q3) && !isset($Q4) && !isset($Q5) && !isset($Q7) && !isset($Q8) &&
   !isset($Q9) && !isset($Q10) && ( !isset($PQ1) ||  !isset($PQ2) ||  !isset($PQ3) ||  !isset($PQ4) ||  !isset($PQ5) || !isset($PQ6))){
    echo "";
   }
   
    else if (empty($Q1) || empty($Q2) || empty($Q3) || empty($Q4) || empty($Q5) || empty($Q7) || empty($Q8) || empty($Q9) || empty($Q10)) {
            
        echo "<h2 style='color:red' id = 'error'> *Error! You must complete the whole quiz! </h2>";
        return;
        exit;
        }
                 
   else{
       printSandwich($points, $Q2);
   }
   
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
 
 
 function printSandwich($points, $Q2){
    echo "<div id = 'result'>";
    echo "<br/>";
    $index = findWinner($points);
    if($index == 0){
        echo "<h1> Congratulations $Q2!!! You are definitely a Meatball Sub. </h1>";
        echo "<img src= 'img/meat.jpg' width = '400px' />";
        
    }
    
    else if($index == 1){
         echo "<h1>  Congratulations $Q2!!! You are most like Turkey Sandwich </h1>";
         echo "<img src= 'img/turkey.jpg' width = '400px' />";
    }
    
    else if($index == 2){
         echo "<h1>  Congratulations $Q2!!! WOOO! You are a Vegetarian Sandwich! </h1>";
         echo "<img src= 'img/veggie.jpg' width = '400px' />";
    }
    
    else if($index == 3){
         echo "<h1>  Congratulations $Q2!!! You are most definitely a Salami Sandwich! </h1>";
         echo "<img src= 'img/salami.jpg' width = '400px' />";
    }
    
    else if($index == 4){
         echo "<h1>  Congratulations $Q2!!! You area a firey Buffalo Chicken Sandwich! </h1>";
         echo "<img src= 'img/chicken.jpg' width = '400px' />";
    }
    
    echo "<br/><br />";
    echo "<hr />";
  echo "</div>";  
 }



 function checkIfSelected($option) {
        
        if ($option == $_GET['category']) {
            
            return "selected";
            
        }
        
    }
    
  function checkIfChecked($option){
      if($option == $_GET['musicService']){
          return "checked";
      }
      if($option == $_GET['musicService1']){
          return "checked";
      }   
      if($option == $_GET['musicService2']){
          return "checked";
      }
      if($option == $_GET['musicService3']){
          return "checked";
      }
      if($option == $_GET['musicService4']){
          return "checked";
      }
      if($option == $_GET['musicService5']){
          return "checked";
      }
  }
?>


<!DOCTYPE html>
<html>
    <head>
        
        <title>What Kind of Sandwich Are You?</title>
         <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Anton|Modak|Rye');
            @import url("css/styles.css");
            
        </style>
        
        <header id = "Intro">
            <br />
            <h1>What Kind of Sandwich Are You?!? </h1>
      <h2>Find Out Now by Taking the Quiz Below</h2>
      <hr />
      
        </header>
        
    </head>
    <body>
        <?php countPoints($_GET['Question1'], $_GET['DragName'], $_GET['category'], $_GET['Question4'], $_GET['Question5'], $_GET['musicService'], $_GET['musicService1'], $_GET['musicService2'], $_GET['musicService3'], $_GET['musicService4'], $_GET['musicService5'], $_GET['Question7'], $_GET['Question8'],$_GET['Question9'], $_GET['Question10']); ?>
        
        <form id ="quiz">
            <h3>Question 1: If you were to meet an alien how would you react?</h3>
            <input type="radio" id = "A1" name="Question1" value="Q1" <?= ($_GET['Question1']=='Q1')?"checked":""  ?> > 
                <label for="A1">Give it a fist bump and invite it to chill with you.</label>
                <br/>
            <input type="radio" name="Question1" id = "A2" value="Q2" <?= ($_GET['Question1']=='Q2')?"checked":""  ?> >
                 <label for = "A2">Run away frantically and hope the alien didn't see you.</label>
                 <br />
            <input type="radio" name="Question1" id = "A3" value="Q3" <?= ($_GET['Question1']=='Q3')?"checked":""  ?>>
                 <label for = "A3">Throw a rock at the alien and hope that you killed it.</label>
                 <br/>
            <input type="radio" name="Question1" id = "A4" value="Q4" <?= ($_GET['Question1']=='Q4')?"checked":""  ?>>
                   <label for = "A4">Ask it out on a date to your favorite sushi place.</label>
                 <br/>
            <input type="radio" name="Question1" id = "A5" value="Q5" <?= ($_GET['Question1']=='Q5')?"checked":""  ?>>
              <label for = "A5">Kill it and dissect it for science.</label>
             <br /><br/>
             
             
        <h3>Question 2: If you were a Drag Queen what would your name be?</h3>
        
            <input type = "text" name = "DragName" value="<?=$_GET['DragName']?>"> 
        
           <br/><br/>
       
       <h3>Question 3: Of the five images below. Which one describes you the most?</h3>
            <select name="category">
                <option value="">Select One</option>
                <option <?=checkIfSelected('pic1')?> value="pic1"> Sexy Witch</option>
                <option <?=checkIfSelected('pic2')?> value = "pic2"> Hot Pirate</option>
                <option <?=checkIfSelected('pic3')?> value = "pic3"> Vivacious Geisha </option>
                <option <?=checkIfSelected('pic4')?> value = "pic4"> Appropriate Child </option>
                <option <?=checkIfSelected('pic5')?> value = "pic5"> Hunky Swedish Man </option>
            </select>
        
        <div id = "pics">
            <img src = "img/pic1.jpg" width = "200px" alt = "Sexy Witch" title = "Sexy Witch">
            <img src = "img/pic2.jpg" width = "200px" alt = "Hot Pirate" title = "Hot Pirate">
            <img src = "img/pic3.jpg" width = "200px" alt = "Vivacious Geisha" title = "Vivacious Geisha">
            <img src = "img/pic4.jpg" width = "200px" alt = "Appropriate Child" title = "Appropriate Child">
            <img src = "img/pic5.jpg" width = "200px" alt = "Hunky Swedish Man" title = "Hunky Swedish Man">
        </div>    
        <br/><br/>
            
        <h3>Question 4: If a cat comes up to you and wants love what do you do?</h3>
            <input type="radio" name="Question4" id = "Q4A1" value="Q1" <?= ($_GET['Question4']=='Q1')?"checked":""  ?>>
             <label for = "Q4A1">Of course I pet it! I can't turn away love from a cat. </label><br> 
            <input type="radio" name="Question4" id="Q4A2" value="Q2" <?= ($_GET['Question4']=='Q2')?"checked":""  ?>> 
             <label for = "Q4A2">Push the cat away and avoid the cat at all costs.</label> <br> 
            <input type="radio" name="Question4" id = "Q4A3" value="Q3" <?= ($_GET['Question4']=='Q3')?"checked":""  ?>> 
             <label for = "Q4A3">Steal the cat and take it home.</label> <br> 
            <input type="radio" name="Question4" id = "Q4A4" value="Q4" <?= ($_GET['Question4']=='Q4')?"checked":""  ?>> 
             <label for = "Q4A4">I'm allergic to cats.</label><br> 
            <input type="radio" name="Question4" id = "Q4A5" value="Q5" <?= ($_GET['Question4']=='Q5')?"checked":""  ?>> 
             <label for = "Q4A5">What if the cat is feral? I could get FIV and die. Cats are terrifying creatures.</label> 
            
            <br/><br/>
            
        <h3>Question 5: There is a killer on the loose and you know what he looks like. What do you do in this situation?</h3>
            <input type="radio" name="Question5" id ="Q5A1"value="Q1" <?= ($_GET['Question5']=='Q1')?"checked":""  ?> > 
             <label for = "Q5A1">Since I know the killer I'm gonna hunt him down myself. I get my weapons and my coolest clothes so I can get him in style.
                                                                Besides is the killer even that scary?</label> <br /> 
            <input type="radio" name="Question5" id ="Q5A2" value="Q2" <?= ($_GET['Question5']=='Q2')?"checked":""  ?>> 
             <label for = "Q5A1">I have to call the police!! It's the only right thing to do.</label> <br /> 
            <input type="radio" name="Question5" id="Q5A3" value="Q3" <?= ($_GET['Question5']=='Q3')?"checked":""  ?>> 
             <label for = "Q5A2">I board up my entire house and take all the extra precautions necessary so I know that I won't die.</label> <br/> 
            <input type="radio" name="Question5" id="Q5A4" value="Q4" <?= ($_GET['Question5']=='Q4')?"checked":""  ?>> 
             <label for = "Q5A3">Hop in my car and leave the town immediately.</label> <br> 
            <input type="radio" name="Question5" id = "Q5A5"value="Q5" <?= ($_GET['Question5']=='Q5')?"checked":""  ?> >
             <label for = "Q5A4">Call the News and make sure you get your five minutes of fame. </label>
        
        <br/><br/>
        
        <h3>Question 6: What service do you use to listen to music? [May Choose More Than One]</h3>
        <input type="checkbox" id="spotify" name="musicService" value="spotify" <?= checkIfChecked('spotify') ?>>
        <label for="spotify">Spotify</label><br/>
        <input type="checkbox" id="youtube" name="musicService1" value="youtube"  <?= checkIfChecked('youtube') ?>>
        <label for="youtube">YouTube</label><br/>
        <input type="checkbox" id="applemusic" name="musicService2" value="applemusic" <?= checkIfChecked('applemusic') ?>>
        <label for="applemusic">Apple Music</label><br/>
        <input type="checkbox" id="itunes" name="musicService3" value="itunes" <?= checkIfChecked('itunes') ?>>
        <label for="itunes">iTunes</label><br/>
         <input type="checkbox" id="pandora" name="musicService4" value="pandora" <?= checkIfChecked('pandora') ?>>
        <label for="pandora">Pandora</label><br/>
        <input type="checkbox" id="none" name="musicService5" value="none" <?= checkIfChecked('none') ?>>
        <label for="none">I don't listen to music</label><br/>
            
            <br/>
            
        <h3>Question 7: If you were a shape. What shape would you be?</h3>
            <input type="radio" id="Q7A1" name="Question7" value="Q1" <?= ($_GET['Question7']=='Q1')?"checked":""  ?>>
             <label for = "Q7A1">Triangle</label> <br> 
            <input type="radio"id="Q7A2" name="Question7" value="Q2" <?= ($_GET['Question7']=='Q2')?"checked":""  ?>>
             <label for = "Q7A2">Diamond</label> <br> 
            <input type="radio" id="Q7A3" name="Question7" value="Q3" <?= ($_GET['Question7']=='Q3')?"checked":""  ?> >
             <label for = "Q7A3">Decagon</label> <br> 
            <input type="radio" id="Q7A4" name="Question7" value="Q4" <?= ($_GET['Question7']=='Q4')?"checked":""  ?>>
             <label for = "Q7A4">Circle</label> <br> 
            <input type="radio" id="Q7A5" name="Question7" value="Q5" <?= ($_GET['Question7']=='Q5')?"checked":""  ?>>
             <label for = "Q7A5">Trapezium</label>
            
            <br/><br/>
            
        <h3>Question 8: Does your toilet paper roll go over or under?</h3>
            <input type="radio" id="Q8A1" name="Question8" value="Q1" <?= ($_GET['Question8']=='Q1')?"checked":""  ?>>
             <label for = "Q8A1">Over of course.</label>  <br> 
            <input type="radio" id="Q8A2" name="Question8" value="Q2" <?= ($_GET['Question8']=='Q2')?"checked":""  ?>>
             <label for = "Q8A2">Under. Whoever says otherwise is dumb.</label> <br> 
            <input type="radio" id="Q8A3" name="Question8" value="Q3" <?= ($_GET['Question8']=='Q3')?"checked":""  ?>>
             <label for = "Q8A3">I have no clue what you're talking about.</label>

            <br/><br/>
            
        <h3>Question 9: You are getting bullied what would the best course of action be?</h3>
            <input type="radio" id="Q9A1" name="Question9" value="Q1" <?= ($_GET['Question9']=='Q1')?"checked":""  ?> >
             <label for = "Q9A1">Secretly work out until you are really strong and then beat the bully up.</label> <br> 
            <input type="radio" id="Q9A2" name="Question9" value="Q2" <?= ($_GET['Question9']=='Q2')?"checked":""  ?> >
             <label for = "Q9A2">Try to become his friend. Sometimes the power of friendship is all you need.</label> <br> 
            <input type="radio" id="Q9A3" name="Question9" value="Q3" <?= ($_GET['Question9']=='Q3')?"checked":""  ?>>
             <label for = "Q9A3">Hide anytime he is in sight!</label> <br> 
            <input type="radio" id="Q9A4" name="Question9" value="Q4" <?= ($_GET['Question9']=='Q4')?"checked":""  ?>>
             <label for = "Q9A4">Just take the bullying.</label> <br> 
            <input type="radio" id="Q9A5"name="Question9" value="Q5" <?= ($_GET['Question9']=='Q5')?"checked":""  ?>>
             <label for = "Q9A5">Tell his mommy and daddy on him. </label>

            <br/><br/>
        
        <h3>Question 10: You're a pomegranate. The farmer is about to pick you. You don't want to be picked and leave father tree behind. What would you do?</h3>
            <input type="radio"id="Q10A1" name="Question10" value="Q1" <?= ($_GET['Question10']=='Q1')?"checked":""  ?>>
             <label for = "Q10A1">Rot yourself before he plucks you. You might die earlier, but you die with family.</label> <br> 
            <input type="radio" id="Q10A2" name="Question10" value="Q2" <?= ($_GET['Question10']=='Q2')?"checked":""  ?>>
             <label for = "Q10A2">Accept your fate and just take the plucking. Maybe it'll be better in the end.</label> <br> 
            <input type="radio" id="Q10A3" name="Question10" value="Q3" <?= ($_GET['Question10']=='Q3')?"checked":""  ?>>
             <label for = "Q10A3">Barter with the farmer and hope the farmer has mercy on your soul.</label> <br> 
            <input type="radio" id="Q10A4" name="Question10" value="Q4" <?= ($_GET['Question10']=='Q4')?"checked":""  ?>>
             <label for = "Q10A4">Trust in your luck and hope that you are too far up for the farmer to get to you.</label> <br> 
            <input type="radio" id="Q10A5" name="Question10" value="Q5" <?= ($_GET['Question10']=='Q5')?"checked":""  ?>>
             <label for = "Q10A5">Attack the farmer.  </label>

            <br/><br/><br/>
            <input type="submit" id = "submit" value = "Submit">
            
            <br/><br/><br/>
        
      </form>
      
    </body>
    
    <footer>
        <img src = "img/buddy_verified.png">
        <p>Also want to take a quiz to see what type of pasta you are?!?! </p>
        <a href = "http://ering-walters-cst336.herokuapp.com/cst336/homework/homework3/"><p>Take this quiz!</p></a>
        <br />
    </footer>
</html>