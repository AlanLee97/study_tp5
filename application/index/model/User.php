<?php

namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

/**
 * 创建model
 * 方式1：使用命令行php think make:model app\index\model\user
 * 方式2：手动创建
 * Class user
 * @package app\index\model
 */
class User extends Model
{
    //使用软删除
    use SoftDelete;
    //设置软删除字段
//    protected $deleteTime = "delete_time1";



    //方式1：使用数组配置数据库
    /*
    protected $connection=[
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
    ];
    */

    //方式2：使用字符串连接数据库
    //protected $connection='mysql://root:root@127.0.0.1:3308/study_tp5#utf8';


    /**
     * sex的获取器
     */
    public function getSexAttr($value){
        switch ($value){
            case "0":
                return "女";
                break;
            case "1":
                return "男";
                break;
            default:
                return "未知";
        }
    }

    /**
     * 设置密码的修改器
     */
    public function setPasswordAttr($value){
        return md5(var_dump($value));
    }

    /**
     * 自动完成
     */
    protected $auto = [];
    protected $insert = ["create_time"];
    protected $update = ["update_time"];

    public function setCreateTimeAttr(){
        return time();  //返回时间戳
    }

    public function setUpdateTimeAttr(){
        return time(); //返回时间戳
    }





}
