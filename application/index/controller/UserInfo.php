<?php
/**
 * Created by PhpStorm.
 * User: AlanLee
 * Date: 2019/8/1
 * Time: 16:37
 */
namespace app\index\controller;

use think\Controller;
use think\Exception;
use think\View;

/**
 * Class UserInfo
 * 驼峰命名法命名的控制器，在浏览器地址栏访问时，url的第二单词的大写字母前要加下划线_
 * @package app\index\controller
 */
class UserInfo extends Controller {

    //前置操作
    protected $beforeActionList=[
        'one' => ['only','index'],
        'two' => ['except','index'],
        'three'
    ];

    //one
    public function one(){
        echo 'one<hr>';
    }


    //two
    public function two(){
        echo 'two<hr>';
    }

    //three
    public function three(){
        echo 'three<hr>';
    }



    //控制器的初始化，必须继承系统控制器
    public function _initialize()
    {
        echo '我是控制器初始化方法<br>';
    }


    public function index(){
        echo '我是UserInfo控制器的index方法';
    }

    public function load(){
        //方法1:使用系统方法
        //return view();

        //方法2：使用系统类的fetch方法
        /*$view = new View();
        try {
            return $view->fetch();
        } catch (Exception $e) {

        }*/

        //方法3:使用系统控制器类  继承系统Controller
        return $this->fetch();

    }


    //数据输出：默认返回html
    public function output(){
        $student = [
            'name' => 'Alan',
            'age' => 22,
            'gender' => 'male'
        ];

        return json_encode($student);
    }
}