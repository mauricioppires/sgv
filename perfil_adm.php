<?php

session_start();
error_reporting(0);
include('includes/conexao.php');
if (strlen($_SESSION['acessoid']==0)) {
    header('location:logout.php');
} else {
    if(isset($_POST['submit'])) {
        $adminid=$_SESSION['acessoid'];
        $ANome=$_POST['nomeadmin'];
        $FoneNum=$_POST['numerotelefone'];
        $email=$_POST['email'];
        $query=mysqli_query($con, "update tblAdmin set NomeAdmin='$ANome', Telefone='$FoneNum', Email= '$email' where ID='$adminid'");
        if ($query) {
            $msg="O perfil do administrador foi atualizado.";
        } else {
            $msg="Algo deu errado. Por favor, tente novamente.";
        }
    }
    $pagina = 'Perfil do administrador';
    $titulo = 'Atualizar Perfil do administrador';

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
                                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                <p style="font-size:16px; color:red" align="center"> 
                                                    <?php if($msg){
                                                        echo $msg;
                                                        }
                                                    ?>
                                                </p>
                                                <?php
                                                    $adminid=$_SESSION['acessoid'];
                                                    $ret=mysqli_query($con,"select * from tblAdmin where ID='$adminid'");
                                                    $cnt=1;
                                                    while ($row=mysqli_fetch_array($ret)) {
                                                ?>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Nome do administrador</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="nomeadmin" name="nomeadmin" value="<?php  echo $row['NomeAdmin'];?>" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="email-input" class=" form-control-label">e-mail</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="email" id="email" name="email" value="<?php  echo $row['Email'];?>" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="password-input" class="form-control-label">Telefone</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="numerotelefone" name="numerotelefone" class="form-control" maxlength="11" value="<?php  echo $row['Telefone'];?>" required="">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="textarea-input" class=" form-control-label">Nome do Usuário</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input name="nomeusuario" id="nomeusuario" rows="9" class="form-control" required="" readonly="" value="<?php  echo $row['NomeUsuario'];?>">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="password-input" class=" form-control-label">Data de registro</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="cadastrado" name="cadastrado"  value="<?php  echo $row['Cadastrado'];?>" class="form-control" required="" readonly="">
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <div class="card-footer">
                                                    <p style="text-align: center;">
                                                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Atualizar</button>
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
<?php }  ?>
