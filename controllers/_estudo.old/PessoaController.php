<?php
/**
 * Created by PhpStorm.
 * User: Studiorama
 * Date: 23/10/2017
 * Time: 14:48
 */

namespace app\controllers;


use app\models\CadastroPessoa;
use app\models\Tb_pessoa;
use yii\base\Model;
use yii\web\Controller;

class PessoaController extends Controller
{
    public function actionFormulario(){
        //Objeto
        $cadastroModel = new CadastroPessoa;
        $post = \Yii::$app->request->post();

        if($cadastroModel->load($post) && $cadastroModel->validate()):
            return $this->render('formulario-ok',[
                'nomeFormulario'=>'Dados validado',
                'model'=>$cadastroModel
            ]);
        else:
            return $this->render('formulario',[
                'nomeFormulario'=>'Cadastro de pessoa',
                'model'=>$cadastroModel
            ]);
        endif;
    }

    //Tabela
    public function actionPessoas(){
        //leitura da tabela
        $pessoa = Tb_pessoa::find()->orderBy('nome')->all();
        //print_r($pessoa);

        //seleção por ID
        $pessoaOne = Tb_pessoa::findOne(8);
       // print_r($pessoaOne);
        //echo $pessoaOne->nome;

        //alteração do nome save()
        $pessoaOneSave = Tb_pessoa::findOne(8);
        $pessoaOneSave->nome = "Teste de alteração do nome";
        $pessoaOneSave->save();
        echo $pessoaOneSave->nome;




    }

}