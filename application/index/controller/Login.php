<?php
namespace app\index\controller;
use app\index\model\User;
use think\Controller;
use think\Request;
use think\response\Json;

class Login extends Controller
{
    //转到对应的html页面
    public function index(){
        return $this->fetch();
    }
    //验证用户登录
    public function checkUser(){
        $request=Request::instance();
        $uname=$request->post('uname');
        $upwd=md5($request->post('pwd'));
        $user=new User();
        $result=$user::get(['uname'=>$uname,'upwd'=>$upwd]);
       if($result!=NULL)
           {
               $data=array();
               $data['uname']=$result['uname'];
               $data['nickname']=$result['nickname'];
               $data['type']=$result['type'];
               return \json($data);

           }
       else
           {
               return '{msg:"账号或密码错误!"}';
           }
    }

}