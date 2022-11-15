<?php

session_start();
error_reporting(0);
include('includes/conexao.php');
if (strlen($_SESSION['acessoid']==0)) {
    header('location:logout.php');
} else{
    $pagina = 'Relatórios';
    $titulo = 'Relatórios Entre datas';
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include_once('includes/pagina_info.php');?>
        <title><?php echo $pagina; ?></title>
        <?php include_once('includes/h_style.php');?>
    </head>
    <body class="animsition">
        <div class="page-wrapper">
            <?php include_once('includes/barra_lateral.php');?>
            <div class="page-container">
                <?php include_once('includes/barra_superior.php');?>
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <?php echo $titulo; ?>
                                        </div>
                                        <div class="card-body card-block">
                                            <form method="post" enctype="multipart/form-data" class="form-horizontal" name="rel_entre_datas" action="rel_entre_datas_detalhes.php">
                                                <p style="font-size:16px; color:red" align="center">
                                                    <?php 
                                                        if($msg){
                                                            echo $msg;
                                                        }
                                                    ?>
                                                </p>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Data inicial</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="date" id="data_de" name="data_de" value="" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="email-input" class=" form-control-label">Data final</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="date" id="data_ate" name="data_ate" value="" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <p style="text-align: center;">
                                                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Consultar</button>
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php include_once('includes/rodape.php');?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('includes/scripts_js.php');?>
    </body>
</html>
