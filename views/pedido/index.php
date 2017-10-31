<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoPesquisa */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-model-index">
    <p><?= Html::a('Novo', ['create'], ['class' => 'btn btn-success']) ?></p>


</div>

<div class="col-md-12">
    <div class="row">
        <div class="box">
            <div class="box-body">
                <table id="example" class="table dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>cliente:</th>
                        <th>Descrição:</th>

                        <th class="text-right"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($arrayDados as $dados): ?>
                        <tr>
                            <th scope="row"><?= $dados->id; ?></th>
                            <td><?= $dados->cliente->nome; ?></td>
                            <td><?=  StringHelper::truncate( Html::encode($dados->produto->nome),50); ?></td>

                            <td class="text-right">
                                <div class="btn-group">
                                    <a href="<?= Url::toRoute(["pedido/view/",'id'=>$dados->id]) ?>" title="Visualizar"
                                       alt="Visualizar" class="btn btn-default"><i class="fa fa-folder-open"></i></a>

                                    <a href="<?= Url::toRoute(["pedido/update/",'id'=>$dados->id]) ?>" title="Editar"
                                       alt="Editar" class="btn btn-default"><i class="fa fa-edit"></i></a>

                                    <a href="<?= Url::toRoute(["pedido/delete/",'id'=>$dados->id]) ?>" title="Deletar"
                                       alt="Deletar" class="btn btn-default" data-pjax="0" data-confirm="Deseja deletar o item ?"
                                       data-method="post"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
