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
          <li class="nav-item active">
            <a class="nav-link" href="#">Programm</a>
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


          <li class="nav-item">
            <a class="nav-link" href="Contact.php">Contact</a>
          </li>

          


        </ul>
      </div>
    </div>
  </nav>
  <div class="row text-center">

    <?php
    
   
 

   
   $date = date("d.m.Y");

$count = 1;
$sel_query="Select * from film WHERE Datumbis >CURRENT_DATE ORDER by film_ID";
$result = mysqli_query($mysqli,$sel_query);

while($row = mysqli_fetch_assoc($result)) { ?>

        
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
        <?php 
          echo '<img src="'.$row['Bild'].'" class="card-img-top">' ?>
          <div class="card-body">
            <h4 class="card-title"> <?php echo $row["Titel"]; ?></h4>
            <p class="card-text">
            <p> <?php 
            echo "zusammenfassung: ";
            echo "<br>";
            echo $row["Zusammenfassung"];
            ?></p> 
            
            <p> <?php 
            echo "Regisseur: ";
            echo $row["Regisseur"];
            ?></p>
            
            
            
            <p><?php 
            echo "Sprache: ";
            echo $row["Sprache"];
            ?></p> 
            
            <p><?php 
            echo "Laenge in Minuten: ";
            echo $row["Min"];
            ?></p> 
            
            <p><?php 
            echo "Kinosaal: ";
            echo $row["Kinosaal"];
            ?></p> 
           
            <p><?php 
            echo "Datum von: ";
            echo $row["Datumvon"];
            ?></p> 
            
            <p><?php 
            echo "Datum bis: ";
            echo $row["Datumbis"];
            ?></p>
           
          </div>
          <div class="card-footer">
          
          <?php
          if(isset($_SESSION['loggedin'])){ ?>

            <a href="Delete.php?id=<?php echo $row["film_ID"]; ?>">Delete</a>
            <a href="Bearbeiten.php?film_ID=<?php echo $row["film_ID"]; ?>">Edit</a>

            <?php } ?>




          </div>
          
        </div>
      </div>
      <?php $count++; }
      
      ?>


      
     

    

	  
      

    </div>
    <!-- /.row -->

  </div>

  
    <!-- /.col-md-4 -->
   

  </div>
  <!-- /.row -->

  

</div>
