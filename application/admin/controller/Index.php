<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Index extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        return $this->fetch("index");

    }
    public function welcome(){
        return $this->fetch("welcome");
    }


}
