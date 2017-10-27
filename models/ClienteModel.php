<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $nome
 * @property string $email
 * @property string $telefone
 */
class ClienteModel extends \yii\db\ActiveRecord
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
            [['nome','email','telefone'], 'required'],
            [['nome','email'], 'string', 'max' => 120],
            [['email'], 'email'],
            [['telefone'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome completo',
            'email' => 'Email',
            'telefone' => 'Telefone',
        ];
    }
}
