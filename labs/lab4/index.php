<!DOCTYPE html>
<html>
    <head>
        
         <?php
         
         $backgroundImage = "img/sea.jpg";
         if (isset($_GET['keyword'])) { //checks if the URL has a parameter called "keyword"
            echo "Keyword typed: " . $_GET['keyword'] . "<br />";
    
            include 'api/pixabayAPI.php';
            $imageURLs = getImageURLs($_GET['keyword']);
                
                for($i = 0; $i < 5; $i++){
                    do{
                    $randomIndex = rand(0, count($imageURLs));
                    }
                    while(!isset($imageURLs[$randomIndex]));

                    echo '<div class = "item';
                    echo ($i == 0)?"active": "";
                    echo '">';
                    echo '<img src= "' .$imageURLs[$randomIndex] . '">';
                    unset($imageURLs[$randomIndex]);
                    
                }
            }
         else {
            echo "<h2> Type a keyword to display a slideshow <br /> with random images from Pixabay.com</h2>";
        }
            
            
            
        ?>
        
        <title>Image Carousel</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <style>
            @import url("css/styles.css");
            body{
                background-image: url('<?=$backgroundImage ?>');
            }
           
            
        </style>
        </head>
    <body>
        <br /><br />
        <form method = "GET">
            <input type="text" name="keyword" placeholder = "Keyword"/>
            <input type="submit" value="Go!"/>
        </form>
        <br /><br />
    </body>
</html>