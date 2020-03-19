<?php

 
require('db_connector.inc.php');

$id=$_REQUEST['film_ID'];
$query = "SELECT * from film where film_ID='".$id."'"; 
$result = mysqli_query($mysqli, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
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

$id=$_REQUEST['film_ID'];
$query = "SELECT * from film where film_ID='".$id."'"; 
$result = mysqli_query($mysqli, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['film_ID'];
$Titel =$_REQUEST['Titel'];
$Regisseur =$_REQUEST['Regisseur'];
$Zusammenfassung =$_REQUEST['Zusammenfassung'];
$Sprache =$_REQUEST['Sprache'];
$Min= $_REQUEST['Min'];
$Datumvon= $_REQUEST['Datumvon'];
$Datumbis= $_REQUEST['Datumbis'];
$Kinosaal= $_REQUEST['Kinosaal'];
$Untertitel= $_REQUEST['Untertitel'];
$Kategorie= $_REQUEST['Kategorie_id'];
$Bild= $_REQUEST['Bild'];
$Letzteänderungsdatum =  date("d.m.Y H:i");

$update="update film set Titel='".$Titel."', Regisseur='".$Regisseur."', Zusammenfassung='".$Zusammenfassung."', Sprache='".$Sprache."', Min='".$Min."',
Datumvon='".$Datumvon."' , Datumbis='".$Datumbis."', Kinosaal='".$Kinosaal."', Untertitel='".$Untertitel."', Kategorie_id='".$Kategorie."',  Bild='".$Bild."' where film_ID='".$id."'";
mysqli_query($mysqli, $update) or die(mysqli_error());
header("Location: Programm.php");
  } else {
      
  }
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Kino</a>
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
            <li class="nav-item active">
            <a class="nav-link" href="TextFile1.php">Film Bearbeiten</a>
          </li>

         
          
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
      <h1>Film Bearbeiten</h1>
      <p>
        Bitte Bearbeiten sie den Film.
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
<div>
 
<input type="hidden" name="new" value="1" />
<input name="film_ID" type="hidden" value="<?php echo $row['film_ID'];?>" />
<div class="form-group">
          <label for="Titel">Titel *</label>
          <input type="text" name="Titel" class="form-control" id="Titel"
                  required value="<?php echo $row['Titel'];?>"
                  
                  required="true">
        </div>
        <div class="form-group">
          <label for="Regisseur">Regisseur *</label>
          <input type="text" name="Regisseur" class="form-control" id="Regisseur"
                  required value="<?php echo $row['Regisseur'];?>"
                  placeholder="Geben Sie den Regisseur an."
                  required="true">
        </div>
        <div class="form-group">
          <label for="Min">Laenge*</label>
          <input type="text" name="Min" class="form-control" id="Min"
                  required value="<?php echo $row['Min'];?>"
                  placeholder="Geben Sie die Länge in Minuten an."
                  required="true">
        </div>
        <div class="form-group">
          <label for="Zusammenfassung">Zusammenfassung*</label>
          <input type="text" name="Zusammenfassung" class="form-control" id="Zusammenfassung"
                  required value="<?php echo $row['Zusammenfassung'];?>"
                  placeholder="Geben Sie die Zusammenfassung an."
                  required="true">
        </div>
        <div class="form-group">
          <label for="Datumvon">DatumVon *</label>
          <input type="date" name="Datumvon" class="form-control" id="Datumvon"
                  required value="<?php echo $row['Datumvon'];?>"
                  placeholder="Geben Sie das DatumVon an."
                  required="true">
        </div>
        <div class="form-group">
          <label for="Datumbis">Datumbis *</label>
          <input type="date" name="Datumbis" class="form-control" id="Datumbis"
                 required value="<?php echo $row['Datumbis'];?>"
                  placeholder="Geben Sie das Datumbis an."
                  required="true">
        </div>
        <div class="form-group">
          <label for="Sprache">Sprache *</label>
          <input type="text" name="Sprache" class="form-control" id="Sprache"
                  required value="<?php echo $row['Sprache'];?>"
                  placeholder="Geben Sie Die Sprache an."
                  required="true">
        </div>
        <div class="form-group">
          <label for="Kinosaal">Kinosaal *</label>
          <input type="text" name="Kinosaal" class="form-control" id="Kinosaal"
                  required value="<?php echo $row['Kinosaal'];?>"
                  placeholder="Geben Sie den Kinosaal an."
                  required="true">
        </div>
        <div class="form-group">
          <label for="Untertitel">Untertitel *</label>
          <br>
        <select id="Untertitel" name="Untertitel" required value="<?php echo $row['Untertitel'];?>">
        <option value="1">JA</option>
        <option value="2">NEIN</option>
                  </select>
        </div>
       
        <div class="form-group">
        <label for="Kategorie_id">Kategorie *</label> <br>
        <select id="Kategorie_id" name="Kategorie_id" required value="<?php echo $row['Kategorie_id'];?>">
        <option value="1">Kinder</option>
        <option value="2">Action</option>
        <option value="3">Horror</option>
        <option value="4">ScienceFiction</option>
        <option value="5">Romantik</option>
        </select>
        </div>
        <div>
      <label for="Bild"class ="sr-only">Bild</label>
<input type="text" name="Bild" class="form-control" id="Bild"
value="<?php echo $row['Bild'] ?>"
placeholder="Geben Sie den Link des Bildes an."
                  required="true">
                  </div><br>
        
<button name="submit" type="submit" value="Update"class="btn btn-info" >Senden</button>
<button type="reset" name="button" value="reset" class="btn btn-warning">Löschen</button>
</form>

</div>

</div>
</body>
</html>
