<?php
    //importando arquivo do slim
    require_once("vendor/autoload.php");

    //instanciando slim
    $app = new \Slim\App();

    //end-point de jogos
    $app->get('/games', function($request, $response, $args){
        //import do arquivo de busca no banco
        require_once("../controller/produto/listarProduto.php");
        //import do arquivo para conversão em json
        require_once("../functions/json.php");

        //verificando parametros via queryString
        if(isset($request ->getQueryParams()['busca'])){
            $busca = (string) null;
            $busca = $request ->getQueryParams()['busca'];

            //transformando em json
            if($listaDados = listarProdutosPelaCategoria($busca)){
                if($arrayDados = criarArrayProduto($listaDados)){
                    $jsonProduto = criarJson($arrayDados);
                }
            }
        }
        else{
            //transformando em json
            if($listaDados = listarProdutos()){
                if($arrayDados = criarArrayProduto($listaDados)){
                    $jsonProduto = criarJson($arrayDados);
                }
            }
        }

        //validando e enviando conteúdo
        if($arrayDados){
            return $response    ->withStatus(200)
                                ->withHeader('Content-Type','application/json')
                                ->write($jsonProduto);
        }
        else{
            return $response    ->withStatus(204)
                                ->withHeader('Content-Type','application/json')
                                ->write('{"message":"Dados não encontrados no banco"}');
        }
    }); 

    //Carrega todos os endPoints para execução
    $app->run();
?>