<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioPesquisa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_nome') ?>

    <?= $form->field($model, 'user_sobrenome') ?>

    <?= $form->field($model, 'user_telefone') ?>

    <?= $form->field($model, 'user_email') ?>

    <?php // echo $form->field($model, 'user_cpf') ?>

    <?php // echo $form->field($model, 'id_cidade') ?>

    <?php // echo $form->field($model, 'id_uf') ?>

    <?php // echo $form->field($model, 'user_imagem') ?>

    <?php // echo $form->field($model, 'user_password') ?>

    <?php // echo $form->field($model, 'user_codigo_recuperacao') ?>

    <?php // echo $form->field($model, 'user_nivel') ?>

    <?php // echo $form->field($model, 'user_qt_recuperacao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
