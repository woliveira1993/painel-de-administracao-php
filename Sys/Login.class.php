<?php
    class Login{
        public function Logar($usuario,$senha){
            global $pdo;
            $crypt = md5($senha);
            $sql = "SELECT * FROM users WHERE login = :usuario AND password = :senha";
            $sql = $pdo->prepare($sql);
            $sql->bindValue('usuario', $usuario);
            $sql->bindValue('senha', $crypt);
            $sql->execute();

            if($sql->rowCount() > 0){
                session_start();
                $dados = $sql->fetch();
                $_SESSION['nome'] = $dados['nome'];
                $_SESSION['logado'] = true;
                header("location: dashboard");
            } else {
                header("location: index.php");
            }
        }
    }
?>