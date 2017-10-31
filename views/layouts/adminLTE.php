<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\adminLTEAsset;

adminLTEAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html lang="<?= Yii::$app->language ?>">
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php $this->beginBody() ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <?php /* LOGOMARCA */ ?>
        <a href="<?= Yii::$app->homeUrl?>" class="logo">
            <?php /* mini logo for sidebar mini 50x50 pixels */ ?>
            <span class="logo-mini"><b>A</b>LT</span>
            <span class="logo-lg"><?= Yii::$app->params['nomeEmpresa'];?></span>
        </a>
        <?php /* NAV DO TOPO (LOGIN,NOTIFICAÇÕES..) */ ?>
        <?php
        if(!Yii::$app->user->isGuest) {
            echo $this->render('nav_topo');
        }
        ?>
    </header>

    <?php /* MENU DE NAVEGAÇÃO ESQUERDO */ ?>
    <aside class="main-sidebar">
        <?php
        if(!Yii::$app->user->isGuest) {
            echo $this->render('menu_esquerdo');
        }?>
    </aside>


    <div class="content-wrapper">
        <?php /* TITULO E MENU DE NAVEGAÇÃO */ ?>
        <section class="content-header">
            <?=  Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]);?>
            <h1>
                <?= $this->params['breadcrumbs'][] = $this->title;?>
            </h1>
        </section>

        <?php /* CONTEÚDO DO SISTEMA */ ?>
        <section class="content container-fluid">
            <?= $content ?>
        </section>
    </div>

    <?php /* FOOTER */ ?>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <?= Yii::$app->params['nomeEmpresa'];?>
        </div>
        <strong>Copyright &copy; <?= date('Y');?> <a href="#"><?= Yii::$app->params['nomeEmpresa'];?></a>.</strong> Todos os direitos reservados.
    </footer>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<?php $this->endBody() ?>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
<?php $this->endPage() ?>

<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();

       /* $('#datepicker').datepicker({
            autoclose: true
        });
        $('.select2').select2();*/
    } );
</script>
