<?php

$host_name = "localhost";
$database = "mpc";
$user_name = "root";
$password = "root";


$conn = mysqli_connect($host_name, $user_name, $password, $database);

if(mysqli_connect_errno())
{
echo '<p>La connexion au serveur MySQL a échoué: '.mysqli_connect_error().'</p>';
}

echo "<b>Clé Public de l'animal :</b> ".$_GET['key'];
echo "<br>";
$key = $_GET['key'];

$sql1 = 'SELECT * from Pet where publickey = "'.$key.'"';
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
        $owner = $row1["owner"];
        $name = $row1["name"];
    }
} else {
    echo "0 results";
}


$sql2 = 'SELECT * from Data where publickey = "'.$key.'"';
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        $animal = $row2["animal"];
        $breed = $row2["breed"];
        $sex = $row2["sex"];
        $vaccine = $row2["vaccine"];
        $allergy = $row2["allergy"];
    }
} else {
    echo "0 results";
}
$conn->close();
$target = $vaccine.$allergy;
$hash = hash('sha256', $target);
echo "<b>hash calculé des données : </b> ".$hash;
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
            <li class="nav-item active">
              <a class="nav-link" href="#">Pet
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Hash et Stockage Blockchain</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Nous sommes désormais sur la page d'actualisation des données de santé de <b><?php echo $name; ?></b>, patient du Dr Lafarge. Nous pouvons modifier les données de <b><?php echo $name; ?></b></p>
        <hr>
        <p class="mb-0">Cette page n'est accessible uniquement parce que nous sommes connectés sous l'identifiant du Dr Lafarge, le vétérinaire de Fifou.</p>
      </div>

      <!-- Horizontal form -->

      <form method="post" action="cible.php">
  <fieldset disabled>
  <div class="form-group row">
    <label for="disabledTextInput" class="col-sm-2 col-form-label">Owner</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="disabledTextInput" placeholder="Michael Marcus"
    </div>
  </div>
</fieldset disabled>
<fieldset disabled>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="mail" class="form-control" id="inputPassword3" placeholder=<?php echo $name ?>>
    </div>
  </div>
  </fieldset disabled>
  <fieldset disabled>
  <div class="form-group row">
    <label for="disabledTextInput" class="col-sm-2 col-form-label">Animal</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="disabledTextInput" placeholder=<?php echo $animal ?>>
    </div>
  </div>
</fieldset disabled>
<fieldset disabled>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Breed</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder=<?php echo $breed ?>>
    </div>
  </div>
</fieldset disabled>
<fieldset disabled>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Doctor</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Jean Lafarge">
    </div>
  </div>
</fieldset disabled>
<div class="form-group row">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Vaccine</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="vaccine" id="inputPassword3" placeholder=<?php echo $vaccine ?>>
  </div>
</div>
<div class="form-group row">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Allergy</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="allergy" id="inputPassword3" placeholder=<?php echo $allergy ?>>
  </div>
</div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Modify</button>
    </div>
  </div>
</form>

<!-- //Horizontal form -->


    </div>
    <!-- /.container -->


        <!-- Footer -->
        <footer class="py-5 bg-dark">
          <div class="container">
            <p class="m-0 text-center text-white">ECE &copy; MyPetCard 2018 - G.Euvrard - B.Roche - M.Truppa - T.Chalmandrier - M.Marcus</p>
          </div>
          <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      </body>

    </html>
