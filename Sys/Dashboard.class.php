<?php
    class Usuarios{
        
        public function Unico($id){
            $this->id = $id;
            global $pdo;
            $sql = "SELECT * FROM users WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("id",$this->id);
            $sql->execute();
            return $sql->fetch(
            );
        }
        public function Listar(){
            global $pdo;
            $sql = "SELECT * FROM users";
            $sql = $pdo->prepare($sql);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function Cadastrar($usuario,$senha,$nome){
            $this->usuario = $usuario;
            $this->senha = $senha;
            $this->nome = $nome;
            $crypt = md5($this->senha);

            global $pdo;
            $sql = "INSERT INTO users(login,password,nome) VALUES (:usuario,:senha,:nome)";
            $sql = $pdo->prepare("$sql");
            $sql->bindValue("usuario",$this->usuario);
            $sql->bindValue("senha", $crypt);
            $sql->bindValue("nome", $this->nome);
            $sql->execute();
             if($sql){
                echo '  <div class="alert alert-success" role="alert">
                CADASTRADO COM SUCESSO!
               </div>';
             } else {
               echo '<div class="alert alert-danger" role="alert">
                      ERRO AO CADASTRAR!
                    </div>';
             }
        }

        public function Editar($usuario,$nome,$id){
            global $pdo;
            $this->usuario = $usuario;
            $this->nome = $nome;
            $this->id = $id;

            $sql = "UPDATE users SET login = :usuario, nome = :nome WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("usuario",$this->usuario);
            $sql->bindValue("nome",$this->nome);
            $sql->bindValue("id",$this->id);
            $sql->execute();
            if($sql){
                echo '  <div class="alert alert-success" role="alert">
                EDITADO COM SUCESSO!
               </div>';
             } else {
               echo '<div class="alert alert-danger" role="alert">
                      ERRO AO EDITAR!
                    </div>';
             }
        }

        public function Deletar($id){
            global $pdo;
            $this->id = $id;
            $sql = "DELETE FROM users WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("id", $this->id);
            $sql->execute();

            if($sql){
                echo "<script>alert('Deletado com sucesso!'); </script>";
            } else {
                echo "<script>alert('Erro ao deletar!!'); </script>";
            }

        }
    }

?>