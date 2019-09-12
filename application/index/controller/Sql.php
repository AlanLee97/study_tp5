<?php
/**
 * Created by PhpStorm.
 * User: AlanLee
 * Date: 2019/8/2
 * Time: 7:00
 */
namespace app\index\controller;

use think\Db;
use app\index\model\User;
/**
 * 学习数据库操作CURD
 */
class Sql{
    public function index(){
        echo '我是Sql控制器的index方法';
    }

    /**
     * 方式1：使用配置文件config.php连接数据库
     */
    public function connectDBByConfig(){
        //方法1：系统方法
        $data = Db::table('user')->select();
        dump($data);

        //方法2:原生SQL语句方法
        $data = Db::query('select * from user');
        dump($data);
    }

    /**
     * 方式2：使用方法连接数据库
     */
    public function connectDBByFunction(){

        //使用数组方式
        /*
        $db = Db::connect([
            // 数据库类型
            'type'            => 'mysql',
            // 服务器地址
            'hostname'        => '127.0.0.1',
            // 数据库名
            'database'        => 'study_tp5',
            // 用户名
            'username'        => 'root',
            // 密码
            'password'        => 'root',
            // 端口
            'hostport'        => '3308',
        ]);
        */

        //使用字符串方式
        $db = Db::connect('mysql://root:root@127.0.0.1:3308/study_tp5#utf8');

//        dump($db);

        $data = $db->table('user')->select();
        dump($data);
    }

    /**
     * 方式3：使用模型方式连接数据库
     */
    public function connectDBByModel(){
        echo '使用模型连接数据库';

        //实例化模型
        $userModel = new User();

        dump($userModel::all());

    }


    /**
     * 添加操作
     */
    public function add(){
        //返回影响行数
        //$result1 = Db::execute('insert into user values(null,"Mary","123")');
        //带占位符语句
        //$result2 = Db::execute('insert into user values(null,?,?)',['John','321']);
        //方式3
        $result3 = Db::execute('insert into user values(null,:name,:pass)',['name'=>'July','pass'=>'789']);
        dump($result3);

    }

    /**
     * 删除操作
     */
    public function delete(){
        //方式1:写死值
        //$result1 = Db::execute('delete from user where id = 7');
        //方式2：使用占位符
        //$result2 = Db::execute('delete from user where id = ?',[8]);
        //方式3：使用数组形式
        $result3= Db::execute('delete from user where id = :id',['id'=>6]);

        dump($result3);


    }



    /**
     * 修改操作
     */
    public function modify(){
        $result = Db::execute('update user set password=? where id=?',['666',5]);
        dump($result);

    }


    /**
     * 查询操作
     */
    public function query(){
        //方式1：使用系统类
        $data = Db::query('select * from user where id >= ? and id <= ?',[2,4]);
        dump($data);

        //获取执行的sql语句
//        $sql = Db::

    }

}