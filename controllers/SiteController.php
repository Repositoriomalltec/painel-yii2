<?php

namespace app\controllers;

use app\models\ClienteModel;
use app\models\ContactForm;
use app\models\LoginForm;
use app\models\PedidoModel;
use app\models\ProdutoModel;
use app\models\UsuarioModel;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
       if (!Yii::$app->user->isGuest) {
            $totalProduto = ProdutoModel::find()->count();
            $totalCliente = ClienteModel::find()->count();
            $totalPedido = PedidoModel::find()->count();
            $totalUsuario = UsuarioModel::find()->count();
            $dataCliente = ClienteModel::find();           

            $paginationCliente = new Pagination([
            'defaultPageSize'=>10,
            'totalCount'=>$dataCliente->count()
            ]);

            $arrayCliente = $dataCliente->orderBy('nome')
            ->offset($paginationCliente->offset)
            ->limit($paginationCliente->limit)
            ->all();
           
           
            return $this->render('index',['paginationCliente'=>$paginationCliente, 
                'totalProduto'=>$totalProduto,
                'totalCliente'=>$totalCliente, 
                'totalPedido'=>$totalPedido, 
                'totalUsuario'=>$totalUsuario,
                'arrayCliente'=>$arrayCliente,
                'paginationCliente'=>$paginationCliente,
                ]);            
        }else{           
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->goBack();
            }
            return $this->render('login', [
               'model' => $model,
            ]);
        }    
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
