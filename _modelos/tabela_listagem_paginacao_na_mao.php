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