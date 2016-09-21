<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/20
 * Time: 上午10:23
 */

namespace app\controllers;
use yii\web\Controller;
use app\models\Attribute;
use app\models\Validate;
use app\commands\NoCsrf;

class ModelController extends Controller
{
    public function actionAttribute()
    {
        $post = \Yii::$app->request->post();
        $model = new Attribute();

        if(empty($post))
        {
            return $this->render('form',['model' => $model]);
        }else{
            $model->load($post['Attribute']);
//            $model->attributes = $post['Attribute'];
            var_dump($model);
//            print_r($post['Attribute']);
        }

    }

    public function behaviors()
    {
        return [
//            NoCsrf::className()
        ];
    }

}