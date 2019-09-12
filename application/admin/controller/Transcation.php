<?php
/**
 * Created by PhpStorm.
 * User: AlanLee
 * Date: 2019/8/21
 * Time: 19:07
 */

namespace app\admin\controller;
use think\Db;
use think\Exception;
use think\exception\PDOException;


class Transcation{
    function index(){
        echo "我是Admin模块的Admin控制器的index方法";
    }

    //事务机制
    //加入有条个删除数据库数据操作
    //1.删除id=10的操作
    //2.删除id=14的操作
    //两个操作一起执行，如果两个都成功，则提交事务
    //如果其中一个操作不成功，则回滚事务（不删除数据）


    //1.自动控制事务
    function zidong(){

    }



    //2.手动控制事务
    function shoudong(){
        //先开启事务
        Db::startTrans();

        try {
            $flag = Db::table("user")->delete(10);
            if (!$flag) {
                throw new \Exception("删除id=10的失败");
            }

            $flag = Db::table("user")->delete(14);
            if (!$flag) {
                throw new \Exception("删除id=14的失败");
            }

            //提交事务
            Db::commit();
        } catch (\Exception $e) {
            //回滚事务
            Db::rollback();
            dump($e->getMessage());

        }

    }

    /**
     * 简便方式的手动控制事务
     */
    function shoudong2(){
        //开启事务
        Db::startTrans();
        //删除id=10的数据
        $a = Db::table("user")->delete(10);


        //删除id=14的数据
        $b = Db::table("user")->delete(14);

        //判断两个操作是否成功
        if ($a && $b){
            //成功则提交事务
            Db::commit();
        }else{
            //不成功，则回滚事务
            Db::rollback();
        }
    }


    /**
     * 视图查询，类似于多表查询
     */
    public function viewQuery(){
        $data = Db::view("info","id,gender")
            ->view("user","username","user.id=info.uid")
            ->select();

        dump($data);


    }



}