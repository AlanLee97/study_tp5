<?php
/**
 * Created by PhpStorm.
 * User: AlanLee
 * Date: 2019/8/1
 * Time: 21:58
 */
namespace app\index\controller;

use think\Controller;

/**
 * Class Error 空控制器 + 空操作
 * 防止用户误操作，改善交互
 * 网站上线时要为每一个控制器添加空操作
 * @package app\index\controller
 */
class Error extends Controller {
    public function index(){
        //重定向回首页
        $this->redirect('index/index');
    }

    //空操作：重定向回首页
    public function _empty(){
        $this->redirect('index/index');
    }

}