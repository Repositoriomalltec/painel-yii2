<?php
use app\models\UsuarioPesquisa;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $searchModel UsuarioPesquisa */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Usuários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-model-index">
    <p>
        <?= Html::a('Novo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>


<div class="col-md-12">
    <div class="row">
        <div class="box">
            <div class="box-body">
                <table id="example" class="table dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuário:</th>
                        <th>Telefone:</th>
                        <th>E-mail:</th>

                        <th class="text-right"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($arrayDados as $dados): ?>
                        <tr>
                            <th scope="row">
                                <div class="pull-left">
                                    <img src="<?= Yii::getAlias('@web')."/files/".$dados->user_imagem;?>" class="img-circle" alt="<?= $dados->user_nome;?>" width="50">
                                </div>
                            </th>
                            <td><?= $dados->user_nome.' '.$dados->user_sobrenome; ?></td>
                            <td><?= $dados->user_telefone; ?></td>
                            <td><?= $dados->user_email; ?></td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <a href="<?= Url::toRoute(["usuario/view/",'id'=>$dados->id]) ?>" title="Visualizar"
                                       alt="Visualizar" class="btn btn-default"><i class="fa fa-folder-open"></i></a>

                                    <a href="<?= Url::toRoute(["usuario/update/",'id'=>$dados->id]) ?>" title="Editar"
                                       alt="Editar" class="btn btn-default"><i class="fa fa-edit"></i></a>

                                    <a href="<?= Url::toRoute(["usuario/delete/",'id'=>$dados->id]) ?>" title="Deletar"
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
