<?php


namespace app\index\validate;
use think\Validate;
class User extends Validate
{
    //验证规则
    protected $rule=[
        ['uname','requrie|min:2','账号不能小于2位']

    ];

}