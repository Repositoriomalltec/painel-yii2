<?php
/**
 * Created by PhpStorm.
 * User: Studiorama
 * Date: 23/10/2017
 * Time: 14:35
 */

namespace app\controllers;


use yii\web\Controller;

class HelloController extends Controller
{
    public function actionHello($mensagem = null)
    {
        return $this->render('hello',[
            'mensagem'=>'Teste 02',
        ]);
    }
}