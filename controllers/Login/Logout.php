<?php
// Este arquivo destroi a sessão atual e redireciona para o login
session_start();
  session_destroy();
    header("location: ../../index.php");
    exit();


 ?>
