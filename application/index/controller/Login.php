<?php
/**
 * Created by PhpStorm.
 * User: AlanLee
 * Date: 2019/8/1
 * Time: 17:21
 */
namespace app\index\controller;

use think\Controller;

class Login extends Controller {
    public function index(){
        echo '我是Login控制器的index方法';
    }

    public function login(){
        return view();
    }

    public function check(){

        $username = $_POST['username'];
        $password = $_POST['password'];

        /*
        dump($_POST);

        echo $username."<hr>";
        echo $password."<hr>";
        */

        //跳转
        //$this->success(登录信息,跳转地址,数据,等待时间,header信息);
        //判断是否登录成功
        if ($username == 'admin' && $password == '123'){
            //登录成功
//            $this->success("登录成功",'success.html','','3','');
            $this->success("登录成功",url('index/login/login'));

        }else{
            //登录失败
            $this->error('登录失败',url('index/login/login'));


        }


    }

    public function myRedirect(){
        $this->redirect('index/index');
    }
}