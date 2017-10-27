<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = 'Recuperar senha';
?>
<div class="site-login">
    <div class="col-md-6 col-md-offset-3">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(['id' => 'login-recuperar-senha','action'=>\yii\helpers\Url::toRoute('resgatar/read')]);?>
        <div class="form-group">
            <?= $form->field($usuario,'user_cpf')->textInput(['autofocus' => true, 'placeholder'=>'Informe CPF de cadastro '])->widget(MaskedInput::className(), ['mask' => '999-999-999-99'])?>
        </div>

        <div class="form-group">
           Ou
        </div>

        <div class="form-group">
            <?= $form->field($usuario,'email')->textInput(['autofocus' => true, 'placeholder'=>'E-mail de cadastro'])?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Recuperar senha', ['class' => 'btn btn-warning', 'name' => 'login-button']) ?>
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