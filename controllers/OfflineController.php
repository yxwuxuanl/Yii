<?php 

namespace app\controllers;
use yii\web\Controller;

class OfflineController extends Controller
{
	function actionNotice()
	{
		return $this->render('notice');
	}
}