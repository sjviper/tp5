<?php


namespace app\index\controller;
use app\index\model\Qrcode;
use app\index\model\User;
use think\Controller;
use think\Exception;
use think\Request;
use think\Session;
use think\View;

class Upshop extends Controller
{
   public function index(){     //首页
       return $this->fetch();
   }
    public function ad(){ //测试
        return $this->fetch();
    }
    public function login(){//用户登录
        return $this->fetch();
    }

    public function reg(){//用户注册
        return $this->fetch();
    }


}