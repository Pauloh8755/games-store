<?php
/***********************************************************************************
    Objetivo: Arquivo para minipulação de cadastro dos usuarios
    Data: 31/10/2021
    Responsável: Paulo Henrique
************************************************************************************/
require_once("../../config/config.php");
require_once("../../bd/usuario/insert.php");
require_once("../../bd/usuario/update.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //recebendo inputs de usuarios
    $id = $_GET['id'];
    $nome = $_POST['txtNome'];
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];
    
    if($nome == null || $login == null || $senha == null){
        echo("<script>
                alert('" . ERRO_CAIXA_VAZIA . "') 
                window.history.back()
            </script>");
    }
    else{
        $usuario = array(
        "id_usuario" => $id,
        "nome" => $nome,
        "login" => $login,
        "senha" => $senha
        );
    
        if(strtoupper($_GET['modo']) == "CADASTRAR"){
            if(insertUsuario($usuario)){
                echo("<script>
                        alert('".SUCESSO_INSERIR."');
                        window.location.href='../../usuarios.php';
                    </script>");
            }
            else{
                echo("<script>
                        alert('".FALHA_INSERIR."');
                        window.history.back();
                    </script>");
            }
        }
        elseif(strtoupper($_GET['modo']) == "ATUALIZAR"){
            if(updateUsuario($usuario)){
                echo("<script>
                        alert('".SUCESSO_ATUALIZAR."');
                        window.location.href='../../usuarios.php';
                    </script>");
            }
            else{
                echo("<script>
                        alert('".FALHA_ATUALIZAR."');
                        window.history.back();
                    </script>");
            }
        }
    }        
}
    
?>