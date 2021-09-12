<?php
  session_start();
  if(isset($_SESSION['logado']) == true){
    header("location: dashboard");
  }

  if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])){

    require "../Sys/Conexao.php";
    require "../Sys/Login.class.php";
    $u = new Login();

    $usuario = addslashes($_POST['usuario']);
    $senha =   addslashes($_POST['senha']);
    $u->Logar($usuario,$senha);
  }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Log in</title>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"><link rel="stylesheet" href="dashboard/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<form class="login" method="post" action="">
  <input type="text" placeholder="usuario" name="usuario">
  <input type="password" placeholder="senha" name="senha">
  <button>entrar</button>
</form>

<a href="https://github.com/woliveira1993" target="_blank">washington oliveira</a>
<!-- partial -->
  
</body>
</html>
