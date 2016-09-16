<?php

namespace app\controllers;
use yii\web\Controller;
use app\userclass\output;
use yii\base\Event;
use yii\di\Container;

class SiteController extends Controller
{
    public function actionIndex()
    {
    	$output = \Yii::$app->output;
    	Event::trigger($output::className(),output::EVENT_OUTPUT);
    }

    public function actionDi()
    {
        $container = new Container();
        $container->set('app\userclass\di\inter',['class' => 'app\userclass\di\children']);
        $container->set('demo','app\userclass\di\parents');
        $parents = $container->get('demo');
    }
}