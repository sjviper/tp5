<?php

namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Exception;
use think\Url;
use think\Request;
use app\index\model\User;
class Index extends Controller
{
    public function index()
    {
        /*try{
            $result=Db::execute('insert into user (uid,uname,upwd,nickname,type) values (?,?,?,?,?)',[1,'EEEEE','WWWWW','QQQQ',1]);
        }catch (Exception $e)
        {
            return '插入操作有误';
        }

        $show=Db::query('select * from user');
        echo $result.'<br>';
        print_r($show);
        $MD5=md5('123','SJ');
        echo $MD5;
        $user=User::get(1);
        echo $user['uname'];

        $u=new User();
        $list=[
            ['uname'=>'玩好吗','upwd'=>md5('123'),'nickname'=>'MM','type'=>1],
            ['uname'=>'发生的','upwd'=>md5('1235678'),'nickname'=>'NNNN','type'=>0]
        ];
        if($u->saveAll($list))
            echo 'OK';
        */
        $user=array();
        $user['uname']='AAAAAAA';
        echo (User::update($user,['uid'=>100]));
    }
    public  function url2()
    {

    }
}
