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
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Programm.php">Programm</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Preise.php">Preise</a>
          </li>
		  <li class="nav-item active">
            <a class="nav-link" href="#">Login
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="Contact.php">Contact</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  </body>
  </html>

  <?php
// TODO: Verbindung zur Datenbank einbinden
session_start();
include 'db_connector.inc.php';

$error = '';
$message = $benutzername = '';


// Formular wurde gesendet und Besucher ist noch nicht angemeldet.
	
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)){
	
	// benutzername
	if(!empty(trim($_POST['benutzername']))){

		$benutzername = trim($_POST['benutzername']);
		
		// prüfung benutzername
		if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,}/", $benutzername) || strlen($benutzername) > 30){
			$error .= "Der Benutzername entspricht nicht dem geforderten Format.<br />";
		}
	}
	else {
		$error .= "Geben Sie bitte den Benutzername an.<br />";
	}

	// password
	if(!empty(trim($_POST['password']))){
		$password = trim($_POST['password']);
		// passwort gültig?
		if(!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password)){
			$error .= "Das Passwort entspricht nicht dem geforderten Format.<br />";
		}
	} else {
		$error .= "Geben Sie bitte das Passwort an.<br />";
	}
	
	// kein fehler
	if(empty($error)){

		// TODO SELECT Query erstellen, user und passwort mit Datenbank vergleichen
		$query = "SELECT * FROM beutzer where benutzername=? LIMIT 1";
		// TODO prepare()
		$stmt = $mysqli->prepare($query);
		if (false === $stmt ) {
			die('prepare() failed: ' . htmlspecialchars($mysqli->error));
		}
		// TODO bind_param()
		$stmt->bind_param("s", $benutzername);
		if (false === $stmt ) {
			die ('bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		// TODO execute()
		$stmt->execute();
		if (false === $stmt ) {
			die ('execute() failed: ' . htmlspecialchars($stmt->error));
		}
		// TODO Passwort auslesen und mit dem eingegeben Passwort vergleichen
		$result=$stmt->get_result();
		if (false === $stmt ) {
			die ('get_result() failed: ' . htmlspecialchars($stmt->error));
		} 
		$row = $result->fetch_assoc();
		echo "Vorname: " . $row['firstname'] . ", Nachname : " . $row['lastname'] . "passwort: " . $row['password'] ."<br />"; 
		if (password_verify($password, $row['password'])){ 
			// TODO wenn Passwort korrekt:  $message .= "Sie sind nun eingeloggt";
			echo "Sie sind nun eingeloggt";
			$_SESSION['loggedin'] = "Ja";

			$_SESSION['user'] = trim($_POST['username']);
			echo $_SESSION['user'];
			header("Location: index.php");


		}
		else{
			$error .= "Benutzername/Passwort sind falsch";
		}
	}
	$stmt->close();
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
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
		<div class="container">
			<h1>Login</h1>
			<p>
				Bitte melden Sie sich mit Benutzernamen und Passwort an.
			</p>
			<?php
				// fehlermeldung oder nachricht ausgeben
				if(!empty($message)){
					echo "<div class=\"alert alert-success\" role=\"alert\">" . $message . "</div>";
				} else if(!empty($error)){
					echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error . "</div>";
				}
			?>
			<form action="" method="POST">
				<div class="form-group">
				<label for="benutzername">Benutzername *</label>
        <input type="text" name="benutzername" class="form-control" id="benutzername"
						value=""
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
		<p><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">Neu Laden</a></p> 



    <div class="reglink">
    <h1 class="font-weight-light">Noch kein Konto?</h1>
    <p>Ganz einfach hier ein Konto anlegen</p>
    <a class="btn btn-primary" href="registrieren.php">Registrieren</a>
  </div>
	</body>
	<h1>Cheffe2.1</h1>
</html>
