<?php
/**
 * Created by PhpStorm.
 * User: AlanLee
 * Date: 2019/8/1
 * Time: 15:40
 */
namespace app\index\controller;

use think\Route;
use think\Url;

class Blog{
    public function index(){
        echo  '我是Blog控制器的index方法<br/>';
        echo '生成路由：';

        //普通url地址
        dump(Url::build('index/index/index'));
        dump(\url('index/index/index'));

        //带参数的url地址
        dump(\url('index/index/index',['id' => '111']));
        //带锚点的url地址
        dump(\url('index/index/index#id',['id' => '111']));
        //带域名的url地址
        dump(\url('index/index/index#id@blog',['id' => '111']));
        //加入口文件
        Url::root('/index.php');
        dump(\url('index/index/index#id@blog',['id' => '111']));
    }

    public function geta(){
        echo 'aaaaaaaa';
    }
}