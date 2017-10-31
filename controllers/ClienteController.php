<?php

namespace app\controllers;

use Yii;
use app\models\ClienteModel;
//use app\models\ClientePesquisa;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\filters\AccessControl;

/**
 * ClienteController implements the CRUD actions for ClienteModel model.
 */
class ClienteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class' => AccessControl::className(),
                //'only' =>['create', 'update', 'delete','index', 'view'],
                'rules'=>[
                    [
                        'allow' => true,
                        'actions' => ['create', 'update', 'delete','index', 'view'],
                        'roles' => ['@'],
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ClienteModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $arrayDados = ClienteModel::find()->all();
        $arraylabels = [];
        if (!empty($arrayDados)) {
            $arraylabels = $arrayDados[0]->attributeLabels();
        }
        return $this->render('index', [
            'arrayDados' => $arrayDados,
            'arraylabels' => $arraylabels,
        ]);
    }

    /**
     * Displays a single ClienteModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ClienteModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClienteModel();
        $post = Yii::$app->request->post();

        if ($model->load($post) && $model->save()) {
            $msg = '<div  class="alert alert-success" role="alert" style="font-weight: bold">Cadastro efetuado com sucesso.</div>';
            return json_encode(['msg'=>$msg,'acao_java'=>'create']);
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'titleForm'=>'Cadastro de cliente',
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ClienteModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $msg = '<div  class="alert alert-success" role="alert" style="font-weight: bold">Atualização com sucesso.</div>';
            //return json_encode(['msg'=>$msg,'acao_java'=>'update']);
            return json_encode(['msg'=>$msg,'acao_java'=>'update', 'urlRedirect' => Url::toRoute(['cliente/index'])]);
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ClienteModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(Yii::$app->request->getReferrer());
    }

    /**
     * Finds the ClienteModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClienteModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClienteModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
