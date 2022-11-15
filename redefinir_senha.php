<?php

session_start();
error_reporting(0);
include('includes/conexao.php');
error_reporting(0);
if(isset($_POST['submit'])) {
    $fone=$_SESSION['fone'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);
    $query=mysqli_query($con,"update tblAdmin set Password='$password'  where  Email='$email' && Telefone='$fone' ");
    if($query) {
        echo "<script>alert('Senha alterada com sucesso');</script>";
        session_destroy();
    }
}
$pagina = 'Redefinir senha';
// $titulo = '';

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include_once('includes/pagina_info.php');?>
        <title><?php echo $pagina; ?></title>
        <?php include_once('includes/h_style.php');?>
        <script type="text/javascript">
            function checkpass() {
                if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value) {
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
            <div class="page-content--bge5">
                <div class="container">
                    <div class="login-wrap">
                        <div class="login-content">
                            <div class="login-logo">
                                <a href="index.php" style="font-size:24px;">Sistema de gerenciamento de visitantes</a>
                            </div>
                            <p style="font-size:16px; color:red" align="center">
                                <?php
                                    if($msg) {
                                        echo $msg;
                                    }
                                ?>
                            </p>
                            <h5 align="center">Redefinir sua senha</h5>
                            <hr>
                            <div class="login-form">
                                <form action="" method="post" name="changepassword" onsubmit="return checkpass();">
                                    <div class="form-group">
                                        <label>Nova senha</label>
                                        <input class="au-input au-input--full" type="password" required="" name="newpassword" placeholder="Nova senha">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirma sua senha</label>
                                        <input class="au-input au-input--full" type="password" name="confirmpassword" required="" placeholder="Confirma sua senha">
                                    </div>
                                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">Redefinir</button>
                                    <div class="social-login-content">
                                        <div class="login-checkbox">
                                            <label><a href="index.php">Entrar</a></label>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('includes/scripts_js.php');?>
    </body>
</html>
