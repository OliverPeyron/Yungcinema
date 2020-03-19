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
          <li class="nav-item active">
            <a class="nav-link" href=#>Home
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
            <a class="nav-link" href="Logon.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Admin.php">Admin</a>
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
include 'db_connector.inc.php';



// Initialisierung
$error = $message =  '';
$firstname = $lastname = $email = $benutzername = '';

// Wurden Daten mit "POST" gesendet?
if($_SERVER['REQUEST_METHOD'] == "POST"){
  // Ausgabe des gesamten $_POST Arrays
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";

  // vorname vorhanden, mindestens 1 Zeichen und maximal 30 Zeichen lang
  if(isset($_POST['firstname']) && !empty(trim($_POST['firstname'])) && strlen(trim($_POST['firstname'])) <= 30){
    // Spezielle Zeichen Escapen > Script Injection verhindern
    $firstname = htmlspecialchars(trim($_POST['firstname']));
  } else {
    // Ausgabe Fehlermeldung
    $error .= "Geben Sie Ihren Vornamen ein.<br />";
  }

  // nachname vorhanden, mindestens 1 Zeichen und maximal 30 zeichen lang
  if(isset($_POST['lastname']) && !empty(trim($_POST['lastname'])) && strlen(trim($_POST['lastname'])) <= 30){
    // Spezielle Zeichen Escapen > Script Injection verhindern
    $lastname = htmlspecialchars(trim($_POST['lastname']));
  } else {
    // Ausgabe Fehlermeldung
    $error .= "Geben Sie Ihren Nachnamen ein.<br />";
  }

  // emailadresse vorhanden, mindestens 1 Zeichen und maximal 100 zeichen lang
  if(isset($_POST['email']) && !empty(trim($_POST['email'])) && strlen(trim($_POST['email'])) <= 100){
    $email = htmlspecialchars(trim($_POST['email']));
    // korrekte emailadresse?
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
      $error .= ".<br />";
    }
  } else {
    // Ausgabe Fehlermeldung
    $error .= "Geben Sie Ihre e-mail Adresse ein.<br />";
  }

  // benutzername vorhanden, mindestens 6 Zeichen und maximal 30 zeichen lang
  if(isset($_POST['benutzername']) && !empty(trim($_POST['benutzername'])) && strlen(trim($_POST['benutzername'])) <= 30){
    $benutzername = trim($_POST['benutzername']);
    // entspricht der benutzername unseren vogaben (minimal 6 Zeichen, Gross- und Kleinbuchstaben)
		if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,}/", $benutzername)){
			$error .= "<br />";
		}
  } else {
    // Ausgabe Fehlermeldung
    $error .= "Geben Sie bitte einen korrekten Benutzernamen ein.<br />";
  }

  // passwort vorhanden, mindestens 8 Zeichen
  if(isset($_POST['password']) && !empty(trim($_POST['password']))){
    $password = trim($_POST['password']);
    $newpassword = password_hash($password, PASSWORD_DEFAULT);
    //entspricht das passwort unseren vorgaben? (minimal 8 Zeichen, Zahlen, Buchstaben, keine Zeilenumbrüche, mindestens ein Gross- und ein Kleinbuchstabe)
    if(!preg_match("/(?=^.{8,}$)((?=.*\d+)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password)){
      $error .= "Das Passwort entspricht nicht dem geforderten Format.<br />";
    }
  } else {
    // Ausgabe Fehlermeldung
    $error .= "Geben Sie Ihr Passwort ein.<br />";
  }

  // wenn kein Fehler vorhanden ist, schreiben der Daten in die Datenbank
  if(empty($error)){
    // TODO: INPUT Query erstellen, welches firstname, lastname, benutzername, password, email in die Datenbank schreibt
    $query ="INSERT INTO beutzer (vorname, nachname, email, benutzername, password) VALUES(?,?,?,?,?)"; 
    // TODO: Query vorbereiten mit prepare();
    $stmt = $mysqli->prepare($query);
    if (false === $stmt ) {
			die('prepare() failed: ' . htmlspecialchars($mysqli->error));
		}
    // TODO: Parameter an Query binden mit bind_param();
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $benutzername, $newpassword);
    if (false === $stmt ) {
			die ('bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
    // TODO: Query ausführen mit execute();
    $stmt->execute();
    if (false === $stmt ) {
			die ('execute() failed: ' . htmlspecialchars($stmt->error));
		}
    // TODO: Verbindung schliessen
    $stmt->close();
    // TODO: Weiterleitung auf login.php
    header("Location:index.php");                          
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrierung</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file: -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">
      <h1>Registrierung</h1>
      <p>
        Bitte registrieren Sie sich, damit Sie diesen Dienst benutzen können.
      </p>
      <?php
        // Ausgabe der Fehlermeldungen
        if(!empty($error)){
          echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error . "</div>";
        } else if (!empty($message)){
          echo "<div class=\"alert alert-success\" role=\"alert\">" . $message . "</div>";
        }
      ?>
      <form action="" method="post">
        <!-- vorname -->
        <div class="form-group">
          <label for="firstname">Vorname *</label>
          <input type="text" name="firstname" class="form-control" id="firstname"
                  value="<?php echo $firstname ?>"
                  placeholder="Geben Sie Ihren Vornamen an."
                  required="true">
        </div>
        <!-- nachname -->
        <div class="form-group">
          <label for="lastname">Nachname *</label>
          <input type="text" name="lastname" class="form-control" id="lastname"
                  value="<?php echo $lastname ?>"
                  placeholder="Geben Sie Ihren Nachnamen an"
                  maxlength="30"
                  required="true">
        </div>
        <!-- email -->
        <div class="form-group">
          <label for="email">Email *</label>
          <input type="email" name="email" class="form-control" id="email"
                  value="<?php echo $email ?>"
                  placeholder="Geben Sie Ihre Email-Adresse an."
                  maxlength="100"
                  required="true">
        </div>
        <!-- benutzername -->
        <div class="form-group">
          <label for="benutzername">Benutzername *</label>
          <input type="text" name="benutzername" class="form-control" id="benutzername"
                  value="<?php echo $benutzername ?>"
                  placeholder="Gross- und Keinbuchstaben, min 6 Zeichen."
                  maxlength="30" required="true"
                  pattern="(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,}"
                  title="Gross- und Keinbuchstaben, min 6 Zeichen.">
        </div>
        <!-- password -->
        <div class="form-group">
          <label for="password">Password *</label>
          <input type="password" name="password" class="form-control" id="password"
                  placeholder="Gross- und Kleinbuchstaben, Zahlen, Sonderzeichen, min. 8 Zeichen, keine Umlaute"
                  pattern="(?=^.{8,}$)((?=.*\d+)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                  title="mindestens einen Gross-, einen Kleinbuchstaben, eine Zahl und ein Sonderzeichen, mindestens 8 Zeichen lang,keine Umlaute."
                  required="true">
        </div>
        <button type="submit" name="button" value="submit" class="btn btn-info">Senden</button>
        <button type="reset" name="button" value="reset" class="btn btn-warning">Löschen</button>
      </form>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>