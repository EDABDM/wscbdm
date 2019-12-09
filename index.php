<?php
  //NECESARIO PARA OBTENER LAS VARIABLES AUTH_USER Y AUTH_PW EN PHP_CGI
  if(isset($_SERVER['REDIRECT_HTTP_AUTH']) && !empty($_SERVER['REDIRECT_HTTP_AUTH'])){
   list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) =
   explode(':' , base64_decode(substr($_SERVER['REDIRECT_HTTP_AUTH'], 6)));
  }

  //SI NO EXISTEN DATOS EN CABECERA TE LLEVA login()
  if (!isset($_SERVER['PHP_AUTH_USER'])){ login(); }
  else {
    //COMPROBACIÓN DE USUARIO EN LA BASE DE DATOS
    include("require/jsonws.php");
    if($_SESSION['id']!=null){
      //REEDIRECCIÓN AL WEB SERVICE
      session_start();
      $_SESSION['user'] = $_SERVER['PHP_AUTH_USER'];
      header("Location: datos.class.php");
    }
    else { login(); }
  }

  //LOGIN MANUAL SI NO EXISTEN DATOS EN CABECERA
  function login(){
    header('WWW-Authenticate: Basic realm="Login WSBDM"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Debe proporcionar un usuario y contraseña para acceder a esta página';
    exit;
  }


?>
