<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioModel */

$this->title = $model->user_nome.' '.$model->user_sobrenome;
$this->params['breadcrumbs'][] = ['label' => 'Detalhes do usuário', 'url' => ['index']];
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
                //'id',
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
</div>
