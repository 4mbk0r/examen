<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: usuario.php');
  }
  require 'connection.php';



  
  if (!empty($_POST['ci']) && !empty($_POST['clave'])) {
    $records = $conn->prepare('SELECT ci, clave FROM usuario WHERE ci = :ci');
    $records->bindParam(':ci', $_POST['ci']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && $_POST['clave']== $results['clave'] ) {
      $_SESSION['user_id'] = $results['ci'];
      header("Location: usuario.php");
    } else {
      $message = 'Lo siento la contraseña no coinciden';
    }
  }



?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Examen</title>
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <?php require 'partials/header.php' ?>

        <?php if(!empty($message)): ?>
        <p> <?= $message ?></p>
        <?php endif; ?>

       <form action="login.php" method="post">
            <input type="text" name="ci" placeholder="Ingrese CI">
            <input type="password" name="clave" placeholder="Ingrese Contraseña">
            <input type="submit" value="Ingresar">
       </form>
    
    </body>


</html>


