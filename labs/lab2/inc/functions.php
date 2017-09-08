<?php
        
        function displaySymbol($randomValue, $pos)
            {
            
            switch($randomValue)
                {
                case 0: $symbol = "seven";
                    break;
                case 1: $symbol = "lemon";
                    break;
                case 2: $symbol = "cherry";
                    break;
                case 3: $symbol = "orange";
                    break;
                }
            echo "<img id = 'reel$pos' src = 'img/$symbol.png' title = '". ucfirst($symbol) ."' alt = '$symbol' width = '70' />";
            }
            
        function displayPoints($symbol1, $symbol2, $symbol3)
            {
            echo "<div id = 'output'>";
            if($symbol1 == $symbol2 && $symbol2 == $symbol3)
                {
                switch($symbol1)
                    {
                    case 0: $totalPoints = 1000;
                        echo "<h1 id = 'jackpot'>Jackpot!</h1>";
                        break;
                    case 1: $totalPoints = 500;
                        break;
                    case 2: $totalPoints = 250;
                        break;
                    case 3: $totalPoints = 900;
                        break;
                    }
                echo "<h2>You won $totalPoints points! </h2>";
                
                }
                else
                    {
                    echo "<h3> Try Again! </h3>";
                    }
                echo "</div>";
            echo $points;
            
            }
        
       
       function play()
       {
        
        for($i = 1; $i < 4; $i++)
            {
            ${"randomValue" . $i} = rand(0,3);
                displaySymbol(${"randomValue". $i}, $i);
            }
        
        displayPoints($randomValue1, $randomValue2, $randomValue3);
       }
        
        ?>