<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin();

echo $form->field($model,'username')->label('UserName');
echo $form->field($model,'pwd')->label('PassWord');

echo Html::submitButton('Submit');

ActiveForm::end();