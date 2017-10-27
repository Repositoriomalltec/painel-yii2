<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientePesquisa */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cliente';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Novo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'nome',
            'email:email',
            'telefone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
