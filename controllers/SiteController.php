<?php

namespace app\controllers;
use yii\web\Controller;
use app\behaviors\NoCsrf;

class SiteController extends Controller
{
    public function actionIndex()
    {
        print_r(\Yii::$app->request->post());
    }

    public function behaviors()
    {
        return [
            NoCsrf::className(),
        ];
    }
}