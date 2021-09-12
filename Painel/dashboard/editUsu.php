<?php
include("../includes/header.php"); 
    if(!empty($_GET['id']) && isset($_GET['id'])){
            $id = $_GET['id'];
            $dashboard = new Usuarios();
            $puxar = $dashboard->Unico($id);

            if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['usuario']) && !empty($_POST['usuario'])){
                $usuario = addslashes($_POST['usuario']);
                $nome = addslashes($_POST['nome']);
                $dashboard->Editar($usuario, $nome, $id);
    }
} 
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
 <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Editar: </h1>
        </div>
        <div class="row">
        <form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Nome</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nome" value="<?php echo $puxar['nome']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Usuario</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="usuario" value="<?php echo $puxar['login']; ?>">
  </div>
 
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
</div>