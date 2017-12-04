<?php
//print_r($_FILES);
echo "  <h2> Photo Gallery</h2> <br>";
function gall(){
echo"File Size " . $_FILES['myFile']['size'] . "<br>";
if($_FILES['myFile']['size'] > 1000000){
       echo " <br> <h2 id = 'red'> Image Too Big </h2>";
   // header('Location:index.php');
   
}
else{
    move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/". $_FILES["myFile"]["name"] );
    
   $files = scandir("gallery/",1);
    for($i =0; $i < count($files)-2 ; $i++){
        echo "<img src='gallery/". $files[$i] . "' width='50' class='pics'>";
    }
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>Lab 10: Photo Gallery </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
        
        body{
            text-align: center;
            background-color: #FF9999;
        }
        #red{
            color: red;
        }
        
        #mid{
            text-align: center;
        }
        
        
        h2{
            color: white;
            font-style: italic;
        }
        #focus{
            height: 500px;
            width: 400px;
        }
        
        img{
            border:solid 5px;
            border-color: red;
        }
        
    
    
        </style>
        <script>
            $(document).ready(function()
    {
        $("img").on("click", function()
        {
            if($("#focus").length != 0 ){
                
               $("#focus").attr('id', '');
            }  
            
           $(this).attr('id','focus');
        });
        
   });
       </script>
    </head>
    <body>

<form method="POST" enctype="multipart/form-data">

   <input id = "mid" type="file" name="myFile"/>
    <input type='submit' value='Upload File!' name="submit"/><br><br>
     <?=gall()?>
</form>
    </body>
</html>