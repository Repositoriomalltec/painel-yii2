<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $idtb_cliente
 * @property string $nome_completo
 * @property string $razao_social
 * @property string $CPF
 * @property string $CNPJ
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_completo', 'razao_social'], 'string', 'max' => 80],
            [['CPF', 'CNPJ'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtb_cliente' => 'Idtb Cliente',
            'nome_completo' => 'Nome Completo',
            'razao_social' => 'Razao Social',
            'CPF' => 'Cpf',
            'CNPJ' => 'Cnpj',
        ];
    }
}
