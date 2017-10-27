<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = $tituloFormulario;
?>
<div class="site-login">
    <div class="col-md-6 col-md-offset-3">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(['id' => 'login-alterar-senha','action'=>\yii\helpers\Url::toRoute('resgatar/salvar-senha')]);?>

        <div class="form-group">
            <?= $form->field($usuario,'email')->textInput(['autofocus' => true, 'placeholder'=>'Email de acesso'])?>
        </div>

        <div class="form-group">
            <?= $form->field($usuario,'user_password')->passwordInput(['placeholder'=>'Nova senha'])?>

        </div>

        <div class="form-group">
            <?= $form->field($usuario,'codigo')->hiddenInput(['value'=>Yii::$app->request->get('codigo')])?>
            <?= Html::submitButton('Recuperar senha', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
            <?php
            //mensagem de retorno
            foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
            } ?>
    </div>
</div>


<?php //echo "<pre>"; print_r($usuario);?>