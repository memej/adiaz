<!DOCTYPE html>
<html>
    <head>
        <title>Tour Our Great Nation</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
            <style>
            @import url('https://fonts.googleapis.com/css?family=Spectral+SC');
            body{
                background-color:#faaf87;
                text-align: center;
                font-family: 'Spectral SC', serif;
            }
        </style>
    
    
            <script>
            
            
            
                $(document).ready( function(){
                
                
                $("#locSubmit").click(function(){
                    
                $("#loc").empty();
                    
                  
                  var valueLoc = $("#Location").val();
                    console.log(valueLoc);
                        $.ajax({
                            type: "GET",
                            url: "location.php",
                            dataType: "",
                            data: { passedLoc :valueLoc},
                            success: function(response) {
                                 $("#loc").append(response);
                            },
                        });
                }); 
                
               
                        
                    
                
        
                
                $("#specSubmit").click(function(){
                    
                 $("#special").empty();
                  var valueSpec = $("#Specialty").val();
                    
                        $.ajax({
                            type: "GET",
                            url: "specialty.php",
                            dataType: "",
                            data: { passedSpec :valueSpec},
                            success: function(response) {
                                 $("#special").append(response);
                            },
                            
                            
                        });
                    
                    
                    
                }); 
                }); 
            
                
             function login(){
                    $("#main-username").val($("#username").val());
                    $("#main-pass").val($("#password").val());
                    console.log( $("#main-username").val());
                     console.log( $("#main-pass").val());
                     
                      $.ajax({
                            type: "GET",
                            url: "login.php",
                            dataType: "",
                            data: { passedUser : $("#main-username").val(), passedPass : $("#main-pass").val()},
                            success: function(response) {
                                 if($("#main-username").val() == "admin" && $("#main-pass").val() == "s3cr3t" ){
                                     window.location.href = "admin.php";
                                 }
                                 else{
                                     $("loginCheck").html("Wrong Username or Password!");
                                 }
                                 
                                 
                            },
                            
                            
                        });
                     
                     
                    $("#myModal").modal("hide");
               }   
             
          
        
            
        </script>  
    </head>
    <body>
    <input type="hidden" id="main-username">
    <input type="hidden" id="main-pass">
    
        <!-- Modal for login -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Admin Login</h4>
      </div>
      <div class="modal-body">

            Username:
            <input type = "text" id = "username"><br>
            Password: 
            <input type = "password" id = "password"><br>
            <button class="btn btn-primary" onclick="login();">Login</button>
            
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        <div style = "background-color: white;">
            <br><br>
        <h1 style = "font-size: 80px;">AJ's Tour Guide Extravaganza</h1><br></div>
        
        <form onsubmit = "return false">
            <h1>Find a Tour Guide Based on Location</h1><br>
            Where Would You Like to Tour:
            <select id = "Location">
                <option value = "1">Niagara Falls, NY</option>
                <option value = "2">Big Sur, CA</option>
                <option value = "3">Monterey, CA</option>
                <option value = "4">Carmel, CA</option>
                <option value = "5">Grand Canyon, AZ</option>
                <option value = "6">Washington Monument, VA</option>
            </select>
            
            <br><br>
            <input type = "submit" class="btn btn-info btn-lg" id = "locSubmit" value = "Tour Away!">
        </form><br>
            <div id = "loc"></div>
            <hr>
        <form onsubmit = "return false">
            <h1>Find a Tour Guide Based on their Specialty</h1><br>
            What Specialty do you most enjoy? 
            <select id = "Specialty">
                <option value = "1">Rock Climbing</option>
                <option value = "2">Mountain Biking</option>
                <option value = "3">Archery</option>
                <option value = "4">Hunting</option>
                <option value = "5">Tracking</option>
            </select>
             <br><br>
            <input type = "submit" class="btn btn-info btn-lg" id = "specSubmit" value = "Tour Away!">
        </form><br>
            <div id = "special"></div>
       <hr>
       
       <footer>
           <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Admin Login</button>
           <div id = "loginCheck"></div>
           <br><br>
           </footer>
    </body>
</html>