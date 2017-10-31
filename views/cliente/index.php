<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientePesquisa */
/* @var $dataProvider yii\data\ActiveDataProvider */
/*
 * CARREGA A VIEW PADRÃO DE LISTAGEM
 * */

$this->title = 'Cliente';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="cliente-model-index">
        <h1><?php //echo Html::encode($this->title) ?></h1>
        <p><?= Html::a('Novo', ['create'], ['class' => 'btn btn-success']) ?></p>
    </div>
<?php
    /*echo $this->render('/listagem/listagem-padrao', [
        'arrayDados' => $arrayDados,
        'arraylabels' => $arraylabels,
    ]);*/
?>

<div class="col-md-12">
    <div class="row">
        <div class="box">
            <div class="box-body">
                <table id="example" class="table dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome:</th>
                        <th>Telefone:</th>
                        <th>E-mail:</th>
                        <th class="text-right"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($arrayDados as $dados): ?>
                        <tr>
                            <th scope="row"><?= $dados->id; ?></th>
                            <td><?= $dados->nome; ?></td>
                            <td><?= $dados->telefone; ?></td>
                            <td><?= $dados->email; ?></td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <a href="<?= Url::toRoute(["cliente/view/",'id'=>$dados->id]) ?>" title="Visualizar"
                                       alt="Visualizar" class="btn btn-default"><i class="fa fa-folder-open"></i></a>

                                    <a href="<?= Url::toRoute(["cliente/update/",'id'=>$dados->id]) ?>" title="Editar"
                                       alt="Editar" class="btn btn-default"><i class="fa fa-edit"></i></a>

                                    <a href="<?= Url::toRoute(["cliente/delete/",'id'=>$dados->id]) ?>" title="Deletar"
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
