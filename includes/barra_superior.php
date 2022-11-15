

        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header" name="search" action="pesquisar_visitante.php" method="post">
                            <input class="au-input au-input--xl" type="text" name="searchdata" id="searchdata" placeholder="Pesquise por nome ou telefone ..." />
                            <button class="au-btn--submit" type="submit" name="search">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                        <div class="header-button">
                            <div class="noti-wrap">
                                <?php
                                    $adminid=$_SESSION['acessoid'];
                                    $ret=mysqli_query($con,"select NomeAdmin from tblAdmin where ID='$adminid'");
                                    $row=mysqli_fetch_array($ret);
                                    $nome=$row['NomeAdmin'];
                                ?>
                            </div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="images/icon/avatar-01.jpg" alt="" />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="perfil_adm.php"><?php echo $nome; ?></a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#"><img src="images/icon/avatar-01.jpg" alt="Administrador" /></a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name"><a href="#"><?php echo $nome; ?></a></h5>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="perfil_adm.php"><i class="zmdi zmdi-account"></i>Perfil do Administrador</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="mudar_senha.php"><i class="zmdi zmdi-settings"></i>Mudança de Senha</a>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="logout.php"><i class="zmdi zmdi-power"></i>Sair</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

