<?php
use app\models\UsuarioPesquisa;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel UsuarioPesquisa */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Lista de usuários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-model-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'user_nome',
            'user_sobrenome',
            'user_telefone',
            'user_email:email',
            // 'user_cpf',
            // 'id_cidade',
            // 'id_uf',
            // 'user_imagem',
            // 'user_password',
            // 'user_codigo_recuperacao',
            // 'user_nivel',
            // 'user_qt_recuperacao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
