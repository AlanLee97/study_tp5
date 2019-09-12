<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//
//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//
//];


/**
 * 自定义路由规则
 */
//静态路由
//01 引入系统类
use \think\Route;


//02 定义路由规则
/*
Route::rule('/','index/index/index');
Route::rule('admin','admin/Index/index');

//带参数的路由
//带一个参数的路由
Route::rule('page/:id','index/index/page');
//带两个参数的路由
Route::rule('date/:month/:day','index/Index/date');
//可选参数路由
Route::rule('date/[:month]/[:day]','index/Index/date');
//全动态路由
//Route::rule(':param1/:param2','index/Index/dongtai');
//完全匹配路由
Route::rule('match','index/Index/match');
//Route::rule('match$','index/Index/match');    //完全匹配
//带额外参数的路由
Route::rule('extra','index/Index/extra?id=2&name=Alan');

//请求类型
//get,post,put,delete 默认请求类型为所有*
//get方式1
Route::rule('type',"index/index/type", 'get');
//get方式2
//Route::get('type', 'Index/index/type');
//post方式1
//Route::rule('type','index/index/type','get|post');
//post方式2
//Route::post('type','index/index/type');

//put方式1
//Route::rule('type','index/index/type','get|put');
//put方式2
//Route::put('type','index/index/type');

//delete方式1
//Route::rule('type','index/index/type','get|delete');
//put方式2
//Route::delete('type','index/index/type');
*/

//动态批量注册路由规则
/*Route::rule([
   'type' => 'index/index/type',
   'page/[:id]' => 'index/index/page',
    '/' => 'index/index/index',
    'admin' => 'admin/index/index'
]);*/

//使用配置文件批量注册
/*return [
    'type' => 'index/index/type',
    'page/[:id]' => 'index/index/page',
    '/' => 'index/index/index',
    'admin' => 'admin/index/index'
];*/

//变量规则
//Route::rule('路由表达式','路由地址','请求类型','路由参数（数组）','变量规则（数组）');
/*Route::rule('page/:id',
    'index/Index/page',
    'get',
    ['method' => 'get','ext' => 'html'],
    ['id' => '\d{1,3}']);*/

//资源路由
Route::resource('blog','index/blog');
Route::resource('user','index/Users');
Route::resource('user2','index/User2');
//2、会自动注册七个路由规则
//		get 	blog  	   		 index   # 后台展示
//		get     blog/create      create  # 添加页面
//		post    blog  	    	 save    # 增加操作
//		get     blog/:id    	 read
//		get     blog/:id/edit    edit    # 修改页面
//		put     blog/:id    	 update  # 更新操作
//		delete  blog/:id    	 delete  # 删除操作

//快捷路由
//声明快捷路由
Route::controller('blog','index/Blog');
Route::controller('shiwu','admin/Transcation');
