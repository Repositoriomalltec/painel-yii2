<?php

use app\models\ClienteModel;
use app\models\ProdutoModel;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use conquer\select2\Select2Widget;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoModel */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile('@web/jsc/js_controller.js',['depends'=>\app\assets\AppAsset::className()]);
?>

<div class="pedido-model-form">
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form', 'name' => 'cadForm'],
    ]); ?>
    <div class="col-md-6">
        <?php

            //$listData = ArrayHelper::map($produto, 'id', 'nome');
            //$form->field($model, 'id_produto')->dropDownList($listData, ['prompt' => 'Selecione o produto'])

            echo $form->field($model, 'id_produto')->widget(Select2Widget::className(),
            ['items'=>ArrayHelper::map($produto, 'id', 'nome')]);

        ?>
    </div>
    <div class="col-md-6">
        <?php
            $cliente = ClienteModel::find()->all();
            //$listDataCliente = ArrayHelper::map($cliente, 'id', 'nome');
            //echo $form->field($model, 'id_cliente')->dropDownList($listDataCliente, ['prompt' => 'Selecione o cliente'])

            echo $form->field($model, 'id_cliente')->widget(Select2Widget::className(),
            ['items'=>ArrayHelper::map($cliente, 'id', 'nome')]);
        ?>
    </div>

    <div class="form-group col-md-12">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <div class="col-md-6 aviso"></div>
    <?php ActiveForm::end(); ?>

</div>
