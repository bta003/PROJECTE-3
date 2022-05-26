<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $email = mysqli_real_escape_string($conn, $filter_email);
   $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
   $pass = mysqli_real_escape_string($conn, md5($filter_pass));

   $select_users = mysqli_query($conn, "SELECT * FROM `Usuaris` WHERE email = '$email' AND contrasenya = '$pass'") or die('No s'ha trobat el usuari');


   if(mysqli_num_rows($select_users) > 0){
      
      $row = mysqli_fetch_assoc($select_users);

      

      $_SESSION['user_name'] = $row['nomusuari'];
      $_SESSION['user_email'] = $row['email'];
      $_SESSION['dni'] = $row['DNI'];
      header('location:home.php');


   }else{
      $message[] = 'Correu o contrasenya incorrecta';
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
      <h3>Inicia la sessió</h3>
      <input type="email" name="email" class="box" placeholder="Correu electrònic" required>
      <input type="password" name="pass" class="box" placeholder="Contrasenya" required>
      <input type="submit" class="btn" name="submit" value="Entrar">
      <p>No tens un compte? <a href="register.php">Registra't</a></p>
      <p>Torna a l'inici: <a href="index.php">Inici</a></p>
   </form>

</section>

</body>
</html>