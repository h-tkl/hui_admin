<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Member extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        return $this->fetch("member-list");
    }

    public function add()
    {
        return $this->fetch("member-add");
    }

    public function del()
    {
        return $this->fetch("member-del");
    }
    public function record_browse()
    {
    return $this->fetch("member-record-browse");

    }
    public function record_download()
    {
        return $this->fetch("member-record-download");

    }
    public function record_share()
    {
        return $this->fetch("member-record-share");

    }
    public function show()
    {
        return $this->fetch("member-show");

    }


}
