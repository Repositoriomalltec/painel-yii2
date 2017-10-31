<?php
/* @var $this yii\web\View */
/* @var $model app\models\ProdutoModel */

$this->title = $titleForm;
$this->params['breadcrumbs'][] = ['label' => 'Produto', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-model-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
