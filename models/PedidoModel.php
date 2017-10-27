<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $id
 * @property integer $id_produto
 * @property integer $id_cliente
 */
class PedidoModel extends \yii\db\ActiveRecord
{
    private $cliente;
    private $produto;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_produto', 'id_cliente'], 'integer'],
            [['cliente','produto'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_produto' => 'Produto',
            'id_cliente' => 'Id Cliente',
        ];
    }

    public function getCliente()
    {
        return $this->hasOne(ClienteModel::className(), ['id' => 'id_cliente']);
    }

    public function getProduto()
    {
        return $this->hasOne(ProdutoModel::className(), ['id' => 'id_produto']);
    }
}
