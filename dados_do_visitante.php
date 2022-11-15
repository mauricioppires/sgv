<?php

session_start();
error_reporting(0);
include('includes/conexao.php');
if (strlen($_SESSION['acessoid']==0)) {
    header('location:logout.php');
} else{
    if(isset($_POST['submit'])) {
        $eid=$_GET['editar_id'];
        $observacao=$_POST['observacao'];
        $query=mysqli_query($con,"update tblVisitante set Observacao='$observacao' where  ID='$eid'");
        if ($query) {
            $msg="A observação do visitante foi atualizada.";
        } else {
            $msg="Algo deu errado. Por favor, tente novamente";
        }
    }
    $pagina = 'Informações do visitante';
    $titulo = 'Informações do Visitante';

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
                                            <p style="font-size:16px; color:red" align="center">
                                                <?php 
                                                    if($msg) {
                                                        echo $msg;
                                                    }
                                                ?>
                                            </p>
                                            <?php
                                                $eid=$_GET['editar_id'];
                                                $ret=mysqli_query($con,"select * from  tblVisitante where ID='$eid'");
                                                $cnt=1;
                                                while ($row=mysqli_fetch_array($ret)) {
                                            ?>
                                            <table border="1" class="table table-bordered mg-b-0">
                                                <tr>
                                                    <th>Nome do Visitante</th>
                                                    <td><?php  echo $row['NomeVisitante'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Telefone</th>
                                                    <td><?php  echo $row['Telefone'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Endereço</th>
                                                    <td><?php  echo $row['Endereco'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Número do Apartamento</th>
                                                    <td><?php  echo $row['Apartamento'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Andar</th>
                                                    <td><?php  echo $row['Andar'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Quem encontrar</th>
                                                    <td><?php  echo $row['VisitarQuem'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Motivo da visita</th>
                                                    <td><?php  echo $row['MotivoDaVisita'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Hora de entrada de visitante</th>
                                                    <td><?php  echo $row['Entrada'];?></td>
                                                </tr>
                                                <?php if($row['Observacao']==""){ ?>
                                                <form method="post">
                                                    <tr>
                                                        <th>Observação :</th>
                                                        <td><textarea name="observacao" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
                                                    </tr>
                                                    <tr align="center">
                                                        <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">Atualizar</button></td>
                                                    </tr>
                                                </form>
                                                <?php } else { ?>
                                                <tr>
                                                    <th>Observação </th>
                                                    <td><?php echo $row['Observacao']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Hora da Saída</th>
                                                    <td><?php echo $row['Saida']; ?>  </td> 
                                                <?php } ?>
                                                </tr>
                                            </table>
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
<?php }  ?>
<?php }  ?>
