<?php

use app\assets\AppAsset;
use app\models\ClienteModel;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;



/* @var $this View */
/* @var $model ClienteModel */
/* @var $form ActiveForm */

/* CARREGA O JS CONTROLE DO CLIENTE */
$this->registerJsFile('@web/jsc/js_controller.js',['depends'=>AppAsset::className()]);
?>

<div class="cliente-model-form">
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form'
            ,'name'=>'cadForm'
        ],
    ]); ?>
    <div class="col-md-12">
        <?= $form->field($model, 'nome')->textInput(['maxlength' => true,'placeholder'=>'Preencher campo com nome completo.']) ?>
    </div>
    <div class="col-md-8">
    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder'=>'Informe um email válido']) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'telefone')->textInput(['maxlength' => true])->widget(MaskedInput::className(),['mask'=>'(99) 9.9999-9999'])?>
    </div>
    <div class="form-group col-md-12">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <div class="col-md-6 aviso"> </div>
    <?php ActiveForm::end(); ?>
</div>
