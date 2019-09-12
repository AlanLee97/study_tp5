<?php
/**
 * Created by PhpStorm.
 * User: AlanLee
 * Date: 2019/8/2
 * Time: 14:24
 */

namespace app\index\controller;

use think\Controller;
use think\Db;

class User2 extends Controller{
    public function index(){
//        echo '我是User2控制器的index()';

        /**
         * 通过table()方法查询：带前缀
         */
        //查询所有数据
        /*
        $allData = Db::table('user')->select();
        dump($allData);

        //查询一条数据
        $oneData = Db::table('user')->find();
        dump($oneData);*/




        /**
         * 通过name()方法查询：不带前缀
         */
        /*
        $allData = Db::name('user')->select();
        dump($allData);

        //查询一条数据
        $oneData = Db::name('user')->find();
        dump($oneData);*/

        /**
         * 通过助手函数查询
         */
        /*
        $allData = db('user')->select();
        dump($allData);

        //查询一条数据
        $oneData = db('user')->find();
        dump($oneData);*/


        /**
         * 条件查询
         */
        $data = Db::table('user')->where('id','>',10)->select();
        $data = Db::table('user')->where('id','>',3)->where('id','<',9)->select();

        dump($data);


    }


    /**
     * 增加数据
     */
    public function insert(){
        //插入一条数据
        $data = [
            'username' => 'Lee',
            'password' => '123'
        ];

        $rs = Db::table('user')->insert($data);
        dump($rs);
    }


    /**
     * 查询数据
     */
    public function select(){

    }


    /**
     * 更新数据
     */
    public function update(){

    }


    /**
     * 删除数据
     */
    public function delete(){

    }

    public function read(){

    }

    public function save(){

    }

    public function edit(){

    }

}