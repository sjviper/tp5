<?php
namespace app\index\controller;
use app\index\model\User;
use think\Exception;

class SJUser{
    public function addUser($uname='',$upwd='',$nickname=''){
        $user=new User();
        $user['uname']=$uname;//账号
        $user['upwd']=md5($upwd);//密码 MD5加密
        $user['nickname']=$nickname;//昵称
        $user['reg_time']=time();//注册时间  这里使用时间戳形式
        try{
           if($user->save()>0)
               echo '用户添加成功！';
           else
               echo '数据添加失败！';
       }catch (Exception $e)
       {
           echo '用户添加失败';
       }


    }
    public function test(){
        $list=User::all();
        foreach ($list as $user)
        {
            echo $user['nickname'].':'.$user['type'].'  注册时间'.$user['reg_time'].'<br>';
        }
    }

}