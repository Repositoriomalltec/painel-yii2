<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CadastroCliente */

$this->title = 'Create Cadastro Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Cadastro Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cadastro-cliente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
