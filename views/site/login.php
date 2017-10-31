<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Área administrativa';
//$this->params['breadcrumbs'][] = $this->title;
?>

<p class="login-box-msg">Informe os dados para acessar o sistema</p>
<?php $form = ActiveForm::begin(['id' => 'login-form']);?>
    <div class="form-group has-feedback">
        <?= $form->field($model, 'username', [
            'template' => '
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        {input}
                    </div>
                    {error}',
            'inputOptions' => [
                'placeholder' => 'Informe email de acesso',
                'class' => 'form-control',
                'autofocus' => 'autofocus',
            ]])->input('email')
        ?>
    </div>
    <div class="form-group has-feedback">
        <?= $form->field($model, 'password', [
            'template' => '
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key emerald"></i></span>
                            {input}
                        </div>
                        {error}',
            'inputOptions' => [
                'placeholder' => 'Informe senha de acesso',
                'class' => 'form-control',
            ]])->input('password')
        ?>
    </div>

    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                    <?= $form->field($model, 'rememberMe')->checkbox()?>
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <?= Html::submitButton('Acessar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
        </div>
        <!-- /.col -->
    </div>
<?php ActiveForm::end(); ?>

<div class="social-auth-links text-center hidden">
    <p>- OR -</p>
    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
</div>
<!-- /.social-auth-links -->

<a href="<?= \yii\helpers\Url::toRoute('resgatar/recuperar-senha',false,false);?>">Recuperar senha</a><br>
<a href="register.html" class="text-center hidden">Register a new membership</a>