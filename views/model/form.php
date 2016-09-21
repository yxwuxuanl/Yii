<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/20
 * Time: 下午3:01
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();
echo $form->field($model,'un');
echo $form->field($model,'pwd')->passwordInput();
echo Html::submitButton('Submit');
ActiveForm::end();