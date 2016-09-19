<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/18
 * Time: 下午3:27
 */

namespace app\controllers;
use yii\web\Controller;
use app\commands\NoCsrf;

class RouteController extends Controller
{
    public function actionA()
    {
        echo __FUNCTION__;
    }

    public function actionIndex()
    {
        echo __FUNCTION__;
    }

    public function actionB($arg = null)
    {
        if($arg && is_numeric($arg)) echo $arg;
    }

    public function actionC()
    {
        echo __FUNCTION__;
    }

    public function actionPost()
    {
//        print_r(\Yii::$app->request->post());
        echo __FUNCTION__;
    }

    public function actionGet()
    {
//        print_r(\Yii::$app->request->get());
        echo __FUNCTION__;
    }

    public function behaviors()
    {
        return [NoCsrf::className()];
    }

}