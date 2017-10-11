

<?php
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
  include 'inc/functions.php';
?>


<!DOCTYPE html>
<html>
    <head>
        
        <title>What Kind of Sandwich Are You?</title>
         <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
        </style>
        
        <header id = "Intro"><h1>What Kind of Sandwich Are You?!? </h1>
      <h2>Find Out Now by Taking the Quiz Below</h2>
        </header>
        
    </head>
    <body>
        <?php countPoints($_GET['Question1'], $_GET['DragName'], $_GET['category'], $_GET['Question4'], $_GET['Question5'], $_GET['musicService'], $_GET['musicService1'], $_GET['musicService2'], $_GET['musicService3'], $_GET['musicService4'], $_GET['musicService5'], $_GET['Question7'], $_GET['Question8'],$_GET['Question9'], $_GET['Question10']); ?>
        
        <form>
            <h3>Question 1: If you were to meet an alien how would you react?</h3>
            <input type="radio" id = "A1" name="Question1" value="Q1" <?= ($_GET['Question1']=='Q1')?"checked":""  ?> > 
                Give it a fist bump and invite it to chill with you.
                <br/>
            <input type="radio" name="Question1" id = "A2" value="Q2" <?= ($_GET['Question1']=='Q2')?"checked":""  ?> >
                 Run away frantically and hope the alien didn't see you.
                 <br/>
            <input type="radio" name="Question1" id = "A3" value="Q3" <?= ($_GET['Question1']=='Q3')?"checked":""  ?>>
                 Throw a rock at the alien and hope that you killed it.
                 <br/>
            <input type="radio" name="Question1" id = "A4" value="Q4" <?= ($_GET['Question1']=='Q4')?"checked":""  ?>>
                  Ask it out on a date to your favorite sushi place.
                 <br/>
            <input type="radio" name="Question1" id = "A5" value="Q5" <?= ($_GET['Question1']=='Q5')?"checked":""  ?>>
             Kill it and dissect it for science.
             <br />
             
             
        <h3>Question 2: If you were a Drag Queen what would your name be?</h3>
        
            <input type = "text" name = "DragName" value="<?=$_GET['DragName']?>"> 
        
       
       <h3>Question 3: Of the five images below. Which one describes you the most?</h3>
            <select name="category">
                <option value="">Select One</option>
                <option <?=checkIfSelected('pic1')?> value="pic1"> Sexy Witch</option>
                <option <?=checkIfSelected('pic2')?> value = "pic2"> Hot Pirate</option>
                <option <?=checkIfSelected('pic3')?> value = "pic3"> Vivacious Geisha </option>
                <option <?=checkIfSelected('pic4')?> value = "pic4"> Appropriate Child </option>
                <option <?=checkIfSelected('pic5')?> value = "pic5"> Hunky Swedish Man </option>
            </select>
        
        <div>
            <img src = "img/pic1.jpg" width = "200px">
            <img src = "img/pic2.jpg" width = "200px">
            <img src = "img/pic3.jpg" width = "200px">
            <img src = "img/pic4.jpg" width = "200px">
            <img src = "img/pic5.jpg" width = "200px">
        </div>    
        
            
        <h3>Question 4: If a cat comes up to you and wants love what do you do?</h3>
            <input type="radio" name="Question4" value="Q1" <?= ($_GET['Question4']=='Q1')?"checked":""  ?>> Of course I pet it! I can't turn away love from a cat. <br> 
            <input type="radio" name="Question4" value="Q2" <?= ($_GET['Question4']=='Q2')?"checked":""  ?>> Push the cat away and avoid the cat at all costs. <br> 
            <input type="radio" name="Question4" value="Q3" <?= ($_GET['Question4']=='Q3')?"checked":""  ?>> Steal the cat and take it home. <br> 
            <input type="radio" name="Question4" value="Q4" <?= ($_GET['Question4']=='Q4')?"checked":""  ?>> I'm allergic to cats. <br> 
            <input type="radio" name="Question4" value="Q5" <?= ($_GET['Question4']=='Q5')?"checked":""  ?>> What if the cat is feral? I could get FIV and die. Cats are terrifying creatures. 
            
            
            
        <h3>Question 5: There is a killer on the loose and you know what he looks like. What do you do in this situation?</h3>
            <input type="radio" name="Question5" value="Q1" <?= ($_GET['Question5']=='Q1')?"checked":""  ?> > Since I know the killer I'm gonna hunt him down myself. I get my weapons and my coolest clothes so I can get him in style.
                                                                Besides is the killer even that scary?<br> 
            <input type="radio" name="Question5" value="Q2" <?= ($_GET['Question5']=='Q2')?"checked":""  ?>> I have to call the police!! It's the only right thing to do. <br> 
            <input type="radio" name="Question5" value="Q3" <?= ($_GET['Question5']=='Q3')?"checked":""  ?>> I board up my entire house and take all the extra precautions necessary so I know that I won't die. <br> 
            <input type="radio" name="Question5" value="Q4" <?= ($_GET['Question5']=='Q4')?"checked":""  ?>> Hop in my car and leave the town immediately. <br> 
            <input type="radio" name="Question5" value="Q5" <?= ($_GET['Question5']=='Q5')?"checked":""  ?> > Call the News and make sure you get your five minutes of fame. 
        
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
            
            
        <h3>Question 7: If you were a shape. What shape would you be?</h3>
            <input type="radio" name="Question7" value="Q1" <?= ($_GET['Question7']=='Q1')?"checked":""  ?>> Triangle <br> 
            <input type="radio" name="Question7" value="Q2" <?= ($_GET['Question7']=='Q2')?"checked":""  ?>> Diamond <br> 
            <input type="radio" name="Question7" value="Q3" <?= ($_GET['Question7']=='Q3')?"checked":""  ?> > Decagon <br> 
            <input type="radio" name="Question7" value="Q4" <?= ($_GET['Question7']=='Q4')?"checked":""  ?>> Circle <br> 
            <input type="radio" name="Question7" value="Q5" <?= ($_GET['Question7']=='Q5')?"checked":""  ?>> Trapezium
            
        <h3>Question 8: Does your toilet paper roll go over or under?</h3>
            <input type="radio" name="Question8" value="Q1" <?= ($_GET['Question8']=='Q1')?"checked":""  ?>> Over of course.  <br> 
            <input type="radio" name="Question8" value="Q2" <?= ($_GET['Question8']=='Q2')?"checked":""  ?>> Under. Whoever says otherwise is dumb. <br> 
            <input type="radio" name="Question8" value="Q3" <?= ($_GET['Question8']=='Q3')?"checked":""  ?>> I have no clue what you're talking about.

        <h3>Question 9: You are getting bullied what would the best course of action be?</h3>
            <input type="radio" name="Question9" value="Q1" <?= ($_GET['Question9']=='Q1')?"checked":""  ?> > Secretly work out until you are really strong and then beat the bully up. <br> 
            <input type="radio" name="Question9" value="Q2" <?= ($_GET['Question9']=='Q2')?"checked":""  ?> > Try to become his friend. Sometimes the power of friendship is all you need. <br> 
            <input type="radio" name="Question9" value="Q3" <?= ($_GET['Question9']=='Q3')?"checked":""  ?>> Hide anytime he is in sight! <br> 
            <input type="radio" name="Question9" value="Q4" <?= ($_GET['Question9']=='Q4')?"checked":""  ?>> Just take the bullying. <br> 
            <input type="radio" name="Question9" value="Q5" <?= ($_GET['Question9']=='Q5')?"checked":""  ?>> Tell his mommy and daddy on him. 

        
        <h3>Question 10: You're a pomegranate. The farmer is about to pick you. You don't want to be picked and leave father tree behind. What would you do?</h3>
            <input type="radio" name="Question10" value="Q1" <?= ($_GET['Question10']=='Q1')?"checked":""  ?>> Rot yourself before he plucks you. You might die earlier, but you die with family. <br> 
            <input type="radio" name="Question10" value="Q2" <?= ($_GET['Question10']=='Q2')?"checked":""  ?>> Accept your fate and just take the plucking. Maybe it'll be better in the end. <br> 
            <input type="radio" name="Question10" value="Q3" <?= ($_GET['Question10']=='Q3')?"checked":""  ?>> Barter with the farmer and hope the farmer has mercy on your soul. <br> 
            <input type="radio" name="Question10" value="Q4" <?= ($_GET['Question10']=='Q4')?"checked":""  ?>> Trust in your luck and hope that you are too far up for the farmer to get to you. <br> 
            <input type="radio" name="Question10" value="Q5" <?= ($_GET['Question10']=='Q5')?"checked":""  ?>> Attack the farmer.  

            <br/><br/><br/>
            <input type="submit" value = "Submit">
            
    
        
      </form>
      
    </body>
</html>