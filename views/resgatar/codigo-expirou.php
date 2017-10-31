<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="../../index2.html"><b><?= Yii::$app->params['nomeEmpresa']?></b></a>
    </div>

    <div class="lockscreen-item">
    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
        Seu código de recuperar dados experou!
    </div>
    <div class="text-center">
        <a href="<?= \yii\helpers\Url::toRoute('resgatar/recuperar-senha')?>">Clique aqui para recuperar senha.</a>
    </div>
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2014-<?= date('Y')?> <b><a href="<?= Yii::$app->homeUrl?>" class="text-black"><?= Yii::$app->params['nomeEmpresa']?></a></b><br>
        Todos os direitos reservados.
    </div>
</div>