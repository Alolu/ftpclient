<?php

function entete(){
 echo'
 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="utf-8">
  <title>Site FTP</title>
  <meta name="description" content="Site FTP de Léo Borniche et Valentin Gorlier">
  <meta name="author" content="Valentin et Bleo">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="icon" type="image/png" href="images/favicon.png">

 <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="js/refresh.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	';
}

function menu(){
  global $CL;
	echo'<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">FTP hub</a>
    </div>
  </div>
</nav>    
<div id="section1" class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">';
      if($_SESSION['logged'] == "false"){
        echo'
        <h4 style="color:black">Register</h4>
        <form class="login-form" method="post">
           <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="user" required="required" class="form-control" placeholder="Username" maxlength="255" type="text" id="UserUsername"> 
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input name="pass" required="required" class="form-control" placeholder="Password" type="password" id="UserPassword">
            </div>
            </br>
            <input value="validate" style="margin-left: 25%" type="submit">
          </div>
        </form>
        <h4 style="color:black">Log in</h4>
        <form class="login-form" method="post">
           <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="userlog" required="required" class="form-control" placeholder="Username" maxlength="255" type="text" id="UserUsername"> 
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input name="passlog" required="required" class="form-control" placeholder="Password" type="password" id="UserPassword">
            </div>
            </br>
            <input value="validate" style="margin-left: 25%" type="submit">
          </div>
        </form>';}else{
          echo'
          <a class="button" href="index.php?page=ftp">Your FTP</a>
          </br>
          </br>
          <a class="button" href="src/controller/logout.php">Logout</a>
          ';
        }
        echo'
      </div>
    </div>
  </div>
  </div>
';
  if(isset($_POST['user']) && isset($_POST['pass'])){    // sert a récuperer l'utilisateur et le mot de passe dans le formulaire
    $ble = $CL->NewAccount($_POST['user'],$_POST['pass']);
  }
  if(isset($_POST['userlog']) && isset($_POST['passlog'])){
    $blo = $CL->Connect($_POST['userlog'],$_POST['passlog']);
    header('refresh: 0');
  }  
}


function bas(){
	echo'</body>
	</html>
	';
}

?>
