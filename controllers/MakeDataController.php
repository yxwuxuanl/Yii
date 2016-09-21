<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/20
 * Time: 上午8:43
 */

namespace app\controllers;
use app\commands\NoCsrf;
use yii\db\Connection;
use yii\web\Controller;

class MakeDataController extends Controller
{
    public function actionIndex()
    {
        \Yii::$container->set('db',[
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii',
            'username' => 'root',
            'password' => '103002',
            'charset' => 'utf8'
        ]);

        $db = \Yii::$container->get('db');
        var_dump($db);
    }

    public function behaviors()
    {
        return [
            NoCsrf::className()
        ];
    }
}