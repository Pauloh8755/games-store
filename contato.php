<?php
   require_once("controller/contato/listarContato.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" type="text/css" href="style/style.css">
        <link rel="stylesheet" type="text/css" href="style/deashboard.css">
        <title>CMS</title>
    </head>
    <body>
        <?php
            require_once("shapes/header.php");
        ?>
        <main class="display-row">
            <div id="container-contato">
                <h1>Usuários</h1>
                <div class="hr-title"> <br></div>
                <div id="scroll">
                    <table class="tbl-contato">
                        <tr class="linha">
                            <td class="coluna"><p>Nome</p></td>
                            <td class="coluna"><p>Email</p></td>
                            <td class="coluna"><p>Numero</p></td>
                        </tr>
                        <?php
                            $dadosContato = listarContato();
                            while($rsContato = mysqli_fetch_assoc($dadosContato)){
                        ?>
                        <tr class="linha">
                            <td class="coluna"><p><?=$rsContato['nome']?></p></td>
                            <td class="coluna"><p><?=$rsContato['email']?></p></td>
                            <td class="coluna"><p><?=$rsContato['numero']?></p></td>
                            <td>
                                <a href="controller/contato/excluirContato.php?id=<?=$rsContato['id_contato']?>">
                                    <img src="img/icons/delete.png" class="icons-bd">
                                </a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </table>
                </div>
            </div>
           
        </main>
        <?php
            require_once("shapes/footer.php");
        ?>
    </body>
</html>