<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioModel */

$this->title = "Atualizar: ".' '.$model->user_nome.' '.$model->user_sobrenome;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_nome.' '.$model->user_sobrenome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-model-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
