<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/20
 * Time: 上午9:40
 */

namespace app\models;
use yii\base\Model;

class Attribute extends Model
{
    public $un, $pwd; //通过成员属性方式声明模型属性

    public function attributes() //通过重载attributes方法声明属性,注意必须重载__set魔术方法
    {
        return ['age'];
    }

    function __set($name, $value) //重载__set魔术方法
    {
        if (in_array($name, $this->attributes())) {
            $this->$name = $value;
            return;
        }
        parent::__set($name, $value);
    }

    public function attributeLabels() //定义属性标签,使用getAttributeLabel方法获取
    {
        return [
            'un' => 'UserName',
            'pwd' => 'PassWord',
            'age' => 'Age'
        ];
    }
}