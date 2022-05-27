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
   <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ESKYDAM</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>



<section class="home-contact">
   <div class="content">
      <h3>Selecció de comarca</h3>
      <div class="dropdown">
         <button onclick="myFunction()" class="dropbtn">Comarques</button>
         <div id="myDropdown" class="dropdown-content">
            <a href="tempsAltUrgell.php">Alt Urgell</a>
            <a href="tempsAltaRibagorca.php">Alta Ribagorça</a>
            <a href="tempsCerdanya.php">Cerdanya</a>
            <a href="tempsPallarsSobira.php">Pallars Sobirà</a>
            <a href="tempsVallAran.php">Vall d'Aran</a>
         </div>
      </div>
      
      <script>
         function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
         }
         
         window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
               var dropdowns = document.getElementsByClassName("dropdown-content");
               var i;
               for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                     openDropdown.classList.remove('show');
                  }
         }
   }
}
</script>

</div>

</section>

<section class="prediccio">
   
   
   <div class="tempsavui">
      
      <div class="info-top">

<?php
date_default_timezone_set("Europe/Madrid");



// Funcio per obtenir la data actual
function obtenir_data(){

   $data_dia=date("d");
   $data_mes=date("m");
   $data_any=date("Y");

   $dia_setmana=[
      "Monday"=>"Dilluns",
      "Tuesday"=>"Dimarts",
      "Wednesday"=>"Dimecres",
      "Thursday"=>"Dijous",
      "Friday"=>"Divendres",
      "Saturday"=>"Dissabte",
      "Sunday"=>"Diumenge"
   ];

   $mes_any=[
      "01"=>"Gener",
      "02"=>"Febrer",
      "03"=>"Març",
      "04"=>"Abril",
      "05"=>"Maig",
      "06"=>"Juny",
      "07"=>"Juliol",
      "08"=>"Agost",
      "09"=>"Septembre",
      "10"=>"Octubre",
      "11"=>"Novembre",
      "12"=>"Desembre"
   ];

   $data_final=$dia_setmana[date("l")]." ".$data_dia." de ".$mes_any[$data_mes]." de ".$data_any;

   return $data_final;
}
?><h1 class="title"><?php echo obtenir_data();?></h1><?php

?>

         <h1 class="title2">Comarca</h1>
         <h1 class="title2">Capital</h1>
         <h1 class="title2">Temperatura minima</h1>
         <h1 class="title2">Temperatura maxima</h1>
      </div>
      
      <div class="info-bottom">
         
       <div class="dia">
         <h1 class="title3">Matí</h1>
            <img src="https://static-m.meteo.cat/assets-w3/images/meteors/estatcel/20.png">
         <h1 class="title2">Probabilitat calamarsa</h1>
         <h1 class="title3">5%</h1>
         <h1 class="title2">Probabilitat precipitacions</h1>
         <h1 class="title3">30%</h1>
       </div>

       <div class="dia">
         <h1 class="title3">Tarda</h1>
            <img src="https://static-m.meteo.cat/assets-w3/images/meteors/estatcel/20.png">
         <h1 class="title2">Probabilitat calamarsa</h1>
         <h1 class="title3">5%</h1>
         <h1 class="title2">Probabilitat precipitacions</h1>
         <h1 class="title3">30%</h1>
       </div>

      </div>
      
   </div>


</section>




<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>
<script src="prediccio.js"></script>

</body>
</html>