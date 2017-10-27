<?php

namespace app\models;
use app\models\UsuarioModel;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $user_nome;
    public $user_sobrenome;
    public $user_telefone;
    public $user_cpf;
    public $id_cidade;
    public $id_uf;
    public $user_imagem;
    public $user_codigo_recuperacao;
    public $user_nivel;
    public $user_qt_recuperacao;
    //public $authKey;
   // public $accessToken;


    /**
     * @inheritdoc
     * verifica se esse id existe no banco
     */
    public static function findIdentity($id)
    { 
        $modelUsuario = UsuarioModel::find()->where(['id'=>$id])->one();
        if($modelUsuario):
            $user = self::getAttributesUserIdentity($modelUsuario);
            return new static($user);
        else:
            return null;
        endif;
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     * accessToken criar campo na tabela
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
       /* foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }*/

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $modelUsuario = UsuarioModel::find()->where(['user_email'=>$username])->one();
        if($modelUsuario):           
            $user = self::getAttributesUserIdentity($modelUsuario);
            return new static($user);
        else:
            return null;
        endif;
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return null;
        //return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return null;
        //return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    public static function getAttributesUserIdentity($modelUsuarioAttributes) {
        $userAttributes['id'] = $modelUsuarioAttributes['id'];
        $userAttributes['username'] = $modelUsuarioAttributes['user_email'];
        $userAttributes['password'] = $modelUsuarioAttributes['user_password'];
        $userAttributes['user_nome'] = $modelUsuarioAttributes['user_nome'];
        $userAttributes['user_sobrenome'] = $modelUsuarioAttributes['user_sobrenome'];
        $userAttributes['user_telefone'] = $modelUsuarioAttributes['user_telefone'];
        $userAttributes['user_cpf'] = $modelUsuarioAttributes['user_cpf'];
        $userAttributes['id_cidade'] = $modelUsuarioAttributes['id_cidade'];
        $userAttributes['id_uf'] = $modelUsuarioAttributes['id_uf'];
        $userAttributes['user_codigo_recuperacao'] = $modelUsuarioAttributes['user_codigo_recuperacao'];
        $userAttributes['user_imagem'] = $modelUsuarioAttributes['user_imagem'];
        $userAttributes['user_nivel'] = $modelUsuarioAttributes['user_nivel'];
        $userAttributes['user_qt_recuperacao'] = $modelUsuarioAttributes['user_qt_recuperacao'];
        return $userAttributes;
    }
    
 }
