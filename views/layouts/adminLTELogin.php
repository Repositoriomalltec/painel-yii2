<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
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
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?= Yii::$app->homeUrl?>"><?= Yii::$app->params['nomeEmpresa'];?></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <?php /* CONTEÚDO DA PÁGINA DE LOGIN */ ?>
            <?= $content ?>
    </div>
    <!-- /.login-box-body -->
</div>
<?php $this->endBody() ?>
<!-- /.login-box -->
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
