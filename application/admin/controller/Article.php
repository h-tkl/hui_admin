<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Article extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        return $this->fetch("article-list");

    }
    public function add()
    {
        //
        return $this->fetch("article-add");

    }



}
