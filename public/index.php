<?php

    define('CLASS_DIR', '../src/');
    set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
    spl_autoload_register();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP OO</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

        .btn-group {
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Code OO</h1>
    <?php
        $conn = new \OC\Cliente\Database\ServicesDB();
        $dados = new \OC\Cliente\Database\Dados($conn->conexao());
        $cliente = new OC\Cliente\Cliente();

        $cliente1 = $cliente->setNome('Nome cliente33')->setEmail('email@cliente3.com')->setEndereco(array('Residencial' => 'residencial cliente 1', 'Cobranca' => 'cobranca cliente 1'))->setTipo('juridica')->setStar(4);
        $dados->persist($cliente1);

        $cliente2 = $cliente->setNome('Nome cliente4')->setEmail('email@cliente4.com')->setEndereco(array('Residencial' => 'residencial cliente 2'))->setTipo('fisico')->setStar(3);
        $dados->persist($cliente2);

        $dados->flush();

        $or = $dados->read();
        if(!isset($_GET['o'])){
            $or;
        }elseif($_GET['o'] == 'd'){
            arsort($or);
        }elseif($_GET['o'] == 'c'){
            asort($or);
        }
    ?>
    <div class="btn-group">
        <a href="?o=d" class="btn btn-lg btn-default">Decrescente</a>
        <a href="?o=c" class="btn btn-lg btn-default">Crescente</a>
    </div>
    <div class="clearfix">
        <div class="panel-group" id="accordion">
            <div class="row">
                <div class="col-md-6">
                    <?php foreach($or as $val): ?>
                        <?php if($val['tipo'] == "fisico"): ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#<?=$val['id']?>">
                                            <?=$val['nome']?>
                                            <?php
                                                for($i=0;$i < $val['star']; $i++):
                                            ?>
                                                <i class="glyphicon glyphicon-star btn-xs pull-right"></i>
                                            <?php
                                                endfor;
                                            ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="<?=$val['id']?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <h4><?=$val['email']?></h4>
                                        <h4>
                                            <?=$val['endereco']?></h4>
                                        <h4 class="alert alert-warning"><?=$val['tipo']?></h4>
                                    </div>
                                </div>
                            </div>

                    <?php
                        endif;
                    endforeach;
                    ?>
                    </div>
                    <div class="col-md-6">
                    <?php
                        foreach($or as $val):
                            if($val['tipo'] == "juridica"):
                    ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#<?=$val['id']?>">
                                        <?=$val['nome']?>
                                        <?php
                                        for($i=0;$i < $val['star']; $i++):
                                            ?>
                                            <i class="glyphicon glyphicon-star  btn-xs pull-right"></i>
                                        <?php
                                        endfor;
                                        ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="<?=$val['id']?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <h4><?=$val['email']?></h4>
                                    <h4>
                                        <?=$val['endereco']?>
                                    </h4>
                                    <h4 class="alert alert-warning"><?=$val['tipo']?></h4>
                                </div>
                            </div>
                        </div>

                    <?php
                            endif;
                        endforeach;
                    ?>
                    </div>
            </div>
        </div>

    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>