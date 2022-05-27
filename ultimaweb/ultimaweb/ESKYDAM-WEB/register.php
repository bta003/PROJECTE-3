<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $filter_dni = filter_var($_POST['dni'], FILTER_SANITIZE_STRING);
   $dni = mysqli_real_escape_string($conn, $filter_dni);
   $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $name = mysqli_real_escape_string($conn, $filter_name);
   $filter_cognoms = filter_var($_POST['cognoms'], FILTER_SANITIZE_STRING);
   $cognoms = mysqli_real_escape_string($conn, $filter_cognoms);
   $filter_telefon = filter_var($_POST['telefon'], FILTER_SANITIZE_STRING);
   $telefon = mysqli_real_escape_string($conn, $filter_telefon);
   $filter_username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
   $username = mysqli_real_escape_string($conn, $filter_username);
   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $email = mysqli_real_escape_string($conn, $filter_email);
   $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
   $pass = mysqli_real_escape_string($conn, md5($filter_pass));
   $filter_cpass = filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
   $cpass = mysqli_real_escape_string($conn, md5($filter_cpass));

   $select_users = mysqli_query($conn, "SELECT * FROM `Usuaris` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'Aquest usuari ja existeix';
   }else{
      if($pass != $cpass){
         $message[] = 'La contrasenya no coincideix';
      }else{
         mysqli_query($conn, "INSERT INTO `Usuaris`(dni, nom, cognoms, telefon, email, nomusuari, contrasenya) VALUES('$dni','$name','$cognoms','$telefon', '$email', '$username', '$pass')") or die('query failed');
         $message[] = 'Usuari registrat amb èxit';
         header('location:login.php');
      }
   }

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
   <link rel="stylesheet" href="css/login.css">


</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
      </div>
      ';
   }
}
?>
   
<section class="form-container">

   <form action="" method="post">
      <h3>Registrar-se</h3>
      <input type="text" name="dni" class="box" placeholder="DNI" required>
      <input type="text" name="name" class="box" placeholder="Introdueixi el nom" required>
      <input type="text" name="cognoms" class="box" placeholder="Cognoms" required>
      <input type="text" name="telefon" class="box" placeholder="Numero de telèfon" required>
      <input type="email" name="email" class="box" placeholder="Correu electrònic" required>
      <input type="text" name="username" class="box" placeholder="Nom d'usuari" required>
      <input type="password" name="pass" class="box" placeholder="Introdueixi una contrasenya" required>
      <input type="password" name="cpass" class="box" placeholder="Confirma la contrasenya" required>
      <input type="submit" class="btn" name="submit" value="Registrat ara">
      <p>Ja tens un compte? <a href="login.php">Inicia sessió</a></p>
      <p>Torna a l'inici: <a href="index.php">Inici</a></p>

   </form>

</section>

</body>
</html>