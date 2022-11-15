<?php

session_start();
error_reporting(0);
include('includes/conexao.php');
error_reporting(0);
if (strlen($_SESSION['acessoid']==0)) {
    header('location:logout.php');
} else{ 
    $pagina = 'Dashboard';
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
                            <?php
                                //Visitantes Hoje
                                $query=mysqli_query($con,"select ID from tblVisitante where date(Entrada)=CURDATE();");
                                $contagem_visitantes_hoje=mysqli_num_rows($query);
                            ?>
                            <div class="row m-t-25">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php echo $contagem_visitantes_hoje; ?></h2>
                                                    <span>Visitantes de hoje</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    //Visitantes Ontem
                                    $query1=mysqli_query($con,"select ID from tblVisitante where date(Entrada)=CURDATE()-1;");
                                    $contagem_visitantes_ontem=mysqli_num_rows($query1);
                                ?>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c2">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php echo $contagem_visitantes_ontem; ?></h2>
                                                    <span>Visitantes de ontem</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    //Visitantes - Ultimos Sete Dias
                                    $query2=mysqli_query($con,"select ID from tblVisitante where date(Entrada)>=(DATE(NOW()) - INTERVAL 7 DAY);");
                                    $contagem_visitantes_semana=mysqli_num_rows($query2);
                                ?>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c3">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php echo $contagem_visitantes_semana; ?></h2>
                                                    <span>Últimos 7 dias</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    //Total de Visitantes
                                    $query3=mysqli_query($con,"select ID from tblVisitante");
                                    $contagem_total_visitantes=mysqli_num_rows($query3);
                                ?>                       
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c4">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php echo $contagem_total_visitantes; ?></h2>
                                                    <span>Total até a data</span>
                                                </div>
                                            </div>
                                        </div>
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
<?php } ?>
