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

          <li class="nav-item">
            <a class="nav-link" href="Preise.php">Preise</a>
          </li>
          
          <li class="nav-item">
          <a class="nav-link" href="logon">Login/Logout</a>
          </li>

          <li class="nav-item active ">
            <a class="nav-link" href="">Admin</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Contact.php">Contact</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

<?php
// TODO: Verbindung zur Datenbank einbinden
Include('db_connector.inc.php');


// Initialisierung
$error = $message =  '';
$Genre =  '';

// Wurden Daten mit "POST" gesendet?
if($_SERVER['REQUEST_METHOD'] == "POST"){
  // Ausgabe des gesamten $_POST Arrays
  echo "</pre>";
  // vorname vorhanden, mindestens 1 Zeichen und maximal 30 Zeichen lang
  if(isset($_POST['Genre']) && !empty(trim($_POST['Genre'])) && strlen(trim($_POST['Genre'])) <= 50){
    // Spezielle Zeichen Escapen > Script Injection verhindern
    $Genre = htmlspecialchars(trim($_POST['Genre']));

    // wenn kein Fehler vorhanden ist, schreiben der Daten in die Datenbank
  if(empty($error)){
    // TODO: INPUT Query erstellen, welches firstname, lastname, username, password, email in die Datenbank schreibt
    // TODO: Query vorbereiten mit prepare();
  
    // TODO: Parameter an Query binden mit bind_param();
     $query= "INSERT INTO Kategorie(Genre) 
     VALUES(?)";
     
     $stmt = $mysqli->prepare($query);
    // TODO: Parameter an Query binden mit bind_param();
         
      $stmt->bind_param("s", $Genre); 
    // TODO: Query ausf�hren mit execute();
    
      $stmt->execute();
    // TODO: Verbindung schliessen
      $stmt->close();
    
      header("Location: Programm.php");
  } else {
      echo $error;
  }}}
  ?>

<div class="container">
      <h1>Kategorie Hinzufuegen</h1>
      <p>
        Bitte fuegen sie neue Kategorie hinzu.
      </p>


      <?php
        // Ausgabe der Fehlermeldungen
        if(!empty($error)){
          echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error . "</div>";
        } else if (!empty($message)){
          echo "<div class=\"alert alert-success\" role=\"alert\">" . $message . "</div>";
        }
      ?>

      <form action="" method="post" name="form">
        <!-- Genre -->
        
        <div class="form-group">
          <label for="Genre">Genre *</label>
          <input type="text" name="Genre" class="form-control" id="Genre"
                  value="<?php echo $Genre ?>"
                  placeholder="Geben Sie ein Genre an."
                  required="true">
        </div>
        <button type="submit" name="button" value="Hochladen" class="btn btn-info">Senden</button>
        </html>

  
     
  