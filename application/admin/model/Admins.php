<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class Admins extends Model
{
    //
    //获取管理员信息
    public function getAdminUser($where=null){
        if ($where==null){
            $result=Db::name("admin_user")
                ->alias('u')
                ->join('admin_role r','u.role_id=r.role_id','left')
                ->select();
        }else{
            $result=Db::name("admin_user")
                ->alias('u')
                ->join('admin_role r','u.role_id=r.role_id','left')
                ->where($where)
                ->select();
        }
        return $result;
    }

    //获取角色
    public function getAdminRole(){
        $result=Db::name("admin_role")->select();
        foreach ($result as $key=>$value){
            $admin_user=Db::name("admin_user")
                ->field("names")
                ->where(array('role_id'=>$value["role_id"]))
                ->select();
            $tmp=array();
            if (!empty($admin_user)){
                foreach ($admin_user as $k=>$v){
                    $tmp[]=$v["names"];
                }
                $result[$key]["admin_user"]=implode(',',$tmp);
            }else{
                $result[$key]["admin_user"]='无';
            }
        }
        return $result;
    }

    /*
     * 获取子节点
     */
    public function getPermissionInfo($where){
        $result=Db::name("admin_menu")
            ->where($where)
            ->select();
        foreach ($result as $key=>$value){
            $result[$key]['parent']=Db::name("admin_menu")
                ->where(array('id'=>$value["parent_id"]))
                ->field("name")
                ->find();
        }
        return $result;
    }

    /*
     * 获取所有的菜单栏以及子节点
     *
     */
    public function getAllPermissionInfo(){
       $menus=new Menus();
       $data=$menus->getMenu();
       $tmp=array();
       foreach ($data as $key=>$value){
           if (!empty($value["cmenu"])){
               foreach ($value['cmenu'] as $k => $v) {
                   $tmp = DB::name('admin_menu')
                       ->where(array('type'=>'per','parent_id'=>$v['id']))
                       ->select();
                   if (!empty($tmp)) {
                       $data[$key]['cmenu'][$k]['per'] = $tmp;
                   } else {
                       $data[$key]['cmenu'][$k]['per'] = array();
                   }
               }
//               $tmp=Db::name("admin_menu")
//                   ->where(array('type'=>'per','parent_id'=>$value['id']))
//                   ->select();
//               if (!empty($tmp)){
//                   $data[$key]["cmenu"][$key]["per"]=$tmp;
//               }else{
//                   $data[$key]["cmenu"][$key]["per"]=array();
//               }
           }
       }
       return $data;
    }

    /*
     * 获取二级菜单
     */
    public function getCmenuInfo(){
        $where["parent_id"]=array('neq','0');
        $where["type"]=array('eq','menu');
        $menu=Db::name("admin_menu")
            ->where($where)
            ->order("sort asc")
            ->select();
        return $menu;
    }


}
