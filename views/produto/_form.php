<?php

use kartik\money\MaskMoney;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\ProdutoModel */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile('@web/jsc/js_controller.js',['depends'=>\app\assets\AppAsset::className()]);
?>

<div class="box box-<?= yii::$app->params['cor_borda_formulario'] ?>">
    <div class="box-body">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form','name'=>'cadForm'],
    ]); ?>
    <div class="col-md-8">
        <?= $form->field($model, 'nome')->textInput(['class' => 'form-control input-lg', 'maxlength' => true, 'placeholder'=>'Título do produto']) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'preco')->widget(MaskMoney::className(), [
            'pluginOptions' => [
                'prefix' => 'R$ ',
            ],
            'options' => [
                'class' => 'form-control input-lg',
                'placeholder' => 'Prencha o campo com o valor',
            ],
        ]);
        ?>
    </div>
    <div class="col-md-12">
        <?= $form->field($model, 'descricao')->textarea(['class' => 'form-control input-lg','rows' => 6, 'placeholder'=>'Descrição do produto']) ?>
    </div>

    <div class="form-group col-md-12">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <div class="col-md-6 aviso"> </div>
    <?php //echo Html::img('@web/image/loading.gif', ['alt'=>'aguarde...','class'=>'loading']); ?>
    <?php ActiveForm::end(); ?>
</div>
</div>
