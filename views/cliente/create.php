<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClienteModel */

$this->title = $titleForm;
$this->params['breadcrumbs'][] = ['label' => 'Cliente', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-model-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
