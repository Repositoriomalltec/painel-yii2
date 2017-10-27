<?php

namespace app\models;

use Yii;
use yiibr\brvalidator\CpfValidator;

/**
 * This is the model class for table "{{%usuario}}".
 *
 * @property integer $id
 * @property string $user_nome
 * @property string $user_sobrenome
 * @property string $user_telefone
 * @property string $user_email
 * @property string $user_cpf
 * @property string $id_cidade
 * @property string $id_uf
 * @property string $user_imagem
 * @property string $user_password
 * @property string $user_codigo_recuperacao
 * @property string $user_nivel
 * @property integer $user_qt_recuperacao
 */
class UsuarioModel extends \yii\db\ActiveRecord
{
    /*
     * @var Variávil de Upload de arquivo
     * */
    public $arquivo;

    public $email;

    public $codigo;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%usuario}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arquivo'], 'file', 'extensions'=> 'jpg, png, gif'],
            [['user_cpf'], CpfValidator::className()],
            [['user_nome','user_email'], 'required'],
            [['user_password'], 'required', 'on'=>'cadastro'],
            [['user_nome', 'user_email', 'user_imagem', 'user_sobrenome'], 'string', 'max' => 120],
            [['user_password', 'user_nivel'], 'string', 'max' => 80],
            [['user_telefone', 'user_cpf'], 'string', 'max' => 20],
            [['id_cidade'], 'string', 'max' => 50],
            [['id_uf'], 'string', 'max' => 2],           
            [['email'], 'email'],
            [['codigo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_nome' => 'Nome',
            'user_sobrenome' => 'Sobrenome',
            'user_telefone' => 'Telefone',
            'user_email' => 'E-mail',
            'user_cpf' => 'CPF',
            'id_cidade' => 'Cidade',
            'id_uf' => 'UF',
            'user_imagem' => 'Foto de perfil',
            'arquivo' => 'Foto de perfil',
            'user_password' => 'Senha',
            'user_codigo_recuperacao' => 'User Codigo Recuperacao',
            'user_nivel' => 'Nível',
            'email' => 'E-mail de acesso',
            'codigo' => 'Codigo de recuperar senha',
            'user_qt_recuperacao' => 'User Qt Recuperacao',
        ];
    }
}
