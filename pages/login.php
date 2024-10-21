<?php
session_start();
if (isset($_SESSION['mensaje'])) {
    echo "<script>alert('{$_SESSION['mensaje']}');</script>";
    unset($_SESSION['mensaje']); // Limpia el mensaje después de mostrarlo
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SISINVENTARIO</title>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet">
  
  <style>
    input:focus {
      color: #fff;
    }

    input::placeholder {
      color: rgba(255, 255, 255, 0.5);
    }

    input {
      color: #fff;
    }
  </style>
</head>



<body class="bg-gray-200">
  <main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sistema de Inventario</h4>
                </div>
              </div>
              <div class="card-body">
              <form method="POST" action="../assets/controllers/login.php">
  <!-- Etiqueta Email afuera del input -->
  <div class="my-3">
  <div class="text-center my-4">
    <img src="../assets/img/img/imagen01.webp" alt="Logo" width="300"> <!-- Cambia la ruta y el tamaño según sea necesario -->
  </div>
    <label class="form-label" for="email">Email</label> <i class="fas fa-envelope"></i> <!-- Cambié el label a estar fuera del input -->
    <div class="input-group input-group-outline">
      <input id="email" type="email" name="email" class="form-control" required>
    </div>
  </div>
  
  <!-- Etiqueta Password afuera del input -->
  <div class="mb-3">
    <label class="form-label" for="password">Password</label> <i class="fas fa-lock"></i><!-- Cambié el label a estar fuera del input -->
    <div class="input-group input-group-outline">
      <input id="password" type="password" name="password" class="form-control" required>
    </div>
  </div>

  <div class="text-center">
    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Iniciar sesión</button>
  </div>
</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Core JS Files -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <!-- Control Center for Material Dashboard -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>
</html>
