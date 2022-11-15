<?php

session_start();
error_reporting(0);
include('includes/conexao.php');
if (strlen($_SESSION['acessoid']==0)) {
    header('location:logout.php');
} else{
    if(isset($_POST['submit'])) {
        $visitante_id=$_SESSION['visitante_id'];
        $nome_visitante=$_POST['nome_visitante'];
        $num_fone=$_POST['telefone'];
        $endereco_visitante=$_POST['endereco'];
        $apartamento=$_POST['apartamento'];
        $andar=$_POST['andar'];
        $visitarquem=$_POST['visitarquem'];
        $motivodavisita=$_POST['motivodavisita'];
        $query=mysqli_query($con,"insert into tblVisitante(NomeVisitante,Telefone,Endereco,VisitarQuem,MotivoDaVisita,Apartamento,Andar) value('$nome_visitante','$num_fone','$endereco_visitante','$visitarquem','$motivodavisita','$apartamento','$andar')");
        if ($query) {
            $msg="Dados do visitante foi adicionado.";
        } else {
            $msg="Algo deu errado. Por favor, tente novamente.";
        }
    }
    $pagina = 'Formulário de visitante';
    $titulo = 'Adicionar Novo visitante';

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
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Nome do visitante</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="nome_visitante" name="nome_visitante" placeholder="Nome do visitante" class="form-control" required="true">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="password-input" class=" form-control-label">Telefone</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="telefone" name="telefone" placeholder="Telefone" class="form-control" maxlength="10" required="true">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="textarea-input" class=" form-control-label">Endereço</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea name="endereco" id="endereco" rows="9" placeholder="Digite o endereço do visitante..." class="form-control" required="true"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="password-input" class=" form-control-label">Número do Apartamento</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="apartamento" name="apartamento" placeholder="Número do Apartamento" class="form-control" required="true">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="password-input" class=" form-control-label">Andar</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="andar" name="andar" placeholder="Andar" class="form-control" required="true">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="password-input" class=" form-control-label">Quem encontrar</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="visitarquem" name="visitarquem" placeholder="Quem encontrar" class="form-control" required="true">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="password-input" class=" form-control-label">Motivo da visita</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="motivodavisita" name="motivodavisita" placeholder="Motivo da visita" class="form-control" required="true">
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <p style="text-align: center;"><button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Adicionar</button></p>
                                                </div>
                                            </form>
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
