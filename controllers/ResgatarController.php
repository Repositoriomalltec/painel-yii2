<?php
/**
 * Created by PhpStorm.
 * User: Studiorama
 * Date: 26/10/2017
 * Time: 19:16
 */

namespace app\controllers;

use app\models\UsuarioModel;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class ResgatarController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['recuperar-senha','read'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],

        ];
    }


    /**
     * @return string
     */
    public function actionRecuperarSenha()
    {
       $usuario = new UsuarioModel;
        return $this->render('recuperar-senha', [
            'usuario'=>$usuario
        ]);
    }

    /**
     * Recebe os dados do formulário de recuperação e senha
     * @var static user_cpf
     * @var static email
     * Pesquisa as variável no banco e retorna o valor da consulta.
     * Se encontrar o user_cpf ou email enviar o link de recuperação para o email de cadastro, caso não encontre emite mensagem informando que os dados não existe.
     */
    public function actionRead(){
        $post = \Yii::$app->request->post();
        $model = new UsuarioModel;

        if ($model->load($post)) {

            if (!empty($model->user_cpf) && empty($model->email)):
                $modelUsuario = UsuarioModel::find()->where(['user_cpf' => $model->user_cpf])->one();
            elseif (!empty($model->email) && empty($model->user_cpf)):
                $modelUsuario = UsuarioModel::find()->where(['user_email' => $model->email])->one();
            else:
                $modelUsuario = UsuarioModel::find()->where(['user_cpf' => $model->user_cpf, 'user_email' => $model->email])->one();
            endif;

        }

        /* Se o valor email existir no retorno envia link para trocar senha  */
        if(!empty($modelUsuario->user_email)):
            $msg = "Olá <b>{$modelUsuario->user_nome}</b> enviamos para seu e-mail {$modelUsuario->user_email} o link para atualizar seus dados de acesso.";
            Yii::$app->getSession()->setFlash('success', $msg, true);
            return $this->redirect(Yii::$app->request->getReferrer());
        else:
            $msg = " Opssss! Não encontramos os dados informados <b>{$model->user_cpf}</b> <b>{$model->email}</b><br><span>Tente pesquisar por CPF ou E-MAIL</span>";
            Yii::$app->getSession()->setFlash('danger', $msg, true);
            return $this->redirect(Yii::$app->request->getReferrer());
        endif;
    }

}