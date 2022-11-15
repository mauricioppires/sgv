<?php

session_start();
error_reporting(0);
include('includes/conexao.php');
if(isset($_POST['login'])) {
    $nome_admin=$_POST['nomeusuario'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tblAdmin where  NomeUsuario='$nome_admin' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
        $_SESSION['acessoid']=$ret['ID'];
        header('location:dashboard.php');
    } else {
        $msg="Dados inválidos.";
    }
}
$pagina = 'Login';
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
                                <a href="index.php" style="font-size:24px;">Sistema de Gerenciamento de Visitantes</a>
                            </div>
                            <p style="font-size:16px; color:red" align="center"> 
                                <?php 
                                    if($msg){ 
                                        echo $msg;
                                    }  
                                ?> 
                            </p>
                            <div class="login-form">
                                <form action="" method="post" name="login">
                                    <div class="form-group">
                                        <label>Nome do Usuário</label>
                                        <input class="au-input au-input--full" type="text" name="nomeusuario" placeholder="Nome do Usuario" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input class="au-input au-input--full" type="password" name="password" placeholder="Senha">
                                    </div>
                                    <div class="login-checkbox">
                                        <label>
                                            <a href="esqueceu_senha.php">Esqueceu a senha?</a>
                                        </label>
                                    </div>
                                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="login">entrar</button>
                                    <div class="social-login-content"></div>
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
