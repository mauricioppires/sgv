<?php

session_start();
error_reporting(0);
include('includes/conexao.php');
if (strlen($_SESSION['acessoid']==0)) {
    header('location:logout.php');
} else{
    $pagina = 'Pesquisa de visitantes';
    // s$titulo = '';

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
                                        <?php
                                            if(isset($_POST['search'])) {
                                                $sdata=$_POST['searchdata'];
                                        ?>
                                        <h4 align="center">Resultado da busca de "<?php echo $sdata;?>" </h4>
                                        <hr />
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nome do Visitante</th>
                                                        <th>Telefone</th>
                                                        <th>Quem encontrar</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </tr>
                                            </thead>
                                            <?php
                                                $ret=mysqli_query($con,"select *from tblVisitante where NomeVisitante like '$sdata%'||Telefone like '$sdata%'");
                                                $num=mysqli_num_rows($ret);
                                                if($num>0){
                                                    $cnt=1;
                                                    while ($row=mysqli_fetch_array($ret)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php  echo $row['NomeVisitante'];?></td>
                                                <td><?php  echo $row['Telefone'];?></td>
                                                <td><?php  echo $row['VisitarQuem'];?></td>
                                                <td><a href="dados_do_visitante.php?editar_id=<?php echo $row['ID'];?>"><i class="fa fa-edit fa-1x"></i></a></a></td>
                                            </tr>
                                            <?php
                                                        $cnt=$cnt+1;
                                                    }
                                                } else { 
                                            ?>
                                            <tr>
                                                <td colspan="8"> Nenhum registro encontrado nesta pesquisa</td>
                                            </tr>
                                            <?php } }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('includes/rodape.php');?>
        <?php include_once('includes/scripts_js.php');?>
    </body>
</html>
<?php }  ?>
