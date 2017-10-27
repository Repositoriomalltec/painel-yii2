<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<h1><?=$nomeFormulario;?></h1>
<?php $form = ActiveForm::begin();   //ABERTURA ?>
<?= $form->field($model,'nome');?>
<?= $form->field($model,'sobrenome');?>
<?= $form->field($model,'apelido');?>
<?= $form->field($model,'telefone');?>
<?= $form->field($model,'email');?>
<?= Html::submitButton('Salvar',['class'=>'btn btn-primary']);?>
<?php ActiveForm::end();  //FECHAMENTO ?>


