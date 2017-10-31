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
$this->registerJsFile('@web/jsc/js_controller.js', ['depends' => AppAsset::className()]);
?>

<div class="box box-<?= yii::$app->params['cor_borda_formulario'] ?>">
    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'form'
                , 'name' => 'cadForm'
            ],
        ]); ?>
        <div class="col-md-12">
            <?= $form->field($model, 'nome')->textInput(['class' => 'form-control input-lg', 'maxlength' => true, 'placeholder' => 'Preencher campo com nome completo.']) ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'email')->textInput(['class' => 'form-control input-lg', 'maxlength' => true, 'placeholder' => 'Informe um email válido']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'telefone')->widget(MaskedInput::className(),
                [
                    'mask' => '(99) 9.9999-9999',
                    'options' => [
                        'class' => 'form-control input-lg',
                        'placeholder' => 'Preencha o campo telefonico',
                    ]
                ]) ?>
        </div>
        <div class="form-group col-md-12">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <div class="col-md-6 aviso"></div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
