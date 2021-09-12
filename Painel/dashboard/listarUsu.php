<?php 
include("../includes/header.php"); 
$dashboard = new Usuarios();
$resultado = $dashboard->Listar();
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $deletar = $dashboard->Deletar($id);
    }
?>

  <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Usuarios cadastrados: </h1>
        </div>

        <div class="row">
           
        <table class="table table-light">
                <thead class="thead-light">
                    <?PHP foreach($resultado as $usu){  ?>
                    <tr><th>#<?php echo $usu['id']?></th><th><?php echo $usu['login']?></th><th><?php echo $usu['nome']?></th><th><a href="listarUsu.php?id=<?php echo $usu['id']?>">Deletar</a></th><th><a href="editUsu.php?id=<?php echo $usu['id']?>">Editar</a></th></tr>
                    <?PHP }           ?>
                </thead>
            </table>
        </div>
</div>