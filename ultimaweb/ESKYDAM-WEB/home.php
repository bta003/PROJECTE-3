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
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
   <title>ESKYDAM</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

   <script src="js/carrito.js"></script>

</head>
<body>
   
<section class="home">

   <div class="content">
      <h3>El nostre material</h3>
      <a href="about.php" class="btn">Més informació</a>
   </div>

</section>

<div class="categories">
   
   <h1 class="title">Filtrar per categoria</h1>

   <div class="filtres">
      <button class="btn" onclick="myFunctionE()">Esquis</button>
      <button class="btn" onclick="myFunctionP()">Pals</button>
      <button class="btn" onclick="myFunctionB()">Botes</button>
      <button class="btn" onclick="myFunctionT()">Mostrar tot</button>  
   </div>
</div>


<section class="products" id="esquis">



   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM Material M, Esquis E WHERE M.ID_material=E.ID_material") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
         $id_material = $fetch_products['ID_material'];
         $preu = $fetch_products['Preu'];
         $imatge = $fetch_products['Imatge'];
         $marca = $fetch_products['Marca'];
         $model = $fetch_products['Model'];
         $estoc = $fetch_products['Estoc'];
      ?>
      <form action="" method="POST" class="box">
         <div class="price"><?php echo $preu; ?>€</div>
         <img src="uploaded_img/<?php echo $imatge; ?>" alt="" class="image">
         <div class="name"><h3><?php echo $marca; ?></h3></div>
         <div class="model"><?php echo $model; ?></div>
         <div class="name"><h3>Estoc disponible: </h3><?php echo $estoc; ?></div>
         <input class="idmaterial" type="hidden" name="product_id" value="<?php echo $id_material; ?>">
         <input type="hidden" name="product_name" value="<?php echo $marca; ?>">
         <input type="hidden" name="product_name2" value="<?php echo $model; ?>">
         <input type="hidden" name="product_price" value="<?php echo $preu; ?>">
         <input type="hidden" name="product_image" value="<?php echo $imatge; ?>">
         <input type="hidden" name="product_name" value="<?php echo $estoc; ?>">
         <input type="button" value="Comprar" class="guardar">
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">encara no ha sigut afegit cap producte</p>';
      }
      ?>

   </div>
</section>

   
<section class="products" id="pals">
   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM Material M, Pals P WHERE M.ID_material=P.ID_material") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
         $id_material = $fetch_products['ID_material'];
         $preu = $fetch_products['Preu'];
         $imatge = $fetch_products['Imatge'];
         $marca = $fetch_products['Marca'];
         $model = $fetch_products['Model'];
         $estoc = $fetch_products['Estoc'];
      ?>
      <form action="" method="POST" class="box">
         <div class="price"><?php echo $preu; ?>€</div>
         <img src="uploaded_img/<?php echo $imatge; ?>" alt="" class="image">
         <div class="name"><h3><?php echo $marca; ?></h3></div>
         <div class="model"><?php echo $model; ?></div>
         <div class="name"><h3>Estoc disponible: </h3><?php echo $estoc; ?></div>
         <input class="idmaterial" type="hidden" name="product_id" value="<?php echo $id_material; ?>">
         <input type="hidden" name="product_name" value="<?php echo $marca; ?>">
         <input type="hidden" name="product_name2" value="<?php echo $model; ?>">
         <input type="hidden" name="product_price" value="<?php echo $preu; ?>">
         <input type="hidden" name="product_image" value="<?php echo $imatge; ?>">
         <input type="hidden" name="product_name" value="<?php echo $estoc; ?>">
         <input type="button" value="Comprar" class="guardar">
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">encara no ha sigut afegit cap producte</p>';
      }
      ?>

   </div>
</section>

<section class="products" id="botes">
   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM Material M, Botes B WHERE M.ID_material=B.ID_material") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
         $id_material = $fetch_products['ID_material'];
         $preu = $fetch_products['Preu'];
         $imatge = $fetch_products['Imatge'];
         $marca = $fetch_products['Marca'];
         $model = $fetch_products['Model'];
         $estoc = $fetch_products['Estoc'];
      ?>
      <form action="" method="POST" class="box">
         <div class="price"><?php echo $preu; ?>€</div>
         <img src="uploaded_img/<?php echo $imatge; ?>" alt="" class="image">
         <div class="name"><h3><?php echo $marca; ?></h3></div>
         <div class="model"><?php echo $model; ?></div>
         <div class="name"><h3>Estoc disponible: </h3><?php echo $estoc; ?></div>
         <input class="idmaterial" type="hidden" name="product_id" value="<?php echo $id_material; ?>">
         <input type="hidden" name="product_name" value="<?php echo $marca; ?>">
         <input type="hidden" name="product_name2" value="<?php echo $model; ?>">
         <input type="hidden" name="product_price" value="<?php echo $preu; ?>">
         <input type="hidden" name="product_image" value="<?php echo $imatge; ?>">
         <input type="hidden" name="product_name" value="<?php echo $estoc; ?>">
         <input type="button" value="Comprar" class="guardar">
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">encara no ha sigut afegit cap producte</p>';
      }
      ?>

   </div>

</section>

<div id="dades">
        <div id="titol_dades">
            <p>Imatge</p>
            <p>Marca</p>
            <p>Model</p>
            <p>Preu/unitat</p>
            <p>Quantitat</p>
            <p>Total</p>
        </div>

        <div id="producte_carrito"></div>

        <input type="button" value="Buidar carrito" id="eliminar" class="btn">
</div>

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