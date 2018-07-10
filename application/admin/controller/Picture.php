<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\7\6 0006
 * Time: 17:08
 */

namespace app\admin\controller;


use think\Controller;

class Picture extends Base
{

    public function index()
    {
        //
        return $this->fetch("picture-list");

    }
    public function add()
    {
        //
        return $this->fetch("picture-add");

    }
}