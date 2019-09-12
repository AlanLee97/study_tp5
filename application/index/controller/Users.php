<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;


/**
 * 使用命令行创建的资源控制器
 * study_tp5目录下命令行输入php think make:controller app\index\controller\Users
 * Class Users
 * @package app\index\controller
 */
class Users extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        echo '<script>console.log("index()")</script>';
//        echo '我是Users控制器下的index方法';
        $data = Db::query("select * from user");
        $this->assign('data',$data);
        return view();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        echo '<script>console.log("create()")</script>';
        //
        return view();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    //接收数据
    public function save(Request $request)
    {
        echo '<script>console.log("save()")</script>';
        //接收数据
        $data = input('post.');
//        dump($data);
        //将数据插入到数据库中
        $rs = Db::execute('insert into user values(null,:username,:password)',$data);

        if ($rs){
            //插入成功
            $this->success('添加成功','/user');
        }else{
            $this->error('插入失败','/user');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        echo '<script>console.log("read()")</script>';
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        echo '<script>console.log("edit()")</script>';
        //在数据库中查询被修改的数据
        $data = Db::query('select * from user where id=?',[$id]);
//        dump($data);
        $this->assign('data',$data[0]);
        return view();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        echo '<script>console.log("update()")</script>';
        //接收数据
        $data = input();
//        dump($data);

        //将数据更新到数据库中
        $rs = Db::execute('update user set username=:username,password=:password where id=:id',$data);

        if ($rs){
            $this->success('更新成功');
        }else{
            $this->error('更新失败');
        }

    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        echo '<script>console.log("delete()")</script>';
        //根据id删除数据
        $rs = Db::execute('delete from user where id=:id',[$id]);
        if ($rs){
            $this->success('数据删除成功','/user');
        }else{
            $this->error('删除失败', '/user');
        }
    }

    /**
     * ajax删除用户数据
     */
    public function ajax_del(){
        echo 'ajax_del()';
        dump(input());

        //接收数据
        $id = input('post.id');
        dump($id);
    }
}
