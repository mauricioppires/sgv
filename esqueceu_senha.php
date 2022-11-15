<?php

session_start();
error_reporting(0);
include('includes/conexao.php');
if(isset($_POST['submit'])) {
    $fone=$_POST['fone'];
    $email=$_POST['email'];
    $query=mysqli_query($con,"select ID from tblAdmin where  Email='$email' and Telefone='$fone' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0) {
        $_SESSION['fone']=$fone;
        $_SESSION['email']=$email;
        header('location:redefinir_senha.php');
    } else {
        $msg="Dados inválidos. Por favor, tente novamente.";
    }
}
$pagina = 'Esqueceu a senha';
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
                            <h5 align="center"> Recuperação de senha</h5>
                            <hr>
                            <div class="login-form">
                                <form action="" method="post" name="submit">
                                    <div class="form-group">
                                        <label>Endereço de e-mail</label>
                                        <input class="au-input au-input--full" type="email" name="email" placeholder="Endereço de e-mail" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input class="au-input au-input--full" type="text" name="fone" placeholder="Telefone">
                                    </div>
                                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">Redefinir</button>
                                    <div class="social-login-content">
                                        <div class="login-checkbox">
                                            <label>
                                                <a href="index.php">Entrar</a>
                                            </label>
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
