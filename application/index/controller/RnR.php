<?php
/**
 * Created by PhpStorm.
 * User: AlanLee
 * Date: 2019/8/1
 * Time: 22:18
 */
namespace app\index\controller;

use think\Controller;
use think\Request;
/**
 * 学习请求和响应 Request、Response
 */
class RnR extends Controller {
    public function index(){
        echo '我是RnR控制器的index方法';
        echo '<hr>';

        //使用系统函数的方法
        //dump(request());

        //使用系统类的方法：Request是是一个单例模式的类，不能直接new，应该要使用作用域::instance()的方式使用
        $request = Request::instance();
        dump($request);

    }

    /**
     * 获取url
     * @param Request $request
     */
    public function getUrl(Request $request){
        //获取域名
        dump($request->domain());
        echo '<hr>';
        //获取url
        dump($request->url());
        echo '<hr>';
        //获取入口文件
        dump($request->baseFile());
        echo '<hr>';
        //获取后缀名
        dump($request->ext());
        echo '<hr>';
        //获取pathinfo
        dump($request->pathinfo());
        echo '<hr>';
        //获取path
        dump($request->path());
        echo '<hr>';

    }

    /**
     * 获取信息
     */
    public function getInfo(Request $request){
        //获取模块module
        dump($request->module());

        //获取控制器controller
        dump($request->controller());

        //获取方法action
        dump($request->action());
    }

    /**
     * 获取类型
     */
    public function getType(Request $request){
        //获取请求类型
        dump($request->method());
        //获取资源类型
        dump($request->type());
        //获取ip
        dump($request->ip());
        //判断是否是ajax类型
        //dump($request->isAjax());
        //获取地址栏上的参数
        dump($request->param());


    }

    /**
     * 获取数据
     */
    public function getData(Request $request){
        //判断get请求方式中是否有参数
        dump($request->has('id','get'));
    }


    /**
     * 留言板
     */
    public function liuyan(){
        return view();
    }

    /**
     * 过滤
     */
    public function myFilter(Request $request){
        //对提交的内容进行过滤
        /*
        $request->filter('htmlspecialchars');
        $request->filter('strip_tags');
        */

        //对变量进行排除
        dump($request->only('username'));
        dump($request->except('username'));

        //打印提交的内容
        dump($request->post());
    }

    /**
     * 变量修饰符
     */
    public function xiushi(Request $request){
        dump(input('get.id/d'));
        dump(input('get.name/s'));
        dump(input('get.sex/b'));
    }


    /**
     * 变量更改
     */
    public function varModify(Request $request){
        dump($request->get('id'));
        //变量修改
        dump($request->get(['id' => 20]));


    }

    /**
     * 请求类型
     */
    public function type(Request $request){
        dump($request->isGet());
        dump($request->isPost());
        dump($request->isMobile());

        //通过助手函数方式
        dump(\request()->isMobile());

        //模拟ajax请求
        dump($request->isAjax());
    }

    /**
     * 伪静态
     */
    public function weiStatic(Request $request){
        dump(url('index/index/index'));
    }

    /**
     * 参数绑定
     */
    public function bind($id='1',$name='alan'){
        //方式1
        dump(input('id'));
        dump(input('name'));

        //方式2
//        dump($id);
//        dump($name);
    }
}