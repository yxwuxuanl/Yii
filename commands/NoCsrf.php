<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/18
 * Time: 下午4:17
 */

namespace app\commands;
use yii\base\Behavior;
use yii\web\Controller;

class NoCsrf extends Behavior
{
    public function events()
    {
        return [Controller::EVENT_BEFORE_ACTION => 'beforeAction'];
    }

    public function beforeAction($event)
    {
        $event->action->controller->enableCsrfValidation = false;
    }
}