<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/6
 * Time: 下午10:45
 */

namespace app\models;
use yii\base\Model;

class Form extends Model
{
    public $username,$password;

    function rules()
    {
        return [
            [['username','password']]
        ];
    }
}