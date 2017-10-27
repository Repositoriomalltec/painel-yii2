<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Área administrativa';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="col-md-6 col-md-offset-3">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(['id' => 'login-form']);?>
            <div class="form-group"> 
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder'=>'Informe email de acesso']) ?>
            </div>

            <div class="form-group"> 
                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Informe senha de acesso']) ?>
            </div>

            <div class="form-group"> 
                <?= $form->field($model, 'rememberMe')->checkbox()?>
            </div>

            <div class="form-group">
                <a href="<?= \yii\helpers\Url::toRoute('resgatar/recuperar-senha',false,false);?>"> Recuperar senha</a>
            </div>

            <div class="form-group">            
            <?= Html::submitButton('Acessar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>           
            </div>
        <?php ActiveForm::end(); ?>
    </div>    
</div>
