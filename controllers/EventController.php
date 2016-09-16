<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/8
 * Time: 下午10:54
 */

namespace app\controllers;
use yii\base\Event;
use yii\web\Controller;
use \yii\base\Component;

class EventController extends Controller
{
    function actionClassBind()
    {
        Event::on(eventA::className(),eventA::EVENT,function($event)
        {
            echo get_class($event->sender);
        });
        //绑定继承自Component的父类

        Event::trigger(eventB::className(),eventA::EVENT); //子类也拥有父类的事件
        Event::trigger(eventC::className(),eventA::EVENT);
    }

    function actionIndex()
    {

        // on($EventName, $handler, $data = null, $append = true)
        $this->on(eventA::EVENT,[$this,'changeJson']);

        /*
            or $this->on(self::EVENT,function($event){
                $event->content = json_encode($event->content);
            });
         */

        $this->on(eventA::EVENT,[$this,'display']); //绑定

        /*
            or $this->on(self::EVENT,function($event){
                echo $event->content;
            });
         */

        $event = new DisplayEvent();
        $event->content = \Yii::$app->request; //传入数据绑定到content属性


        /*
            如果不使用自定义的Event类将使用yii\base\Event,数据需要在on方法第三个参数里传入,从Event::$data取出
         */

        //trigger($EventName, $eventObject = null)
        $this->trigger(eventA::EVENT,$event); //触发事件并且传入自定义Event类(默认为yii\base\Event)
    }

    function display($event) //处理函数,$event为trigger第二个参数(Event类实例)
    {
        echo $event->content;
    }

    function changeJson($event)
    {
        $event->content = json_encode($event->content);
    }
}

class DisplayEvent extends Event
{
    public $content; //自定义Event类

    function pre()
    {
        echo '<pre>';
    }
}

class eventA extends Component
{
    const EVENT = 'event';
}
class eventB extends eventA{}
class eventC extends eventB{}