<?php
/*****************************************************************
* Arquivo para receber categoria e chamar função de insert
* ass: Paulo Henrique
* 23/10/2021
*****************************************************************/
    //importando arquivo de config
    require_once("../../config/config.php");
    //importantando arquivo de interação com banco
    require_once("../../bd/categoria/inserir.php");
    //importando arquivo de update
    require_once("../../bd/categoria/update.php");
    
    //Verificando se o request encaminhado é == a POST através da função $_SERVER
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //recebendo txtCategoria via POST
        $categoria = $_POST['txtCategoria'];
        $id = $_GET['id'];
        
        if($categoria == null){
            echo("<script>
                    alert('" . ERRO_CAIXA_VAZIA . "') 
                    window.history.back()
                </script>");
        }
        else{
            if(strtoupper($_GET['modo']) == "SALVAR"){
                //chamando função de insert e validando
                if(insertCategoria($categoria)){
                    echo("<script>
                            alert('".SUCESSO_INSERIR."');
                            window.location.href = '../../categoria.php';
                        </script>");
                }
                else{
                    echo("<script>
                            alert('".FALHA_INSERIR."');
                            window.history.back();
                        </script>");      
                }
            }
            else {
                if(strtoupper($_GET['modo']) == "ATUALIZAR"){
                    if(updateCategoria($id,$categoria)){
                        echo("<script>
                                alert('".SUCESSO_ATUALIZAR."');
                                window.location.href = '../../categoria.php';
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
    }
?>