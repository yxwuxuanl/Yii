<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/14
 * Time: 下午3:04
 */

namespace app\controllers;
use yii\base\Controller;
use yii\di\Container;

class DiController extends Controller
{
    public function actionIndex()
    {
        \Yii::$container->set('app\userclass\di\inter',['class' => 'app\userclass\di\clsa']);
        $clsb = \Yii::$container->get('app\userclass\di\clsb');
        $clsb->func('abcde');
    }
}

/*

app\userclass\di\inter:

    namespace app\userclass\di;

    interface inter
    {
        public function func($cont);
    }

 * */

/*

app\userclass\di\clsa:

    namespace app\userclass\di;
    use app\userclass\di\inter;

    class clsa implements inter
    {
        public function func($cont)
        {
            echo $cont;
        }
    }

 * */

/*

app\userclass\di\clsb:

    namespace app\userclass\di;
    use yii\base\Object;

    class clsb extends Object
    {
        public $inter;

        public function __construct(inter $inter,array $config = [])
        {
            $this->inter = $inter;
            parent::__construct($config);
        }

        public function func($cont)
        {
            $this->inter->func($cont);
        }
    }

 * */