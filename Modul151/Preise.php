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
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Programm.php">Programm</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Preise
            </a>
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

          <li class="nav-item">
            <a class="nav-link" href="Contact.php">Contact</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  
  <h1>Eintrittspreise</h1>
<table class="Preisliste">
  <tr>
    <th>Wochentag</th>
    <th>Kategorie 1 (Erwachsene)</th>
    <th>Kategorie 2 (Jugendliche/Studenten)</th>
    <th>Kategorie 3 (Kinder)</th>
  </tr>
  <tr>
    <td data-th="Tag">Montag-Donnerstag</td>
    <td data-th="P1">7.-</td>
    <td data-th="P2">5.-</td>
    <td data-th="P3">3.-</td>
  </tr>
  <tr>
    <td data-th="Tag">Freitag-Samstag</td>
    <td data-th="P1">"10.-</td>
    <td data-th="P2">7.-</td>
    <td data-th="P3">5.-</td>
  </tr>
  <tr>
    <td data-th="Tag">Sonntag</td>
    <td data-th="P1">15.-</td>
    <td data-th="P2">10.-</td>
    <td data-th="P3">7.-</td>
  </tr>
</table>

  