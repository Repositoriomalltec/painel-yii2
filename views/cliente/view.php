<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteModel */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Cliente', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-<?= yii::$app->params['cor_borda_formulario'] ?>">
    <div class="box-body">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Deseja deletar este item ?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
               // 'id',
                'nome',
                'email:email',
                'telefone',
            ],
        ]) ?>

    </div>
</div>
