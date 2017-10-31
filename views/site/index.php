<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this View */
$this->title = Yii::$app->params['nomeEmpresa'];
?>

<?php
$consulta = Yii::$app->user->identity;
$nome_usuario = $consulta->user_nome . ' ' . $consulta->user_sobrenome;
?>
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <?PHP /* PEDIDOS */ ?>
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= $totalPedido ?></h3>
                    <p>Vendas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?= Url::toRoute(['pedido/index']) ?>" class="small-box-footer">Pedidos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <?PHP /* PRODUTOS */ ?>
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $totalProduto ?></h3>
                    <p>Total de produtos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?= Url::toRoute(['produto/index']) ?>" class="small-box-footer"> Produtos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <?PHP /* CLIENTES */ ?>
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?= $totalCliente ?></h3>
                    <p>Total de clientes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?= Url::toRoute(['cliente/index']) ?>" class="small-box-footer"> Clientes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?= $totalUsuario ?></h3>
                    <p>Usuários</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people-outline"></i>
                </div>
                <a href="<?= Url::toRoute(['usuario/index']) ?>" class="small-box-footer">Usuários do sistema <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>




<div class="col-md-12"><hr></div><!-- ############ ESPAÇO ENTRE OS BLOCOS ############ -->

<?php /* LISTA DE CLIENTE */?>
<div class="col-md-12">
    <div class="row">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Clientes</h3>
        </div>
        <!-- /.box-header -->
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
                <?php foreach ($arrayCliente as $clientes): ?>
                    <tr>
                        <th scope="row"><?= $clientes->id; ?></th>
                        <td><?= $clientes->nome; ?></td>
                        <td><?= $clientes->telefone; ?></td>
                        <td><?= $clientes->email; ?></td>
                        <td class="text-right">
                            <div class="btn-group">
                                <a href="<?= Url::toRoute(["cliente/view/",'id'=>$clientes->id]) ?>" title="Visualizar"
                                   alt="Visualizar" class="btn btn-default"><i class="fa fa-folder-open"></i></a>

                                <a href="<?= Url::toRoute(["cliente/update/",'id'=>$clientes->id]) ?>" title="Editar"
                                   alt="Editar" class="btn btn-default"><i class="fa fa-edit"></i></a>

                                <a href="<?= Url::toRoute(["cliente/delete/",'id'=>$clientes->id]) ?>" title="Deletar"
                                   alt="Deletar" class="btn btn-default" data-pjax="0" data-confirm="Deseja deletar o item ?"
                                   data-method="post"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    </div>
</div>



        
        

