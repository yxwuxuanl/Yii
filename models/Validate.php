<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/20
 * Time: 上午10:12
 */

namespace app\models;
use yii\base\Model;

class Validate extends Model
{
    const S_ONE = '1';
    const S_TWO = '2';

    public function scenarios()
    {
        return [
            self::S_ONE => ['un','pwd'],
            self::S_TWO => ['un','pwd','email']
        ];
    }
}