<!DOCTYPE html>
<html>
    <head>
        <title>Rolling Mew</title>
        
        <?php include 'inc/functions.php';?>
        
        <style>
            @import url("css/styles.css");
            @import url('https://fonts.googleapis.com/css?family=Pacifico');
            @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
            @import url('https://fonts.googleapis.com/css?family=Baloo+Tammudu');
        </style>
        
        
    </head>
    <body>
        <header>
          
            <h1 id = "catTitle"> <i class="fa fa-paw" aria-hidden="true"></i> Rolling Mews <i class="fa fa-paw" aria-hidden="true"></i></h1>
        </header>
        
        <div id = "main">
             <?php play(); ?>
             <form>
                 <input type = "submit" value = "Roll Dice!" id = "button">
             </form>
        </div>
        
    </body>
</html>