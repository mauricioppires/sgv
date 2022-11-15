<?php

session_start();
error_reporting(0);
include('includes/conexao.php');
error_reporting(0);
if (strlen($_SESSION['acessoid']==0)) {
    header('location:logout.php');
} else{
    if(isset($_POST['submit'])) {
    $adminid=$_SESSION['acessoid'];
    $cpassword=md5($_POST['senha_atual']);
    $nova_senha=md5($_POST['nova_senha']);
    $query=mysqli_query($con,"select ID from tblAdmin where ID='$adminid' and   Password='$cpassword'");
    $row=mysqli_fetch_array($query);
    if($row>0){
        $ret=mysqli_query($con,"update tblAdmin set Password='$nova_senha' where ID='$adminid'");
        $msg= "Sua senha foi alterada com sucesso"; 
    } else {
        $msg="Sua senha atual está errada";
    }
    $pagina = 'Mudar senha';
    $titulo = 'Mudar Senha do administrador';
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include_once('includes/pagina_info.php');?>
        <title><?php echo $pagina; ?></title>
        <?php include_once('includes/h_style.php');?>
        <script type="text/javascript">
            function checkpass() {
                if(document.changepassword.nova_senha.value!=document.changepassword.confirmpassword.value) {
                    alert('Os campos Nova senha e Confirmar senha não correspondem');
                    document.changepassword.confirmpassword.focus();
                    return false;
                }
                return true;
            }   
        </script>
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
                                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="changepassword" onsubmit="return checkpass();">
                                                <p style="font-size:16px; color:red" align="center">
                                                    <?php
                                                        if($msg){
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
                                                        <label for="text-input" class=" form-control-label">Senha atual</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="password" id="senha_atual" name="senha_atual" value="" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="email-input" class=" form-control-label">Nova senha</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="password" id="nova_senha" name="nova_senha" value="" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="password-input" class=" form-control-label">Confirmar senhar</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" maxlength="10" value="" required="">
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <div class="card-footer">
                                                    <p style="text-align: center;">
                                                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Mudar</button>
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
