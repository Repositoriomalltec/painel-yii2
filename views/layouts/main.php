<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link rel="apple-touch-icon" sizes="57x57" href="<?= Yii::getAlias('@web/image/favicon');?>/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= Yii::getAlias('@web/image/favicon');?>/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= Yii::getAlias('@web/image/favicon');?>/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= Yii::getAlias('@web/image/favicon');?>/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= Yii::getAlias('@web/image/favicon');?>/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= Yii::getAlias('@web/image/favicon');?>/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= Yii::getAlias('@web/image/favicon');?>/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= Yii::getAlias('@web/image/favicon');?>/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= Yii::getAlias('@web/image/favicon');?>/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?= Yii::getAlias('@web/image/favicon');?>/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= Yii::getAlias('@web/image/favicon');?>/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= Yii::getAlias('@web/image/favicon');?>/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= Yii::getAlias('@web/image/favicon');?>/favicon-16x16.png">
        <link rel="manifest" href="<?= Yii::getAlias('@web/image/favicon');?>/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= Yii::getAlias('@web/image/favicon');?>/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->params['nomeEmpresa'],
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            $itens = [];
            $nomeUserLogado = Yii::$app->user->identity;

            if (Yii::$app->user->isGuest) {
                $itens[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $itens[] = ['label' => 'Produto', 'url' => ['/produto/index']];
                $itens[] = ['label' => 'Cliente', 'url' => ['/cliente/index']];
                $itens[] = ['label' => 'Pedido', 'url' => ['/pedido/index']];
                $itens[] = ['label' => 'Usuários', 'url' => ['/usuario/index']];

                //Endereço dos files
                $fotoPath = Yii::getAlias('@web/files/');

                //FOTO E NOME DO USUÁRIO
                $fotoUser = '<img src="'.$fotoPath.$nomeUserLogado->user_imagem.'" class="img-circle" height="35" width="42"> '.$nomeUserLogado->user_nome;

                $itens[] = '<li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> '.$fotoUser.'
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="'.Url::toRoute(['usuario/update', 'id' => $nomeUserLogado->id]).'"> <i class="glyphicon glyphicon-cog"></i> Configurações</a></li>
                                    <li><a href="'.Url::to(['site/logout']).'"><i class="glyphicon glyphicon-log-out"></i> Sair</a></li>
                                </ul>
                          </li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $itens,
            ]);
            NavBar::end();
            ?>
            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; <?php  $empresa = isset(Yii::$app->params['nomeEmpresa']) ? Yii::$app->params['nomeEmpresa'] : 'Empresa JKT'; echo $empresa;?> <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
