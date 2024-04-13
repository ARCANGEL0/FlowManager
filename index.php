<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema || FlowManager</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <br>
      <form action="controllers/Login/LoginControl.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="loginUsuario" id="loginUsuario" placeholder="Usuário">
          <div class="input-group-append">
            <div class="input-group-text">

              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="loginSenha" id="loginSenha" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-12">
          <?php
                    if(isset($_SESSION['sem_autenticacao'])):
                    ?>
                    <div class="alert alert-danger">
                      ERRO: Usuário ou senha inválidos!
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['sem_autenticacao']);
?>
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
<br>
 
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->






<!--  SCRIPTS QUE SERÃO UTILIZADOS DEPOIS. NÃO APAGUE. -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.js"></script>

</body>
</html>
