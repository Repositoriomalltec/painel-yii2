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
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Please fill out the following fields to login:</p>

    <div class="col-md-6 col-md-offset-3">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'login-form',
                        // 'layout' => 'horizontal',
                        // 'fieldConfig' => [
                        //'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        //'labelOptions' => ['class' => 'col-lg-1 control-label'],
                        //],
        ]);
        ?>
        <div class="form-group"> 
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        </div>
        
        <div class="form-group"> 
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
        
        <div class="form-group"> 
            <?= $form->field($model, 'rememberMe')->checkbox([ // 'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ])
            ?>
        </div>

        <div class="form-group">            
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>           
        </div>

<?php ActiveForm::end(); ?>
    </div>

    <div class="col-lg-offset-1 hidden" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
</div>
