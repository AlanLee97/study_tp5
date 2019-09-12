<?php
/**
 * Created by PhpStorm.
 * User: AlanLee
 * Date: 2019/8/22
 * Time: 7:21
 */

namespace app\index\controller;

/**
 * Class DataModel
 * 使用数据模型
 * @package app\index\controller
 */
class DataModel
{
    public function idnex(){

    }

    /**
     * 查询单条数据
     */
    public function getOne(){
        $user = new \app\index\model\User();
        //1.通过主键查询
        $res = $user::get(1);
        //2.通过字段查询
        $res = $user::get(["username"=>"tom"]);
        //3.使用闭包函数
        $res = $user::get(function ($query){
            $query->where("id",3);
        });
        //4.使用find方法
        $res = $user::where("id",4)->find();
        dump($res->toArray());
    }

    /**
     * 查询多条数据
     */
    public function getAll(){
        $user = new \app\index\model\User();
        //查询所有数据
        $res = $user::all();
        //通过主键字符串查询
        $res = $user::all("1,2,3");
        //通过数组（主键）查询
        $res = $user::all([1,2,3]);
        //数组，字段
        $res = $user::all(["password"=>"123"]);



        foreach ($res as $key => $value){
            dump($value->toArray());
        }
    }

    /**
     * 获取值
     */
    public  function getValue(){
        //获取某个值
        $user = new \app\index\Model\User();
        $res = $user::where("id",5)->value("username");


        dump($res);
    }

    /**
     * 动态查询
     */
    public function dynamicQuery(){
        $user = new \app\index\model\User();
        $res = $user::getByUsername("alan");
        $res = $user::getByPassword("123");
        dump($res->toArray());
    }



    /**
     * 增加数据
     */
    public function add(){
        //实例化
        $user = new \app\index\model\User();
        //设置属性
//        $user->username = "Lee";
//        $user->password = "111111111111";
//
        //也可以通过data方法
        $user->data([
            "username"=>"alan",
            "password"=>"123456"
        ]);

        //返回影响行数
        dump($user->save());

    }

    /**
     * 增加多条数据
     */
    public function addAll(){
        //实例化
        $user = new \app\index\model\User();
        //添加数据
        $list = [
            ["username"=>"john","password"=>"543210"],
            ["username"=>"jack","password"=>"000000"],
        ];
        $res = $user->saveAll($list);
        dump($res);
    }


    /**
     * 更新数据
     */
    public function update(){
        //实例化
        $user = new \app\index\model\User();
        //先获取数据
//        $user = $user::get(16);
//        $user->password = "aaaaaaaaaa";
//        $res = $user->save();

        //使用数组
//        $res = $user->save([
//            "password"=>"123456"
//        ], ["id"=>16]);

        //过滤字段
//        $_POST["username"] = "aaa";
//        $_POST["password"] = "bbb";
//        $_POST["age"] = 22;
//        $_POST["id"] = 16;
//        $res = $user->allowField("username","password")
//            ->save($_POST,["id"=>$_POST["id"]]);
//
//

        //批量更新
        $data = [
          ["id"=>22,"username"=>"ccc","password"=>"www"],
          ["id"=>9,"username"=>"aaaa","password"=>"qqq"]
        ];
        $res = $user->saveAll($data);


        dump($res);

    }






    /**
     * 删除数据
     */
    public function delete(){
        //实例化
        $user = new \app\index\model\User();
        //先获取数据，再删除
//        $res = $user::get(21);
//        $res = $res->delete();

        //使用destroy()方法
        //$res =  $user::destroy(20);
        //删除多条数据
//        $res =  $user::destroy("17,18,19");
        $res =  $user::destroy([14,15]);
        echo $user::getLastSql();
        dump($res);

    }


    /**
     * 统计数据条数
     */
    public function tongji(){
        $user = new \app\index\model\User();
        //统计条数
        $res = $user::count();
        //条件判断
        $res = $user->where("id",">",8)->count();
        //统计最大值
        $res = $user->max("id");
        //统计最小值
        $res = $user->min("id");
        //平均值
        $res = $user->avg("id");
        //和
        $res = $user->sum("id");



        dump($res);
    }


    /**
     * 获取器
     */
    public function getSex(){
        $user = new \app\index\model\User();

        $res = $user->get(17);
        dump($res->toArray());
    }

    /**
     * 修改器
     */
    public function setPass(){
        $user = new \app\index\model\User();

        $res = $user->save(["password"=>"nnn"],["id"=>16]);
        dump($res);



    }

    /**
     * 自动完成
     * 更新和插入都会执行操作
     * 所以最好单独使用
     */
    public function autoComplete(){
        $user = new \app\index\model\User();
        //插入一条数据
        $res = $user->save([
           "username"=>"mmmm",
           "password"=>"bbbb"
        ]);
        dump($res);


        //更新数据
        $res = $user->save([
            "username"=>"mmmm",
            "password"=>"123456"
        ]);
        dump($res);
    }



    /**
     * 软删除
     */
    public function softDelete(){
        $user = new \app\index\model\User();
        $res = $user::destroy(28);
        dump($res);

        $res = $user->get(28);
        dump($res);
    }










}