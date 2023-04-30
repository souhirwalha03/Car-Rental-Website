<?php 
include_once('connect.php');
if(isset($_REQUEST['name']))
{
  $n=$_REQUEST['name'];
  $e=$_REQUEST['email'];
  $l=$_REQUEST['location'];
  $p=$_REQUEST['pickup'];
  $r=$_REQUEST['return'];
  $idvec=$_REQUEST['idvec'];

  $n=$bdd->quote($n); 
  $e=$bdd->quote($e); 
  $l=$bdd->quote($l); 
  $p=$bdd->quote($p); 
  $r=$bdd->quote($r); 
  $sql1="INSERT INTO `reservation` VALUES (NULL,$n,$e,$l,$p,$r,$idvec) ";
  $reponse1 = $bdd->exec($sql1) or die ($bdd->errorinfo()[2]) ;
  
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Accueil-LocationDeVoitures</title>
        <link rel="stylesheet" href="reservation.css">
    </head>
<body class="ll">
    <header>
        <div >
            <div class="logo">
                <img class="img" src="cap.png">
                <a href="index.html">Rent</a>  
                </div>
            
            <ul >
               
                <li ><a href="seconnecter.html"> Se connecter</a></li>
                <li><a href="contact.html"> Contact </a></li>
                <li><a href="offres.html"> Nos offres</a></li>
                <li class="active"><a href="vehicules.php"> Vehicules </a></li>
                <li ><a href="index.html">  Acceuil </a></li>
            </ul>
        </div>
    </header>

<?php 
if(isset($reponse1) && $reponse1 != 0 )
{ echo "<h1 style='color: white'> Votre réservation à été effectuée avec succée :)</h1>";
} ?>
<form id="reservation-form" onsubmit="return validateForm(event)" action="reservation.php?idvec=<?=$_REQUEST['idvec']?>" method="POST">
<div class="form-box">
  <div class="form-value">
    <form action="">
        <div class="inputbox">    <input placeholder="Name"  type="text" id="name" name="name" required>
        </div>
        <div class="inputbox">    <input placeholder="Email" type="email" id="email" name="email" required>
        </div>
        <div class="inputbox">    <input placeholder="Pickup Location" type="text" id="pickup-location" name="location" required>
        </div>
        <label for="pickup-date">Pickup Date :</label><br>
        <div class="inputbox">    <input type="date" id="pickup-date" name="pickup" required>
        </div>
        <label for="return-date">Return Date :</label><br>
        <div class="inputbox">    <input type="date" id="return-date" name="return" required>
        </div>      
  </div>
</div>
  <input  type="submit" value="Submit" onclick="validateForm(event)">
    </form>
</div>
</div>

<script>

function validateForm(event) {
 
  const name = document.getElementById("name");
  const email = document.getElementById("email");
  const pickupLocationInput = document.getElementById('pickup-location');
  const pickupDateInput = document.getElementById('pickup-date');
  const returnDateInput = document.getElementById('return-date');
  const carTypeInput = document.getElementById('car-type');
  
 
 if (!name.value ) {
    alert("Name must be filled out");
    return false;
  }
  
  else if  (!email.value) {
    alert("Email must be filled out");
    return false;
  }else if  (!pickupLocationInput.value) {
    alert("you must select a pickup Location");
    return false;
  }else if  (!pickupDateInput.value ) {
    alert("you must select a pickup Date Input");
    return false;
  }else if  (!returnDateInput.value) {
    alert("you must select a return Date Input");
    return false;
  }else if  (!carTypeInput.value) {
    alert("you must select a car Type Input");
    return false;
  }

  const pickupDate = new Date(pickupDateInput.value);
  const returnDate = new Date(returnDateInput.value);

  if (pickupDate >= returnDate) {
    alert('Please make sure the return date is after the pickup date.');
    return false;
  }


  alert('Form submitted successfully!');
  return true;
}



</script>
</body>

