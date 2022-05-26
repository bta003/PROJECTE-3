<?php

@include 'config.php';

session_start();


if(!isset($_SESSION['user_name'])){
    ?><?php @include 'headernoreg.php'; ?><?php
} else{
    ?><?php @include 'header.php'; ?><?php
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ESKYDAM</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   

<section class="heading">
    <h3>Sobre nosaltres</h3>
</section>

<section class="about">

    <div class="flex">
 
        <div class="image">
            <img src="images/esqui.jpg" alt="">
        </div>

        <div class="content">
            <h3>Qui som?</h3>
            <p>Som una empresa dedicada al lloguer de material i cursos d'esqui on podreu obtenir l'equipament necessari per gaudir d'uns dies a la neu.</p>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>Que oferim</h3>
            <p>Nosaltres oferim un equipament adequat per a poder fer esqui tranquilament, botes, pals i esquís de tots els preus i talles.</p>
            <a href="home.php" class="btn">Llogar ara</a>
        </div>

        <div class="image">
            <img src="images/material.jpg" alt="">
        </div>

    </div>


</section>


<section class="home-contact">

   <div class="content">
      <h3>Tens alguna pregunta?</h3>
      <a href="contact.php" class="btn">Pàgina de contacte</a>
   </div>

</section>



<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>