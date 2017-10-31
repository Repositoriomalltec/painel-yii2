<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = $tituloFormulario;
?>
<p class="login-box-msg"><b>Recuperar acesso: </b>Pesquise por CPF ou E-Mail</p>
<?php $form = ActiveForm::begin(['id' => 'login-recuperar-senha','action'=>\yii\helpers\Url::toRoute('resgatar/read')]);?>
<div class="form-group has-feedback">
    <?= $form->field($usuario,'user_cpf')->textInput(['autofocus' => true, 'placeholder'=>'Informe CPF de cadastro '])
        ->widget(MaskedInput::className(), ['mask' => '999-999-999-99'])?>
</div>
<div class="form-group has-feedback">
    <?= $form->field($usuario,'email')->textInput(['autofocus' => true, 'placeholder'=>'E-mail de cadastro'])?>
</div>
<div class="row">
    <div class="col-xs-12">
        <?= Html::submitButton('Recuperar dados de acesso', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
    </div>
    <!-- /.col -->
</div>
<?php ActiveForm::end(); ?>

<div class="social-auth-links text-center">
    <a href="<?php echo \yii\helpers\Url::toRoute('site/login')?>" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-unlock-alt"></i> Fazer login</a>
    <?php
    foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
        echo '<div class="alert alert-' . $key . '">' . $message .
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>';
    } ?>
</div>


