<?php
/**
 * Created by PhpStorm.
 * User: lin2ur
 * Date: 2016/9/14
 * Time: 下午11:44
 */

namespace app\userclass\di;

class clsb
{
    public $inter;

    public function __construct(inter $inter)
    {
        $this->inter = $inter;
    }

    public function func($cont)
    {
        $this->inter->func($cont);
    }

}

