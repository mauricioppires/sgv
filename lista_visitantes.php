<?php

session_start();
error_reporting(0);
include('includes/conexao.php');
if (strlen($_SESSION['acessoid']==0)) {
    header('location:logout.php');
} else{
    $pagina = 'Visitantes';
    // $titulo = '';

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
                                    <div class="table-responsive table--no-card m-b-30">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nome do visitante</th>
                                                        <th>Telefone</th>
                                                        <th>Quem encontrar</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </tr>
                                            </thead>
                                            <?php
                                                $ret=mysqli_query($con,"select * from tblVisitante order by Entrada desc");
                                                $cnt=1;
                                                while ($row=mysqli_fetch_array($ret)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php  echo $row['NomeVisitante'];?></td>
                                                <td><?php  echo $row['Telefone'];?></td>
                                                <td><?php  echo $row['VisitarQuem'];?></td>
                                                <td><a href="dados_do_visitante.php?editar_id=<?php echo $row['ID'];?>" title="Ver dados completos"><i class="fa fa-edit fa-1x"></i></a></td>
                                            </tr>
                                            <?php 
                                                    $cnt=$cnt+1;
                                                }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php include_once('includes/rodape.php');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('includes/scripts_js.php');?>
    </body>
</html>
<?php }  ?>
