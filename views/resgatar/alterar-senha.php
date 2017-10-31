<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = $tituloFormulario;
?>
<p class="login-box-msg"><b>Alterar acesso: </b> Altere os dados de acesso.</p>
<?php $form = ActiveForm::begin(['id' => 'login-alterar-senha','action'=>\yii\helpers\Url::toRoute('resgatar/salvar-senha')]);?>
<div class="form-group has-feedback">
    <?= $form->field($usuario,'email')->textInput(['autofocus' => true, 'placeholder'=>'Email de acesso'])?>
</div>
<div class="form-group has-feedback">
    <?= $form->field($usuario,'user_password')->passwordInput(['placeholder'=>'Nova senha'])?>
</div>
<div class="row">
    <div class="col-xs-12">
        <?= $form->field($usuario,'codigo')->hiddenInput(['value'=>Yii::$app->request->get('codigo')])?>
        <?= Html::submitButton('Alterar dados de acesso ', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

<div class="social-auth-links text-center">
    <a href="<?php echo \yii\helpers\Url::toRoute('site/login')?>" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-unlock-alt"></i> Fazer login</a>
    <?php
    //mensagem de retorno
    foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
        echo '<div class="alert alert-' . $key . '">' . $message .
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>';
    } ?>
</div>