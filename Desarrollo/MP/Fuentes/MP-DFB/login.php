<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meal Planner - Iniciar Sesión</title>
  <link rel="stylesheet" href="./assets/css/log-reg.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;500&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=ABeeZee&family=Montserrat&family=Roboto+Slab&display=swap" rel="stylesheet">
</head>
<main class="container-fluid px-0">
    <!-- Start your project here-->
    <div class="container-fluid p-0 box-1" style="height:100%; width:100%;">
      <div class="container-fluid text-left p-0 busqueda">
        <div class="m-0 p-0">
			    <?php include("layouts/header.php"); ?>
          <!-- MDB -->
          <script type="text/javascript" src="js/mdb.min.js"></script>
          <!-- Custom scripts -->
          <script type="text/javascript"></script>
        </div>
        <div class="container w-50" style="background-color:rgb(51 59 79 / 78%);border-radius:20px;">
          <h1 style="font-family: 'Roboto', sans-serif;padding-top:3vw" class="text-center">INICIAR SESIÓN</h1>
          <div class="container w-75">

          
            <h2 style="font-family: 'Montserrat', sans-serif;font-size:2vw;">Ingrese a su cuenta</h2>
            <form action="" method="post">
              <div class="row">
                <?php if(isset($_SESSION["errorMessage"])) ?>
                <i class="login-icon"></i>
                <input id="input-login" class="form-control" type="email" name="email" placeholder="USUARIO"
                style="background: url('assets/icons/user.svg') !important;background-repeat: no-repeat !important;
                ">
              </div>
              <div class="row" style="margin-top:5%">
                <i class="pass-icon"></i>
                <input id="input-login" class="form-control" type="password" name="password" placeholder="CONTRASEÑA"
                style="background: url('assets/icons/lock.svg') !important;background-repeat: no-repeat !important;
                ">
              </div>
              <div class="text-center">
                <input type="submit" name="submit" value="Ingresar">

              </div>
              
            </form>
            <div class="register-option text-center" style="padding-bottom:10%">
              <p>¿No tienes cuenta?</p>
              <a href="register.php" stlye="color:white">REGISTRATE</a>
            </div>
          </div>
        </div>
      </div>
      <br> 
      <br>
      <br>
    </div> 
    
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</main>
  <?php require('./layouts/footer.php')?>
<?php
  if(isset($_POST["submit"])){
      if(!empty($_POST['email']) && !empty($_POST['password'])) {
          $usuario=strtolower($_POST['email']);
          $pass=$_POST['password'];
          $con=mysqli_connect('localhost','root','','mp');
          $query=mysqli_query($con, "SELECT * FROM usuario WHERE correo='".$usuario."' AND password='".$pass."'");
          $numrows=mysqli_num_rows($query);

          if($numrows!=0) {
				
              while($row=mysqli_fetch_assoc($query)) {
                  $dbusername=$row['correo'];
                  $dbpassword=$row['password'];
                  $dbnombre=$row['nombres'];
              }
            
              if($usuario == $dbusername && $pass == $dbpassword) {
                  session_start();
                  $_SESSION['sess_user']=$dbnombre;
                  header("Location: index.php");
              }  
          } else {
              $message = "Error! Usuario o password inválidos";
              echo "<script type='text/javascript'>alert('$message');</script>";
          }

      } else {
          $message = "Error! Completar todos los campos";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
  }
  ?>
</html>