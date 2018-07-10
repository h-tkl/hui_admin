<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\7\6 0006
 * Time: 17:20
 */

namespace app\admin\controller;


use think\Controller;

class Product extends Base
{
    /*
    * 品牌管理
    */
    public function brand()
    {
        //
        return $this->fetch("product-brand");

    }
    /*
     * 分类管理
     */
    public function category()
    {
        //
        return $this->fetch("product-category");

    }
    /*
     * 分类管理
     */
    public function category_add()
    {
        //
        return $this->fetch("product-category-add");

    }
    /*
        *  产品管理
        */
    public function index()
    {
        //
        return $this->fetch("product-list");

    }
    public function add()
    {
        //
        return $this->fetch("product-add");

    }

}