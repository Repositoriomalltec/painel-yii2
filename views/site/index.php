<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
/* @var $this View */
$this->title = Yii::$app->params['nomeEmpresa'];
?>
<div class="container">    
    <div class="row">         
        <?php 
        $consulta = Yii::$app->user->identity;
        $nome_usuario = $consulta->user_nome.' '.$consulta->user_sobrenome;         
        ?>
        
        <div class="page-header">
            <h4>Seja bem vindo(a) <small><b><?=$nome_usuario?></b></small></h4>
        </div>
        <div class="col-xs-3 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive img-circle" alt="Total de produto" width="100" height="100">
              <a href="<?=Url::toRoute(['produto/index'])?>"><h5>Produtos <span class="text-muted"> <?=$totalProduto?></span></h5></a>              
        </div>
        <div class="col-xs-3 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive img-circle" alt="Total de produto" width="100" height="100">
              <a href="<?=Url::toRoute(['cliente/index'])?>"><h5>Clientes <span class="text-muted"> <?=$totalCliente?></span></h5></a>              
        </div>
        <div class="col-xs-3 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive img-circle" alt="Total de produto" width="100" height="100">
              <a href="<?=Url::toRoute(['pedido/index'])?>"><h5>Pedidos <span class="text-muted"> <?=$totalPedido?></span></h5></a>              
        </div>
        <div class="col-xs-3 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive img-circle" alt="Total de produto" width="100" height="100">
              <a href="<?=Url::toRoute(['usuario/index'])?>"><h5>Usuários <span class="text-muted"> <?=$totalUsuario?></span></h5></a>              
        </div>
        
        <div class="col-xs-12 col-sm-12 placeholder"><!--lista de clientes-->
            <div class="page-header">
                <table class="table table-condensed"> 
                    <caption><b>Lista de clientes<b></caption> 
                    <thead> 
                        <tr> 
                            <td>#</td> 
                            <td>Nome</td> 
                            <td>telefone</td> 
                            <td>E-mail</td> 
                        </tr> 
                    </thead> 
                    <tbody>
                        <?php foreach ($arrayCliente as $pedidos): ?>
                        <tr> 
                            <th scope="row"><?= $pedidos->id;?></th> 
                            <td><?= $pedidos->nome;?></td> 
                            <td><?= $pedidos->telefone;?></td> 
                            <td><?= $pedidos->email;?></td> 
                        </tr>
                        <?php  endforeach; ?>
                    </tbody> 
                </table>
                <?= LinkPager::widget(['pagination'=>$paginationCliente]);?>
            </div>
        </div><!--lista de clientes-->
        
        
        
    </div>
</div>

