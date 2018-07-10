<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class Menus extends Model
{
    /*
     * 获取所有的菜单栏
     */
    public function getMenu($menuid_array=null){

        if (!empty($menuid_array)){
                $menu=Db::name("admin_menu")
                    ->where(array("parent_id"=>0,"type"=>"menu"))
                    ->where('id','in',$menuid_array)
                    ->order("sort asc")
                    ->select();
        }else{
            $menu=Db::name("admin_menu")
                ->where(array("parent_id"=>0,"type"=>"menu"))
                ->order("sort asc")
                ->select();

        }
        $nmenu=array();
        if (!empty($menu)){
            foreach ($menu as $key=>$value){
                $pid=$value['id'];
                $nmenu[$key]=$value;
                if (!empty($menuid_array)){
                    $cmenu=Db::name("admin_menu")
                        ->where(array('parent_id'=>$pid,'type'=>'menu'))
                        ->where('id','in',$menuid_array)
                        ->order("sort asc")
                        ->select();

                }else{
                    $cmenu=Db::name("admin_menu")
                        ->where(array('parent_id'=>$pid,'type'=>'menu'))
                        ->order("sort asc")
                        ->select();

                }
                if(!empty($cmenu)){
                    $nmenu[$key]['cmenu']=$cmenu;
                }else{
                    $nmenu[$key]['cmenu']=array();
                }
            }
        }

        return $nmenu;
    }



}
