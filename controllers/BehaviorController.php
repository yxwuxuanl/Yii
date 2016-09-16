<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/9
 * Time: 上午9:25
 */

namespace app\controllers;
use yii\web\Controller;
use yii\base\Component;
use yii\base\Behavior;

class BehaviorController extends Controller
{
    function actionIndex()
    {
        $EmptyClass = new EmptyClass();
        $BehaviorClass = new BehaviorClass();
        $EmptyClass->attachBehavior('Behavior',$BehaviorClass);
/*
    绑定行为的方法:
        1.通过Component::attachBehavior方法绑定
        2.可以通过重载Component::behaviors方法绑定Behavior
*/

//        echo $EmptyClass->fn(); //访问行为的方法
//        echo $EmptyClass->Foo; //访问行为的属性
//        $EmptyClass->trigger(BehaviorClass::EVENT); //触发行为绑定的事件

//         $EmptyClass->dumpThis(); // 返回BehaviorClass
//         $EmptyClass->dumpOwner(); //返回EmptyClass
    }
}

class EmptyClass extends Component{

    // 通过重载Component::behaviors方法绑定
    function behaviors()
    {
//        return [];
        return [
            BehaviorClass::className()
        ];
    }
}

class BehaviorClass extends Behavior
{
    private $foo = 'abc';
    const EVENT = 'event';

    function fn()
    {
        return __CLASS__ . __FUNCTION__;
    }

    function getFoo() //Object对象的getter设定,访问未定义或者private/protected属性时调用get{PropName}方法
    {
        return $this->foo;
    }

    function dumpThis()
    {
        return $this; //返回BehaviorClass
    }

    function dumpOwner()
    {
        return $this->owner; //返回EmptyClass
    }

    function events()
    {
        return [
            self::EVENT => 'event'
        ];
    }

    function event($event)
    {
        echo __CLASS__ . __FUNCTION__;
    }
}