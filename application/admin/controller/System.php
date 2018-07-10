<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class System extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function base()
    {
        //
        return $this->fetch("system-base");

    }
    public function category()
    {
        //
        return $this->fetch("system-category");

    }
    public function category_add()
    {
        return $this->fetch("system-category-add");
    }
    public function data()
    {
        return $this->fetch("system-data");
    }
    public function log()
    {
        return $this->fetch("system-log");
    }
    public function shielding()
    {
        return $this->fetch("system-shielding");
    }



}
