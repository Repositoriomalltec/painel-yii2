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
use yii\helpers\Url;
use yii\web\Controller;

class ResgatarController extends Controller
{
    public $layout ="adminLTELogin";
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
                        'actions' => ['recuperar-senha', 'read', 'alterar-senha', 'salvar-senha', 'codigo-expirou'],
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
            'usuario' => $usuario,
            'tituloFormulario' => 'Recuperar senha'
        ]);
    }


    /**
     * Recebe os dados do formulário de recuperação e senha
     * @var static user_cpf
     * @var static email
     * Pesquisa as variável no banco e retorna o valor da consulta.
     * Se encontrar o user_cpf ou email enviar o link de recuperação para o email de cadastro, caso não encontre emite mensagem informando que os dados não existe.
     */
    public function actionRead()
    {
        $post = \Yii::$app->request->post();
        $model = new UsuarioModel;
        /*
         * BLOCO PARA BUSCAR INFORMAÇÃO CONFORME A OPÇÃO DO USUÁRIO
         */
        if ($model->load($post)) {
            if (!empty($model->user_cpf) && empty($model->email)):
                $modelUsuario = UsuarioModel::find()->where(['user_cpf' => $model->user_cpf])->one();
            elseif (!empty($model->email) && empty($model->user_cpf)):
                $modelUsuario = UsuarioModel::find()->where(['user_email' => $model->email])->one();
            else:
                $modelUsuario = UsuarioModel::find()->where(['user_cpf' => $model->user_cpf, 'user_email' => $model->email])->one();
            endif;

        }

        //SE EXISTIR EMAIL CADASTRADO NO BANCO ENTRA NO BLOCO
        if (!empty($modelUsuario->user_email)):

            $URL = Yii::$app->request->serverName . Url::toRoute(['resgatar/alterar-senha', 'codigo' => $modelUsuario->user_codigo_recuperacao]);

            $msgEmail = "Olá <b>{$modelUsuario->user_nome}</b>  clique no link para alterar a senha  <a href='{$URL}'> alterar senha </a>";
            $sendMail = Yii::$app->mailer->compose()
                ->setFrom([Yii::$app->params['USEREMAIL'] => Yii::$app->params['USERMANE']])
                ->setTo($modelUsuario->user_email)
                ->setSubject('Recuperação de senha')
                ->setHtmlBody($msgEmail);

            //DISPARA EMAIL COM LINK PARA RECUPERAR SENHA
            if ($sendMail->send()):
                $msg = "Olá <b>{$modelUsuario->user_nome}</b> enviamos para seu e-mail {$modelUsuario->user_email} o link para atualizar seus dados de acesso.";
                Yii::$app->getSession()->setFlash('success', $msg, true);
                return $this->redirect(Yii::$app->request->getReferrer());
            endif;
        else:
            $msg = " Opssss! Não encontramos os dados informados <b>{$model->user_cpf}</b> <b>{$model->email}</b><br><span>Tente pesquisar por CPF ou E-MAIL</span>";
            Yii::$app->getSession()->setFlash('danger', $msg, true);
            return $this->redirect(Yii::$app->request->getReferrer());
        endif;
    }

    public function actionAlterarSenha($codigo)
    {
        $codigo = Yii::$app->request->get('codigo');
        $usuario = new UsuarioModel;

        /*
         * BLOCOP VERIFICA SE O CODIGO DE RECUPERAÇÃO DE SENHA AINDA É VÁLIDO
         */
        $buscaDados = UsuarioModel::find()->where(['user_codigo_recuperacao' => $codigo])->count();

        if ($buscaDados || $buscaDados >= 1):
            return $this->render('alterar-senha', [
                'usuario' => $usuario,
                'tituloFormulario' => 'Alterar dados de acesso.'
            ]);
        else:
            return $this->render('codigo-expirou');
        endif;
    }

    public function actionSalvarSenha()
    {
        $post = \Yii::$app->request->post();
        $model = new UsuarioModel;

        /*
         * ALTERA OS DADOS E CODIGO ENVIADO POR EMAIL E ENVIA NOTIFICAÇÃO COM NOVO ACESSO
         */
        if ($model->load($post)) {
            $atulaizaDados = UsuarioModel::find()->where(['user_codigo_recuperacao' => $model->codigo])->one();
            $atulaizaDados->user_password = md5($model->user_password);
            $atulaizaDados->user_email = $model->email;
            $atulaizaDados->user_qt_recuperacao = $atulaizaDados->user_qt_recuperacao + 1;
            $atulaizaDados->user_codigo_recuperacao = md5(time());

            if ($atulaizaDados->save()):
                $msgEmail = " Olá <b>{$atulaizaDados->user_nome}</b> seu dados de acesso foram alterados para login: {$atulaizaDados->user_email} senha: {$model->user_password}";
                $sendMail = Yii::$app->mailer->compose()
                    ->setFrom([Yii::$app->params['USEREMAIL'] => Yii::$app->params['USERMANE']])
                    ->setTo($atulaizaDados->user_email)
                    ->setSubject('Recuperação de senha')
                    ->setHtmlBody($msgEmail);
                if ($sendMail->send()):
                    $msg = "Seu acesso foi alterado com sucesso.";
                    Yii::$app->getSession()->setFlash('success', $msg, true);
                    return $this->redirect(Url::toRoute('site/login'));
                endif;
            else:
                $msg = " Erro! O sistema não conseguiu alterar os dados<br> Fale com nossa equipe { Yii::$app->params['EMAILSUPORTE'] }";
                Yii::$app->getSession()->setFlash('danger', $msg, true);
                return $this->redirect(Yii::$app->request->getReferrer());
            endif;
        }
    }
}