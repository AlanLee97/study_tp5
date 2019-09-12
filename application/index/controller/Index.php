<?php
namespace app\index\controller;

use think\Config;
use think\Db;
use think\Controller;
//use app\index\controller\User;
use app\admin\controller\Index as adminIndex;
use app\admin\controller\Hello;
use think\Env;
use think\Loader;

class Index extends Controller
{



    public function index()
    {
//        $data = Db::table("user")->select();
//
//        $this->assign("data", $data);
//
//        return view();

        return "我是前台的Index/index方法";
    }

    public function hello(){
        return 'Hello,Alan. This is application/index/controller/Index.php-->hello()';
    }


    /**
     * 跨控制器调用=======================================
     */


    /**
     * 调用前台控制器
     */
    public function callUserHello(){
        //方法1 使用命名空间
        $model = new \app\index\controller\User;
        echo $model->hello();

        echo "<hr>";

        //方法2 使用use
        $model = new User;
        echo $model->hello();

        echo "<hr>";

        //使用系统方法controller实例化User
        $model = controller('User');
        echo $model->hello();

    }

    /**
     * 调用后台控制器
     */
    public function callAdminHello(){
        //方法1：使用new 命名空间方法
//        $model = new \app\admin\controller\Index();
        $model = new \app\admin\controller\Hello();
        echo $model->sayHello();

        echo "<hr>";

        //方法2：使用use
//        $model = new adminIndex();
        $model = new Hello();
        echo $model->sayHello();

        echo "<hr>";

        //方法3：使用系统方法
        $model = \controller('app\admin\controller\Hello');
        echo $model->sayHello();

    }

    /**
     * 方法调用===========================================
     **/

    /**
     * 调用控制器中的方法(4种方法)
     * 1:this
     * 2:self
     * 3:控制器::方法
     * 4:action('方法名')
     */
    public function callFunction(){
        //方法1：this
        echo $this->hello();
        echo "<hr>";

        //方法2：self
        echo self::hello();
        echo "<hr>";

        //方法3：控制器::方法
        echo Index::hello();
        echo "<hr>";

        //方法4：action('方法名')
        echo action('hello');
    }

    /**
     * 调用其他控制器的方法
     */
    public function callOtherFunction(){

        //方法1：使用命名空间
        $rs = new \app\index\controller\User();
        echo $rs->hello();

        echo '<hr>';

        //方法2：使用系统方法 action
        $rs = action('User\hello');
        echo $rs;

        echo '<hr>';


    }


    /**
     * 配置=======================================================
     * 有6个配置文件
     * 1、惯例配置
     * 2、应用配置
     * 3、扩展配置
     * 4、场景配置
     * 5、模块配置
     * 6、动态配置
     */


    /**
     * 1、惯例配置
     */
    //读取配置文件
    public function getConfig1(){
        //输出配置内容
        //方法1：通过系统函数config读取配置
        /*echo config('name');
        echo "<hr>";

        echo config('age');
        echo "<hr>";

        echo config('gender');
        echo "<hr>";*/


        //方法2：通过系统类读取配置
        /*echo Config::get('name');
        echo "<hr>";
        dump(Config::get('abc'));    //不存在的配置,则返回NULL
        echo "<hr>";*/

        //读取二级配置
        /*echo Config::get("student.name");
        echo "<hr>";

        echo Config::get("student.age");
        echo "<hr>";*/





    }



    /**
     * 2、应用配置
     * config.php
     */
    public function getConfig2(){

    }


    /**
     * 3、扩展配置
     * 对应用配置进行分类管理
     * database.php文件
     * /extra文件夹，放自定义的配置文件
     */
    public function getConfig3(){
        /*echo Config::get("database.type")."<hr>";
        echo Config::get("database.hostname")."<hr>";
        echo Config::get("database.database")."<hr>";
        echo Config::get("database.username")."<hr>";
        echo Config::get("database.password")."<hr>";
        dump(Config::get());    //无参数时，打印所有配置项
        */

        //读取自定义配置项
        echo \config('diy_user.name')."<hr>";
        echo \config('diy_user.age')."<hr>";
        echo \config('diy_user.gender')."<hr>";
        echo \config('diy_user.work')."<hr>";

    }


    /**
     * 4、场景配置
     */
    public function getConfig4(){
        echo Config::get('database.database');
        echo '<hr>';

        echo Config::get('database.password');
        echo '<hr>';

        echo Config::get('database.hostport');
        echo '<hr>';
    }


    /**
     * 5、模块配置
     * 每个模块里独有的配置
     * 以前台Index模块为例，在application/index下新建一个config.php文件
     */
    public function getConfig5(){
        echo Config::get('index');
    }


    /**
     * 6、动态配置
     * 临时性的配置
     */
    public function setConfig(){
        //打印修改配置前的内容
        echo Config::get('index');
        echo '<hr>';
        //2种方法：
        //1:系统函数config(param1,param2)
        echo \config('index','动态配置修改配置项1');
        echo '<hr>';

        //2：系统类Config.set()
        echo Config::set('index','动态配置修改配置项2');
    }


    /**
     * 环境变量配置
     * 在网站根目录下创建.env文件
     */
    public function getEnv(){
        dump(Env::get('name'));
        echo '<hr>';

        //读取数组配置
        dump(Env::get('database.type'));
    }


    /**
     * 路由
     */
    //带一个参数的方法
    public function page(){
        echo input('id');
    }

    //带两个参数的方法
    public function date(){
        echo input('month').' '.input('day');
    }

    //全动态路由
    public function dongtai(){
        echo input('param1').' '.input('param2');
    }

    //完全匹配路由
    public function match(){
        echo "测试完全匹配路由";
    }

    //带额外参数的路由
    public function extra(){

        //打印参数
        dump(input());

        echo "测试带额外参数的路由的方法";
    }


    /**
     * 测试请求方式=================================
     */
    //get
    public function type(){

        dump(input());
        return view();
    }

    //空操作
    public function _empty(){
        $this->redirect('index/index');
    }





    //获取数据模型
    public function getDataModel(){

        $user2 = new \app\index\model\User2();
        dump($user2::get(1)->toArray());
    }

    //模型的实例化
    public function shili(){
        //1.使用new实例化model
        $user2 = new \app\index\model\User2();
        $res = $user2->get(1);
        dump($res->toJson());

        //2.使用loader类
        $user22 = Loader::model("index/User2");
        $res = $user2::get(3);
        dump($res->toArray());

        //3.使用助手函数
        $user222 = model("index/User2");
        $res = $user2::get(4);
        dump($res->toArray());
    }

}
