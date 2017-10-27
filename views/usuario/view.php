<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioModel */

$this->title = $model->user_nome.' '.$model->user_sobrenome;
$this->params['breadcrumbs'][] = ['label' => 'Detalhes do usuário', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_nome',
            'user_sobrenome',
            'user_telefone',
            'user_email:email',
            'user_cpf',
            'id_cidade',
            'id_uf',
            'user_imagem',
            //'user_password',
            //'user_codigo_recuperacao',
            'user_nivel',
            'user_qt_recuperacao',
        ],
    ]) ?>

</div>
