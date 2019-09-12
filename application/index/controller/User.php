<?php
/**
 * Created by PhpStorm.
 * User: AlanLee
 * Date: 2019/7/31
 * Time: 8:03
 */
namespace app\index\controller;


class User{
    public function index(){
        return "我是前台User控制器的index方法";
    }

    /**
     * 自己写的方法
     * @return string
     */
    public function hello(){
        return "Hello, Alan";
    }
}