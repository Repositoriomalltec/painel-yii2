<?php
use yii\helpers\Url;
?>
<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?=  Yii::getAlias('@web/files/').Yii::$app->user->identity->user_imagem;?>" class="img-circle" alt="<?=  Yii::$app->user->identity->user_nome;?>" width="160" height="160">
        </div>
        <div class="pull-left info">
            <p><?=  Yii::$app->user->identity->user_nome;?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
    </form>
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu de navegação</li>
        <li class="active hidden"><a href="#"><i class="fa fa-th-list"></i> <span>Link</span></a></li>
        <li><a href="<?= Url::toRoute('/produto/index')?>"><i class="fa fa-th-large"></i> <span>Produto</span></a></li>
        <li><a href="<?= Url::toRoute('/pedido/index')?>"><i class="fa fa-folder-open"></i> <span>Pedido</span></a></li>
        <li><a href="<?= Url::toRoute('/cliente/index')?>"><i class="fa fa-building"></i> <span>Cliente</span></a></li>
        <li><a href="<?= Url::toRoute('/usuario/index')?>"><i class="fa fa-user"></i> <span>Usuário</span></a></li>
        <li class="treeview hidden">
            <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#">Link in level 2</a></li>
                <li><a href="#">Link in level 2</a></li>
            </ul>
        </li>
    </ul>
</section>