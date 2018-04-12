<?php
echo $_POST["vaccine"];
echo "<br>";
echo $_POST["allergy"];
$vaccine = $_POST["vaccine"];
$allergy = $_POST["allergy"];
$target = $vaccine.$allergy;
echo "<br>";
echo $target;
echo "<br>";
$hash = hash('sha256', $target);
echo "<b>hash calculé : </b>".$hash;
echo "<br><br><b>... ENREGISTREMENT DU HASH SUR LA BLOCKCHAIN</b>";


$host_name = "localhost";
$database = "mpc";
$user_name = "root";
$password = "root";


$conn = mysqli_connect($host_name, $user_name, $password, $database);

if(mysqli_connect_errno())
{
echo '<p>La connexion au serveur MySQL a échoué: '.mysqli_connect_error().'</p>';
}

$sql1 = 'UPDATE Data SET vaccine = "'.$vaccine.'", allergy = "'.$allergy.'" ';
$result1 = $conn->query($sql1);

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MyPetCard - Demo</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/small-business.css" rel="stylesheet">
    <script src="web3.min.js"></script>

  </head>

  <body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/MypetCard">MyPetCard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/MyPetCard">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pet
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Hash et Stockage Blockchain</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<a class="nav-link" href="/MyPetCard">Retourner à la page d'accueil</a>
