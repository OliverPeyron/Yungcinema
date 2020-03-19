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
            <a class="nav-link" href="index.html">Home
              <span class="sr-only">(current)</span>
            </a>

          </li>
          <li class="nav-item">
            <a class="nav-link" href="Programm.php">Programm</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Preise.php">Preise</a>
          </li>
          
          
          
          <li class="nav-item active ">
            <a class="nav-link" href="admin.php">Admin</a>
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
$Titel = $Regisseur = $Sprache = $Untertitel = $Min = $Zusammenfassung = $DatumVon = $DatumBis = $Kinosaal = $Bilder = $Ersteller = $datumerstellung = $datum_aenderung = $K_id =  '';

// Wurden Daten mit "POST" gesendet?
if($_SERVER['REQUEST_METHOD'] == "POST"){
  // Ausgabe des gesamten $_POST Arrays
  echo "</pre>";
  // vorname vorhanden, mindestens 1 Zeichen und maximal 30 Zeichen lang
  if(isset($_POST['Titel']) && !empty(trim($_POST['Titel'])) && strlen(trim($_POST['Titel'])) <= 50){
    // Spezielle Zeichen Escapen > Script Injection verhindern
    $Titel = htmlspecialchars(trim($_POST['Titel']));
  } else {
    // Ausgabe Fehlermeldung
    $error .= "Firstname soll nicht lehr sein und kleiner als 30 Buchstaben<br />";
  }
  if(isset($_POST['Regisseur']) && !empty(trim($_POST['Regisseur'])) && strlen(trim($_POST['Regisseur'])) <= 30){
    // Spezielle Zeichen Escapen > Script Injection verhindern
    $Regisseur = htmlspecialchars(trim($_POST['Regisseur']));
  } else {
    // Ausgabe Fehlermeldung
    $error .= "Firstname soll nicht lehr sein und kleiner als 30 Buchstaben<br />";
  }
  
   if(isset($_POST['Sprache']) && !empty(trim($_POST['Sprache'])) && strlen(trim($_POST['Sprache'])) <= 30){
    // Spezielle Zeichen Escapen > Script Injection verhindern
    $Sprache = htmlspecialchars(trim($_POST['Sprache']));
  } else {
    // Ausgabe Fehlermeldung
    $error .= "Firstname soll nicht lehr sein und kleiner als 30 Buchstaben<br />";
  }
   
   if(isset($_POST['Zusammenfassung']) && !empty(trim($_POST['Zusammenfassung'])) && strlen(trim($_POST['Zusammenfassung'])) <= 255){
    // Spezielle Zeichen Escapen > Script Injection verhindern
    $Zusammenfassung = htmlspecialchars(trim($_POST['Zusammenfassung']));
  } else {
    // Ausgabe Fehlermeldung
    $error .= "Firstname soll nicht lehr sein und kleiner als 255 Buchstaben<br />";
  }
   if(isset($_POST['DatumVon']) && !empty(trim($_POST['DatumVon'])) && strlen(trim($_POST['DatumVon'])) ){
    // Spezielle Zeichen Escapen > Script Injection verhindern
    $DatumVon = trim($_POST['DatumVon']);
  } else {
    // Ausgabe Fehlermeldung
    $error .= " <br Ungueltiges Datum/>";
  }
  if(isset($_POST['DatumBis']) && !empty(trim($_POST['DatumBis'])) && strlen(trim($_POST['DatumBis'])) ){
    // Spezielle Zeichen Escapen > Script Injection verhindern
    $DatumBis = trim($_POST['DatumBis']);
  } else {
    // Ausgabe Fehlermeldung
    $error .= " <br Undgueltiges Datum/>";
  }
   

        
  if(isset($_POST['Kinosaal']) && !empty(trim($_POST['Kinosaal'])) && strlen(trim($_POST['Kinosaal'])) <=4){
    // Spezielle Zeichen Escapen > Script Injection verhindern
    $Kinosaal = trim($_POST['Kinosaal']);
  } else {
    // Ausgabe Fehlermeldung
    $error .= " Es gibt nur 4 Kinos�le <br />";
  }

   
  if(isset($_POST['Min'])){
    $Min = $_POST['Min'];
  } else {
    // Ausgabe Fehlermeldung
    $error .= "untertitel soll nicht lehr sein und kleiner als 255 Buchstaben<br />";
  }
  if(isset($_POST['Untertitel'])){
    $Untertitel = $_POST['Untertitel'];
  } else {
    // Ausgabe Fehlermeldung
    $error .= "untertitel soll nicht lehr sein und kleiner als 255 Buchstaben<br />";
  }

    if(isset($_POST['Bilder']) && !empty(trim($_POST['Bilder'])) && strlen(trim($_POST['Bilder'])) <= 255){
    $Bilder = htmlspecialchars(trim($_POST['Bilder']));
  } else {
    // Ausgabe Fehlermeldung
    $error .= "bild soll nicht lehr sein und kleiner als 255 Buchstaben<br />";
  }
  
  


 
 if(isset($_POST['K_id']) && !empty(trim($_POST['K_id'])) && strlen(trim($_POST['K_id'])) ){
    // Spezielle Zeichen Escapen > Script Injection verhindern
    $K_id = trim($_POST['K_id']);
  } else {
    // Ausgabe Fehlermeldung
    $error .= " <br Ungueltige Kategorie/>";
  }
 $datumerstellung =  date("d.m.Y H:i");
$datum_aenderung = "Dieser film wurde noch nicht bearbeitet!";
$Ersteller = 1;


  // wenn kein Fehler vorhanden ist, schreiben der Daten in die Datenbank
  if(empty($error)){
    // TODO: INPUT Query erstellen, welches firstname, lastname, username, password, email in die Datenbank schreibt
    // TODO: Query vorbereiten mit prepare();
  
    // TODO: Parameter an Query binden mit bind_param();
     $query= "INSERT INTO film( Titel, Regisseur, Sprache, Untertitel, Min, Zusammenfassung, DatumVon, DatumBis, Kinosaal, Bild, Ersteller , Erstellungsdatum, Letzteänderungsdatum, Kategorie_id) 
     VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
     
     $stmt = $mysqli->prepare($query);
    // TODO: Parameter an Query binden mit bind_param();
         
      $stmt->bind_param("ssssisssisissi", $Titel, $Regisseur, $Sprache, $Untertitel, $Min, $Zusammenfassung, $DatumVon, $DatumBis, $Kinosaal, $Bilder, $Ersteller, $datumerstellung, $datum_aenderung, $K_id); 
    // TODO: Query ausf�hren mit execute();
    
      $stmt->execute();
    // TODO: Verbindung schliessen
      $stmt->close();
    
      header("Location: index.php");
  } else {
      echo $error;
  }
     
  }
  
  
    

?>
  

    
        <div class="form-group">
          <label for="Regisseur">Regisseur *</label>
          <input type="text" name="Regisseur" class="form-control" id="Regisseur"
                  value="<?php echo $Regisseur ?>"
                  placeholder="Geben Sie den Regisseur an."
                  required="true">
        </div>
        <div class="form-group">
          <label for="Min">Laenge_in_Minuten*</label>
          <input type="text" name="Min" class="form-control" id="Min"
                  value="<?php echo $Min ?>"
                  placeholder="Geben Sie die Laenge in Minuten an."
                  required="true">
        </div>
        
        <div class="form-group">
          <label for="Zusammenfassung">Zusammenfassung*</label>
          <input type="text" name="Zusammenfassung" class="form-control" id="Zusammenfassung"
                  value="<?php echo $Zusammenfassung ?>"
                  placeholder="Geben Sie die Zusammenfassung an."
                  required="true">
        </div>

        <div class="form-group">
          <label for="DatumVon">DatumVon *</label>
          <input type="date" name="DatumVon" class="form-control" id="DatumVon"
                  value="<?php echo $DatumVon ?>"
                  placeholder="Geben Sie das DatumVon an."
                  required="true">
        </div>
        <div class="form-group">
          <label for="DatumBis">DatumBis *</label>
          <input type="date" name="DatumBis" class="form-control" id="DatumBis"
                  value="<?php echo $DatumBis ?>"
                  placeholder="Geben Sie das DatumBis an."
                  required="true">
        </div>
        <div class="form-group">
          <label for="Sprache">Sprache *</label>
          <input type="text" name="Sprache" class="form-control" id="Sprache"
                  value="<?php echo $Sprache ?>"
                  placeholder="Geben Sie Die Sprache an."
                  required="true">
        </div>
        <div class="form-group">
          <label for="Kinosaal">Kinosaal *</label>
          <input type="text" name="Kinosaal" class="form-control" id="Kinosaal"
                  value="<?php echo $Kinosaal ?>"
                  placeholder="Geben Sie den Kinosaal an."
                  required="true">
        </div>
        <div class="form-group">
          <label for="Untertitel">Untertitel *</label>
          <br>
        <select id="Untertitel" name="Untertitel">
        <option value="1">JA</option>
        <option value="0">NEIN</option>
                  </select>
        </div>
       
      <label for="Bilder"class ="sr-only">Bilder</label>
<input type="text" name="Bilder" class="form-control" id="Bilder"
value="<?php echo $Bilder ?>"
></div>

     
     </div>
        <div class="form-group">
        <label for="K_id">Kategorie *</label> <br>
        <select id="K_id" name="K_id">
        <option value="1">Kinder</option>
        <option value="2">Action</option>
        <option value="3">Horror</option>
        <option value="4">ScienceFiction</option>
        <option value="5">Romantik</option>
        </select>
        </div>
    

     


        <button type="submit" name="button" value="Hochladen" class="btn btn-info">Senden</button>
        <button type="reset" name="button" value="reset" class="btn btn-warning">L�schen</button>
        </div>
      </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
