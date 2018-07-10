<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Admin extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        return $this->fetch("admin-list");
    }
    public function add(){
        return $this->fetch("admin-add");
    }
    public function password_edit(){
        return $this->fetch("admin-password-edit");
    }
    public function permission(){
        return $this->fetch("admin-permission");
    }
    public function role(){
        return $this->fetch("admin-role");
    }
    public function role_add(){
        return $this->fetch("admin-role-add");
    }

}
