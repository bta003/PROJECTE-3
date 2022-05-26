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
    <h3>Contacta amb nosaltres</h3>
</section>

<section class="contacte">
    <h3>Demana informació aquí</h3>
    <div class="container">


        <div class="esquerra">
            <div class="info">
                <div class="dades">
                    <div class="secciocont">
                        <h6 class="titol">Telèfon d'atenció al client</h6>
                        <p class="data">+34 629 45 18 77</p>
                    </div>
                
                    <div class="secciocont">
                        <h6 class="titol">Correu electrònic</h6>
                        <p class="data">eskydam@contacte.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="dreta">
                <div class="mapa"><iframe frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDk89J4FSunMF33ruMVWJaJht_Ro0kvoXs&amp;q=Avinguda Diagonal 450, Barcelona"
                    allowfullscreen=""></iframe>
                </div>
        </div>
    </div>
</sectin>





<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>