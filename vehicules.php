<?php 
include_once('connect.php');

if(isset($_POST['search'])) {
  $query = $_POST['input'];
  $sql = "SELECT * FROM vehicules WHERE name LIKE '%$query%' OR description LIKE '%$query%'";
  $stmt = $bdd->prepare($sql);
  $stmt->execute();
  $a = $stmt;
} else {
  $sql1 = "SELECT * FROM vehicules";
  $reponse1 = $bdd->query($sql1) or die ($bdd->errorinfo()[2]);
  $a = $reponse1;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Accueil-LocationDeVoitures</title>
    <link rel="stylesheet" href="vehicules.css">
    <link rel="stylesheet" href="style.css">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  
</head>
<body class="ll">

  <header>
          <div class="logo">
              <img class="img" src="cap.png">
              <a href="index.html">Rent</a>  
              </div>
          
            <ul style="margin-top:1.5cm; ">
              <li ><a href="seconnecter.html" style="color: white; text-decoration: none;"> Se connecter</a></li>
              <li><a href="contact.html" style="color: white; text-decoration: none;"> Contact </a></li>
              <li><a href="offres.html" style="color: white; text-decoration: none;"> Nos offres</a></li>
              <li class="active" style="color: white; text-decoration: none;"><a href="vehicules.php"> Vehicules </a></li>
              <li ><a href="index.html" style="color: white; text-decoration: none;">  Acceuil </a></li>
          </ul>
  </header>
  <div class="search-bar" >
    <form  action="vehicules.php" method="post">
      <input type="text" name="input" placeholder="search">
      <button type="submit" name="search" ><i class="fa fa-search"></i></button>
    </form>
  </div>

  <div class="container">
    <h1 class="title" style="color:aliceblue; text-align: center;
      margin-bottom:-0.8cm; margin-top:-0.8cm; ">Nos Véhicules</h1>

  <div class="row">
  <?php
  
  while ($ligne = $a->fetchObject()){
  ?>
  <div class="col-md-4">
    <div class="card">
      <img class="card-img-top" src="<?=$ligne->image ?>" alt="<?=$ligne->name ?>">
      <div class="card-body">
        <h5 class="card-title"><?=$ligne->name ?></h5>
        <a href="reservation.php?idvec=<?=$ligne->id ?>" class="btn">Réserver</a>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
</div>
</body>
<footer>
  <p>© 2023 Car Rent. Tous droits réservés.</p>
</footer>
    </html> 
