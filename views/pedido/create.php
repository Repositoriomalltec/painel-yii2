<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PedidoModel */

$this->title = $tituloDoForm;
$this->params['breadcrumbs'][] = ['label' => 'Pedido', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'produto'=>$produto
    ]) ?>

</div>
