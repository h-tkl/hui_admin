<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class Roles extends Model
{
    /*
     * 获取当前用户可以访问的权限  子节点
     */
    public function getAuthInfo($role_id){
        if (empty($role_id)){
            return null;
        }
        $roleInfo=Db::name('admin_role')
            ->where(array('role_id'=>$role_id))
            ->find();
        $menuid_array=explode(',',$roleInfo["menu_id"]);
        $menuInfo=Db::name("admin_menu")
            ->where('id','in',$menuid_array)
            ->field("url")
            ->select();
        if (!empty($menuInfo)){
            return $menuInfo;
        }else{
            return null;
        }
    }
    /*
     * 获取用户当前可以访问的菜单栏
     */
    public function getMenuInfo($role_id){
        if (empty($role_id)){
            return null;
        }
        $roleInfo=Db::name('admin_role')
            ->where(array('role_id'=>$role_id))
            ->find();

        $menuid_array=explode(',',$roleInfo["menu_id"]);

        $menu=new Menus();
        //获取可以访问的菜单
        $info=$menu->getMenu($menuid_array);

        if (!empty($info)){
            return $info;
        }else{
            return null;
        }
    }

    /*
     * 获取角色信息
     */
    public function getRoleInfo($role_id){
        $info=Db::name("admin_role")
            ->where(array("role_id"=>$role_id))
            ->find();
        if (empty($info)){
            return false;
        }
        $menuid_array=explode(',',$info["menu_id"]);
        $info["menu"]=$menuid_array;
        if (empty($info)){
            return false;
        }else{
            return $info;
        }

    }

}
