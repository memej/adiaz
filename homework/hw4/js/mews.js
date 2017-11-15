
var dice = ['dice1', 'dice2', 'dice3', 'dice4', 'dice5', 'dice6'];

var play1 = [];
var play2 = [];
var randomNumber;
var playdic1 = [];
var playdic2 = [];
var p1points = 0;
var p2points = 0;

$("#button").on('click', function() {
    rolldice(); 
    
});

window.onload = startGame();

function startGame(){
    showdice();
    
}

function print(printArray){
     for(var i = 0; i < 6; i++){
        $('#game').append("<img src='img/" + printArray[i] + ".png' alt = 'Dice' class = 'dice'/>"); 
    }
    
}

function showdice(){
   
    if(play1.length == 0 && play2.length == 0){
        
        $('#game').append("<br />");
        $('#game').append("<h1> Welcome to Rolling Mews!!!");
        $('#game').append("<div class = 'output'>");
        $('#game').append("<img src='img/startCat.jpg' alt = 'start'/>"); 
        $('#game').append("</div>");
        $('#game').append("<br />"); 
         $('#game').append("<h1>Player 1 </h1>");
         $('#game').append("<div class = 'p1'>");
        print(dice);
         $('#game').append("</div>");
         
          $('#game').append("<h1>Player 2 </h1>");
         $('#game').append("<div class = 'p2'>");
        print(dice);
        $('#game').append("</div>");
    }
    
    else{
        
        playdic1 = [];
        playdic2 = [];
        
        for(var i = 0; i < 6; i++){
            playdic1.push(dice[play1[i]]);
            playdic2.push(dice[play2[i]]);
            p1points += (play1[i] + 1);
            p2points += (play2[i] + 1);
        }
    }
    
}

function rolldice(){
    $('#game').empty();
    p1points = 0;
    p2points = 0;
    play1 = [];
    play2 = [];
    playdic1 = [];
    playdic2 = [];
    for(var i = 0; i < 6; i++){
        randomNumber = Math.floor(Math.random() * 6);
        play1.push(randomNumber);
    }
    
    for(var i = 0; i < 6; i++){
        randomNumber = Math.floor(Math.random() * 6);
        play2.push(randomNumber);
    }
    
    showdice();
    calculateWinner();
}

function calculateWinner(){
    
     $('#game').append("<div id = 'tie'>");
   if(p1points == p2points){
       $('#game').append("<br />");
       $('#game').append("<img src = 'img/tiecat.jpg' alt = 'It's a Tie' />");
       $('#game').append("<h3> \"No One Wins >:) \"</h3>");
       $('#game').append("<br />");
    $('#game').append("<div id = 'p1tie'>");
    $('#game').append("<h1 class = 'output'>Player 1 </h1>");
    $('#game').append("<h2>Points: " + p1points + " </h2>");
    $('#game').append("</div>");
    
    $('#game').append("<div id = 'p2tie'>");
     $('#game').append("<h1 class = 'output'>Player 2 </h1>");
    $('#game').append("<h2>Points: " + p1points + " </h2>");
    $('#game').append("</div>");
   }
   
   $('#game').append("</div>");
    
    
    $('#game').append("<div class = 'p1'>");
    if(p1points > p2points){
        $('#game').append("<h1 class = 'output'> Player 1 </h1>");
        $('#game').append("<img src = 'img/happy1.jpg' alt = 'Player 1 Wins' />");
        $('#game').append("<br />");
        print(playdic1);
        $('#game').append("<h3> \"I win!!!\"</h3>");
        $('#game').append("<br />");
        $('#game').append("<h2>Points: " + p1points + " </h2>");
    }
    if(p2points > p1points){
        $('#game').append("<h1 class = 'output'> Player 1 </h1>");
        $('#game').append("<img src = 'img/sadcat1.jpg' alt = 'Player 1 Loses' />");
        $('#game').append("<br />");
        print(playdic1);
        $('#game').append("<h3>\"I lose :( \"</h3>");
        $('#game').append("<br />");
        $('#game').append("<h2>Points: " + p1points + " </h2>");
    }
    $('#game').append("</div>");
    
    $('#game').append("<div class = 'p2'>");
   if(p2points > p1points){
       $('#game').append("<h1 class = 'output'>Player 2 </h1>");
       $('#game').append("<img src = 'img/happy2.jpg' alt = 'Player 2 Wins' />");
       $('#game').append("<br />");
        print(playdic2);
       $('#game').append("<h3> \"I win!!!\"</h3>");
       $('#game').append("<br />");
       $('#game').append("<h2>Points: " + p2points + " </h2>");
    }
    
     if(p1points > p2points){
        $('#game').append("<h1 class = 'output'>Player 2 </h1>");
        $('#game').append("<img src = 'img/sadcat2.jpg' alt = 'Player 2 Loses' />");
        $('#game').append("<br />");
         print(playdic2);
        $('#game').append("<h3>\"I lose :( \"</h3>");
        $('#game').append("<br />");
        $('#game').append("<h2>Points: " + p2points + " </h2>");
   }
   $('#game').append("</div>");

   $('#game').append("<div class = 'output'>");
    if(p1points > p2points){
        $('#game').append("<h1> Player 1 Wins </h1>");
    }
    
    if(p2points > p1points){
       $('#game').append("<h1> Player 2 Wins </h1>");
    }
    
    if($play1Sum == $play2Sum){
        $('#game').append("<h1> Tie </h1>");
    }
    
    $('#game').append("</div>");
    
}