<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/20
 * Time: 下午4:20
 */

namespace app\controllers;
use yii\web\Controller;
use app\filters\Microtime;

class FilterController extends Controller
{
    public function actionA()
    {
        echo __CLASS__ . ' ' . __FUNCTION__;
    }

    public function actionB()
    {
        echo __CLASS__ . ' ' . __FUNCTION__;
    }

    //过滤器实际是一种行为
    public function behaviors()
    {
        return [
            'filter' => [
                'class' => Microtime::className(), //过滤器类
                'only' => ['a'], //仅在这些操作中使用过滤器,注意值必须和路由对应
            ],
        ];
    }
}

/*
 *
 * ``php
 *
 * app\filters\Microtime.php
 *
namespace app\commands;
use Yii;
use yii\base\ActionFilter;

class Filter extends ActionFilter
{
    public $startTime;

    public function beforeAction($action)
    {
        $this->startTime = microtime(true);
        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        echo microtime(true) - $this->startTime;
        return parent::afterAction($action, $result);
    }
}
 *
 * php``
 *
 * 过滤器中返回false的话则中止操作运行
 *
 * */