<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meal Planner - Registrarse</title>
  <link rel="stylesheet" href="./assets/css/log-reg.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;500&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
</head>
<main class="container-fluid px-0">
    <!-- Start your project here-->
    <div class="container-fluid p-0 box-1-register" style="height:100%; width:100%;">
      <div class="container-fluid text-left p-0 busqueda">
        <div class="m-0 p-0">
			    <?php include("layouts/header.php"); ?>
          <!-- MDB -->
          <script type="text/javascript" src="js/mdb.min.js"></script>
          <!-- Custom scripts -->
          <script type="text/javascript"></script>
        </div>
        <div class="container w-50" style="background-color:rgb(51 59 79 / 78%);border-radius:20px;">
          <h1 style="font-family: 'Roboto', sans-serif;padding-top:3vw" class="text-center">REGISTRATE</h1>
          <div class="container w-100">

          
            <h2 style="font-family: 'Montserrat', sans-serif;font-size:1.5vw;" class="text-center">
            Necesitamos de tu información básica para empezar</h2>

            <form action="" method="post">
              <div class="row g-5">
                <div class="col">
                  <label for="input1" class="form-label">Nombres</label>
                  <input class="form-control" type="text" name="name" placeholder="Ingresar sus nombres completos" 
                  id="input1" require>
                </div>
                <div class="col">
                <label for="input2" class="form-label">Contraseña</label>
                <input class="form-control" type="password" name="pass" placeholder="Ingresar su contraseña" 
                for="input1" require>
                </div>
              </div>
              <div class="row g-5" style="margin-top:-5%">
                <div class="col">
                  <label for="input3" class="form-label">Apellidos</label>
                  <input class="form-control" type="text" name="last-name" placeholder="Ingresar sus apellidos completos" 
                  id="input3" require>
                </div>
                <div class="col">
                <label for="input4" class="form-label">Repite contraseña</label>
                <input class="form-control" type="password" name="pass2" placeholder="Ingresar nuevamente su contraseña" 
                for="input4" require>
                </div>
              </div>
              <div class="row g-5" style="margin-top:-5%">
                <div class="col">
                  <label for="input5" class="form-label">Correo</label>
                  <input class="form-control" type="email" name="email" placeholder="Ingresar su correo electrónico" 
                  for="input5" require>
                </div>
                <div class="col">
                <label for="input6" class="form-label">Celular(opcional)</label>
                <input class="form-control" type="text" name="phone" placeholder="Ingresar su número de celular" for="input6">
                </div>
              </div>
              <div class="row g-5" style="margin-top:-5%">
                <div class="col">
                  <label for="input7" class="form-label">Sexo</label>
                  <select name="sexo" id="" class="form-select">
                  <div class="form-control">
                    <option value="" selected disabled hidden>Seleccionar</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                  </div>
                </select>
                </div>
                <div class="col">
                <label for="input8" class="form-label">Edad</label>
                <input class="form-control" type="text" name="age" placeholder="Ingresar su edad" 
                id="input8" require>
                </div>
              </div>

              <div class="text-center">
                <input type="submit" name="submit" value="Registrar">

              </div>
              
            </form>
            <div class="register-option text-center" style="padding-bottom:10%">
              <p>¿Ya tienes cuenta?</p>
              <a href="login.php" stlye="color:white !important; font-size:1vw">INICIAR SESIÓN</a>
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
      if(!empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass2']) && !empty($_POST['name']) &&
         !empty($_POST['last-name']) && !empty($_POST['sexo']) && !empty($_POST['age'])) {
          $name=$_POST['name'];
          $lastname=$_POST['last-name'];
          $email=strtolower($_POST['email']);
          $gender=$_POST['sexo'];
          $pass=$_POST['pass'];
          $pass2=$_POST['pass2'];
          $age=$_POST['age'];
          $phone=$_POST['phone'];

          if($pass != $pass2) {
            $message = "Error! Las contraseñas tienen que coincidir";
            echo "<script type='text/javascript'>alert('$message');</script>";
          } else {
              $con=mysqli_connect('localhost','root','','mp');
              $query=mysqli_query($con,"SELECT * FROM usuario WHERE correo='".$email."'");
              $numrows=mysqli_num_rows($query);

              if($numrows==0) {
                  $sql="INSERT INTO usuario (nombres, apellidos, sexo, edad, correo, password, celular) VALUES ('$name','$lastname', '$gender', '$age', '$email', '$pass', '$phone')";  
                  $result=mysqli_query($con, $sql);

                  if($result) {
                      $message = "Cuenta de usuario creada correctamente";
                      echo "<script type='text/javascript'>alert('$message');</script>";
                      echo "<script>window.location.href = 'login.php';</script>";
                  } else {  
                      $message = "Error!";
                      echo "<script type='text/javascript'>alert('$message');</script>";
                  }
              } else {
                  $message = "Error! El correo ingresado ya está siendo usado por otro usuario";
                  echo "<script type='text/javascript'>alert('$message');</script>";

              }
          }
      } else {
          $message = "Error! Completar todos los campos";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
  }
?>
</html>