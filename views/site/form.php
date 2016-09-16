<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/5
 * Time: 下午1:10
 */

// use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::beginForm(Url::to(),'post');
echo Html::textInput('username','Enter UserName',['class' => 'un']);
echo Html::passwordInput('password','',['class' => 'pwd']);
echo Html::submitButton('Submit');
echo Html::endForm();
