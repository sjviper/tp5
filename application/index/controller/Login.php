<?php
namespace app\index\controller;
use app\index\model\User;
use app\index\model\Qrcode;
use think\Controller;
use think\Exception;
use think\Request;
use think\View;
use think\Validate;
class Login extends Controller
{
    //转到对应的html页面
    public function index(){
        return $this->fetch();
    }
    //验证用户登录
    public function checkuser()//用户登录账号密码验证
    {
        $request = Request::instance();
        $uname = $request->post('uname');
        $upwd = md5($request->post('upwd'));
        $user = new User();
        $result = $user::get(['uname' => $uname, 'upwd' => $upwd]);//验证用户信息
        if ($result != NULL) {
            $data = array();
            $data['uname'] = $result['uname'];
            $data['nickname'] = $result['nickname'];
            $data['type'] = $result['type'];
            session('uid', $result['uid']);
            return $this->redirect('Index/index');//重定向到首页
        }
        else{
            $msg='账号密码错误登录失败';
            $view=new View();
            $view->assign('msg',$msg);
            return $view->fetch();
        }
    }
    public function reg(){
        return $this->fetch();
    }
    public function addUser(){ //用户注册接口
        $request = Request::instance();
        $uname = $request->post('uname');
        $upwd = md5($request->post('upwd'));//MD5加密
        $user=new User();
        $user['uname']=$uname;//账号
        $user['upwd']=$upwd;//密码
        $user['nickname']='user_'.substr($uname,0,3);//昵称
        $user['reg_time']=time();//注册时间  这里使用时间戳形式
        try{
            if($user->save()>0)
                return $this->redirect('Login/index');//注册成功跳到登录页面
            else
                return $this->redirect('Login/reg');
        }catch (Exception $e) {
            return '用户添加失败！';
        }
    }

}