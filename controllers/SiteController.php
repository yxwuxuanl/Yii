<?php

namespace app\controllers;
use yii\web\Controller;
use yii\di\Container;
use app\commands\NoCsrf;

class SiteController extends Controller
{
    public function actionIndex()
    {
        print_r(\Yii::$app->request->post());
    }

    public function actionDi()
    {
        $container = new Container();
        $container->set('app\userclass\di\inter',['class' => 'app\userclass\di\children']);
        $container->set('demo','app\userclass\di\parents');
        $parents = $container->get('demo');
    }

    public function behaviors() 
    {
        return [NoCsrf::className()];
    }
}