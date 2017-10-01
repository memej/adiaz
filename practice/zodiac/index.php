 <?php
  $start = $_GET['startYear'];
        $end = $_GET['endYear'];
    function printYear($startYear, $endYear){ 
        
          $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
        $sum = 0;
        $zIndex = 0;
    for($ii = $startYear; $ii <= $endYear; $ii+=4){
        $sum += $ii;
        echo "<li> Year " . $ii;
        if($ii == 1776){
            echo " <strong> USA INDEPENDENCE! </strong>";
            }
        if($ii % 100 == 0){
            echo "<strong> Happy New Century </strong>";
        }
        

        echo "<br />";
        if($ii >=1900){
            echo "<img src= 'img/" . $zodiac[$zIndex%(count($zodiac))]. ".png'>";
            $zIndex+=4;
        }
        }
      
        return $sum;
        
    }
        ?>



<!DOCTYPE html>
<html>
    <head>
        <title>Practice: Chinese Zodiac Years</title>
    </head>
    <body>
        <h1>Chinese Zodiac Years</h1>
        <ul>
            
            <?php
                if(isset($start) && isset($end))
                    {
                    $sum = printYear($start,$end); 
                    }
                else{
                    $sum = printYear(1500,2000);
                }
                echo "<strong> Year Sum: " . $sum . "</strong>";
            ?>       
         </ul>
    </body>
</html>