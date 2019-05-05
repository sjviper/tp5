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
       return $this->fetch();
    }
}
