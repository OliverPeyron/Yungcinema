<?php
session_start();
 include('db_connector.inc.php');

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Small Business - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/small-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">YUNG CINEMA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  class="active" href="Programm.php">Programm</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Preise.php">Preise</a>
          </li>

          <?php if(!isset($_SESSION['loggedin'])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="Logon.php">Login</a>
          </li>
          <?php }?>

          <?php if(isset($_SESSION['loggedin'])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="Admin.php">Admin</a>        <!-- Session needed -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Logout.php">Logout</a>
</li>
          <?php }?>

          
          <li class="nav-item active">
            <a class="nav-link" href="#">Contact
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

</header>
<div id="mobile__menu" class="overlay">
    <a class="close" onclick="closeNav()">&times;</a>
    
        </div>
            </body>
                <h2>Kontaktadresse</h2>
                <p>Oliver&nbsp;Peyron</p>
                <p>Bettingerstrasse 72</p>
                <p>4125 Riehen</p>
                <p>Schweiz</p>
                <p><a href="mailto:olipey01@gmail.com">olipey01@gmail.com</a></p>
                <p>&nbsp;</p>
                
                
                <div class="footer">
<footer>
<p>Copyright &#169; 2019 Oliver All rights reserved.&#174;<p>
</footer>
    </div>
        </div>
            </html>