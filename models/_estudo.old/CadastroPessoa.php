<?php
namespace app\models;
use yii\base\Model;

class CadastroPessoa extends Model
{
 public $nome,
        $sobrenome,
        $telefone,
        $email,
        $apelido;

 public function rules()
 {
     /*REGRAS (VALIDAÇÃO) */
     return[
         [['nome','sobrenome','email'],'required'],
         ['email','email'],
     ];
 }

 public function attributeLabels()
 {
     return [
         'nome'=>'Nome completo',
         'sobrenome'=>'Segundo nome',
         'apelido'=>'Apelido',
         'email'=>'E-mail válido',
         'telefone'=>'Telefone',
     ];
 }

}