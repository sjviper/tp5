<?php
namespace app\index\controller;
use app\index\model\User;
use app\index\model\Qrcode;
use think\Controller;
use think\Request;

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
        $code=$request->post('code');
        $user=new User();
        $rcode=new Qrcode();
       if($rcode->check($code))
        {
            $result=$user::get(['uname'=>$uname,'upwd'=>$upwd]);//验证用户信息
            if($result!=NULL)
            {
                $data=array();
                $data['uname']=$result['uname'];
                $data['nickname']=$result['nickname'];
                $data['type']=$result['type'];
                return \json($data);
            }
            else
                return '{msg:"账号或密码错误!"}';
        }
       else
          return '{msg:"验证码错误！"}';

    }

}