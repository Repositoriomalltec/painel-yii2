<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property integer $id
 * @property string $nome
 * @property string $descricao
 * @property string $preco
 */
class ProdutoModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome','descricao','preco'], 'required'],
            [['descricao'], 'string'],
            [['nome'], 'string', 'max' => 120],
            [['preco'], 'string', 'max' => 20],
            [['preco'], 'funcaoCampoVazio'],
        ];
    }

    public function funcaoCampoVazio($attribute, $params, $validator){
        if(empty($this->$attribute)):
            $this->addError($attribute, 'Informe um valor');
        endif;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome do produto',
            'preco' => 'Preço',
            'descricao' => 'Descricao',
        ];
    }
}
