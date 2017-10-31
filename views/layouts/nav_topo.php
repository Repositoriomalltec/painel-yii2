<?php
use yii\helpers\Url;

/* Informações do topo da pág. */
$dir = Yii::getAlias('@web')."/files/";
$nomeUserLogado =Yii::$app->user->identity->user_nome ;
$imagemUserLogado =Yii::$app->user->identity->user_imagem;


?>
<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 4 messages</li>
                    <li>
                        <!-- inner menu: contains the messages -->
                        <ul class="menu">
                            <li><!-- start message -->
                                <a href="#">
                                    <div class="pull-left">
                                        <!-- User Image -->
                                        <img src="<?= $dir.$imagemUserLogado;?>" class="img-circle" alt="<?= $nomeUserLogado;?>">
                                    </div>
                                    <!-- Message title and timestamp -->
                                    <h4>
                                        Support Team
                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                    </h4>
                                    <!-- The message -->
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                            <!-- end message -->
                        </ul>
                        <!-- /.menu -->
                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 10 notifications</li>
                    <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
                            <li><!-- start notification -->
                                <a href="#">
                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                </a>
                            </li>
                            <!-- end notification -->
                        </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-flag-o"></i>
                    <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 9 tasks</li>
                    <li>
                        <!-- Inner menu: contains the tasks -->
                        <ul class="menu">
                            <li><!-- Task item -->
                                <a href="#">
                                    <!-- Task title and progress text -->
                                    <h3>
                                        Design some buttons
                                        <small class="pull-right">20%</small>
                                    </h3>
                                    <!-- The progress bar -->
                                    <div class="progress xs">
                                        <!-- Change the css width attribute to simulate progress -->
                                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end task item -->
                        </ul>
                    </li>
                    <li class="footer">
                        <a href="#">View all tasks</a>
                    </li>
                </ul>
            </li>

            <?php /* User Account Menu */  ?>
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?= $dir.$imagemUserLogado?>" class="user-image" alt="<?= $nomeUserLogado;?>">
                    <span class="hidden-xs"><?= $nomeUserLogado;?></span>
                </a>
                <ul class="dropdown-menu">
                    <?php /* The user image in the menu */?>
                    <li class="user-header">
                        <img src="<?= $dir.$imagemUserLogado?>" class="img-circle" alt="<?= $nomeUserLogado;?>">
                        <p>
                            <?=  $nomeUserLogado;?> - Web Developer
                            <small>Member since Nov. 2012</small>
                        </p>
                    </li>
                    <?php /* Menu do perfil */?>
                    <li class="user-body hidden ">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="<?= Url::toRoute(['usuario/update', 'id' => Yii::$app->user->identity->id])?>" class="btn btn-default btn-flat">Perfil</a>
                        </div>
                        <div class="pull-right">
                            <a href="<?= Url::to(['site/logout'])?>" class="btn btn-default btn-flat">Sair</a>
                        </div>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>