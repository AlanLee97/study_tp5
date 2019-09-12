<?php
/**
 * Created by PhpStorm.
 * User: AlanLee
 * Date: 2019/8/22
 * Time: 6:41
 */

namespace app\index\model;

use think\Model;

class User2 extends Model {
    protected $table = "user";

    public function index(){
        echo "app\index\model -> User2 -> index()";
    }
}