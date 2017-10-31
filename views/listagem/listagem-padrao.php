<?php
/*
  * LISTAGEM PADRÃO PARA TODAS TABELAS
  *  */
use yii\helpers\Url;
?>
<div class="col-md-12">
    <div class="row">
        <div class="box">
            <div class="box-body">
                <table id="example" class="table dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <?php
                        /* CARREGA OS LABELS */
                        foreach ($arraylabels as $keys=>$labels): ?>
                            <th><?= $labels;?></th>
                        <?php endforeach; ?>
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