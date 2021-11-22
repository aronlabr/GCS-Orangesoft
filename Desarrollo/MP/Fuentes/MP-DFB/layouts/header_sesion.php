<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand me-2" href="./index.php">
      <img
        src="img/logo.png"
        height="auto"
        alt=""
        loading="lazy"
        style="margin-top: -14px;width: 210px;height: 90px;"
        class="img-fluid me-3"
      />
    </a>
    <button
      class="navbar-toggler navbar-toggler-right ml-auto"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="navbar-nav collapse navbar-collapse" id="navbarButtonsExample">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-5 mx-auto">
        <li class="nav-item ">
          <a class="nav-link text-white" href="./about-us.php" >Nosotros  -   <?=$usuario;?> <hr style="opacity: 1;"></a>
        </li>
      </ul>
      <div class="d-flex align-items-center botones">
        <a href="./cerrar_sesion.php">
          <button type="button" id ="i" class="btn btn-primary me-3 btn-lg"style="font-size: 1.2vw;
          font-family: 'Montserrat', sans-serif;font-weight: 700; padding: 12px 24px;">
            <!-- <?=$_SESSION['sess_user'];?> -->
			Cerrar sesión
          </button>
        </a>
      </div>
    </div>
  </div>
</nav>
<script type="text/javascript" src="../js/mdb.min.js"></script>
<script type="text/javascript"></script>