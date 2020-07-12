
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Examen</title>
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <?php require 'partials/header.php';
        require 'connection.php';
        require 'funciones.php';
        
        
        ?>

        <?php if(!empty($message)):
            
                  
            
            
            ?>
        <p> <?= $message ?></p>
        <?php endif; 
                
                session_start();
                $color=0;
                if (isset($_SESSION['user_id'])) {

                    $records = $conn->prepare('SELECT ci, nombres, apellido_paterno, apellido_materno, color FROM identificador WHERE ci = :ci');
                    $records->bindParam(':ci', $_SESSION['user_id']);
                    $records->execute();    
                    $results = $records->fetch(PDO::FETCH_ASSOC);
                    echo "<h1> Bienvenido ".$results['nombres']." ".$results['apellido_paterno']." ".$results['apellido_materno']."</h1>";
                    $color = $results['color'];
                    
                    if(isset($_GET['cambiar'])){
                        $color=$_GET['color'];                
                    }
                    cambiar_color($color);   
                }
        
        ?>

    <img src="img/imagen.jpg" width="200" height="200" >      
        
    <form> 
        <h2>Selecione un color</h2>
        <select name="color"> 
            <option value="1">Rojo</option> 
            <option value="2">Azul</option> 
            <option value="3">Verde</option> 
            <option value="4">Amarillo</option> 
        </select><br> 
        <input type="submit" name="cambiar" value="cambiar" > 
    </form> 


        <form method="post"> 
            <input type="submit" name="salir" value="salir" />
        </form>
    </body>


</html>

<?php
    
    if(isset($_GET['cambiar'])) {


        $data = [
            'color' =>$_GET['color'],
            'ci' => $_SESSION['user_id']
        ];
        
        $sql = 'UPDATE identificador SET color=:color WHERE ci=:ci';
        $stmt= $conn->prepare($sql);
        $stmt->execute($data);
        $color=$_GET['color'];
    }


    if(isset($_POST['salir']) or isset($_GET['salir'])) { 
        echo "salir";
        cerrar(); 
    } 

    function cerrar(){
        session_start();

        session_unset();

        session_destroy();

        header('Location: index.php');

     }
?>



