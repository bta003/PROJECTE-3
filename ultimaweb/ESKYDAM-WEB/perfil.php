<?php

@include 'config.php';

session_start();


if(!isset($_SESSION['user_name'])){
    ?><?php header('Location: login.php'); ?><?php
} 
@include 'header.php';


if (isset($_POST["submit"])) {
   $email = mysqli_real_escape_string($conn, $_POST["email"]);
   $username = mysqli_real_escape_string($conn, $_POST["username"]);
   $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
   $cpassword = mysqli_real_escape_string($conn, md5($_POST["cpassword"]));


   if ($password === $cpassword) {

        
      $sql = "UPDATE Usuaris SET email='$email', nomusuari='$username', contrasenya='$password' WHERE dni='{$_SESSION["dni"]}'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
         session_unset();
         session_destroy();
         echo ("<script LANGUAGE='JavaScript'>
         window.alert('El perfil ha sigut modificat correctament. Torna a iniciar sessió per aplicar els canvis');
         window.location.href='login.php';
         </script>");
      } else {
          echo "<script>alert('No s'ha pogut modificar el perfil.');</script>";
          echo  $conn->error;
      }
        
   } else {
      echo "<script>alert('Les contrasenyes no coincideixen, intenta-ho de nou.');</script>";
   }
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

</head>
<body>

<body class="profile-page">
    <div class="wrapper">
        <h1>Dades de l'usuari</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <?php

            $sql = "SELECT * FROM Usuaris WHERE dni='{$_SESSION["dni"]}'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="inputBox">
                       <h2>Correu electrònic</h2>
                        <input class="editperfil" type="email" id="email" name="email" placeholder="Correu electrònic" value="<?php echo $row['email']; ?>" required>
                    </div>
                    <div class="inputBox">
                        <h2>Nom de perfil</h2>
                        <input class="editperfil" type="text" id="username" name="username" placeholder="Nom d'usuari" value="<?php echo $row['nomusuari']; ?>" required>
                    </div>
                    <div class="inputBox">
                        <h2>Contrasenya</h2>
                        <input class="editperfil" type="password" id="password" name="password" placeholder="Contrasenya" value="" required>
                    </div>
                    <div class="inputBox">
                        <h2>Contrasenya de confirmació</h2>
                        <input class="editperfil" type="password" id="cpassword" name="cpassword" placeholder="Confirma la contrasenya" value="" required>
                    </div>
            <?php
                }
            }

            ?>
            <div>
                <button type="submit" name="submit" class="btn">Modificar dades</button>
            </div>
        </form>
    </div>
</body>

<section class="products">

   <h1 class="title">Material llogat</h1>

   <div class="box-container">

      <?php
         $dni = $_SESSION['dni'];
         $select_products = mysqli_query($conn, "SELECT * FROM `Lloga_material` LM, Material M WHERE LM.DNI='$dni' AND M.ID_material=LM.ID_material") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
         $id_material = $fetch_products['ID_material'];
         $preu = $fetch_products['Preu'];
         $imatge = $fetch_products['Imatge'];
         $marca = $fetch_products['Marca'];
         $model = $fetch_products['Model'];
         $data = $fetch_products['data'];
      ?>
      <form action="" method="POST" class="box">
         <div class="price"><?php echo $preu; ?>€</div>
         <img src="uploaded_img/<?php echo $imatge; ?>" alt="" class="image">
         <div class="name"><h3><?php echo $marca; ?></h3></div>
         <div class="name"><?php echo $model; ?></div>
         <div class="name"><h3>Data en què s'ha llogat: </h3><?php echo $data; ?></div>
         <input type="hidden" name="product_id" value="<?php echo $id_material; ?>">
         <input type="hidden" name="product_name" value="<?php echo $marca; ?>">
         <input type="hidden" name="product_name2" value="<?php echo $model; ?>">
         <input type="hidden" name="product_price" value="<?php echo $preu; ?>">
         <input type="hidden" name="product_image" value="<?php echo $imatge; ?>">
         <input type="hidden" name="product_name" value="<?php echo $estoc; ?>">
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">encara no ha llogat cap material</p>';
      }
      ?>

   </div>

</section>


<section class="cursos">

   <h1 class="title">Cursos llogats</h1>

   <div class="box-container">

      <?php
         $dni = $_SESSION['dni'];
         $select_cursos = mysqli_query($conn, "SELECT * FROM `Lloga_curs` LC, Cursos C WHERE LC.DNI='$dni' AND LC.ID_curs=C.ID_curs") or die('query failed');
         if(mysqli_num_rows($select_cursos) > 0){
            while($fetch_cursos = mysqli_fetch_assoc($select_cursos)){
         $id_curs = $fetch_cursos['ID_curs'];
         $nomcurs = $fetch_cursos['Nom'];
         $numhores = $fetch_cursos['Num_hores'];
         $preufinal = $fetch_cursos['Preu_final'];
         $desc = $fetch_cursos['Descripcio'];
         $datainici = $fetch_cursos['Data_inici'];
         $horainici = $fetch_cursos['Hora_inici'];
      ?>
      <form action="" method="POST" class="box">
         <div class="price"><p>Preu final: </p><?php echo $preufinal; ?>€</div>
         <div class="name"><h3><?php echo $nomcurs; ?></h3></div>
         <div class="name"><?php echo $desc; ?></div>
         <div class="name"><h4>Numero d'hores: </h4><?php echo $numhores; ?></div>
         <div class="name"><h4>Data: </h4><?php echo $datainici; ?></div>
         <div class="name"><h4>Hora d'inici: </h4><?php echo $horainici; ?></div>
         <input type="hidden" name="product_id" value="<?php echo $id_curs; ?>">
         <input type="hidden" name="product_name" value="<?php echo $nomcurs; ?>">
         <input type="hidden" name="product_name2" value="<?php echo $numhores; ?>">
         <input type="hidden" name="product_price" value="<?php echo $preufinal; ?>">
         <input type="hidden" name="product_image" value="<?php echo $desc; ?>">
         <input type="hidden" name="product_name" value="<?php echo $datainici; ?>">
         <input type="hidden" name="product_name" value="<?php echo $horainici; ?>">
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">encara no ha llogat cap curs</p>';
      }
      ?>

   </div>

</section>





</body>

<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>