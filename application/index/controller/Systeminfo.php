<?php
/**
 *取系统配置信息
 * QQ:1647762341
 */

namespace app\index\controller;
class Systeminfo
{
    function getSystemInfo(){
        $system_version=PHP_OS;//系统版本
        $system_evn=$_SERVER["SERVER_SOFTWARE"];//运行环境
        $system_phpversion=THINK_VERSION;//thinkphp运行版本
        $system_surplusspace=(int) round((disk_free_space(".")/(1024*1024)),2);//M表示//磁盘剩余空间
        $system_ip=gethostbyname($_SERVER['SERVER_NAME']);//服务器ip
        $system_memory='';//已用内存百分比
        $sysArray=array();//存放信息的数组
        $sysArray['version']= $system_version;
        $sysArray['evn']= $system_evn;
        $sysArray['phpversion']= $system_phpversion;
        $sysArray['surplusspace']= $system_surplusspace;
        $sysArray['ip']= $system_ip;

        ////////////////////////////////////////////////////
        /// 取内存信息  暂时只支持Windows Linux没测试过
        /// ///////////////////////////////////////////////
        if($system_version=="WINNT")//服务器系统是Windows系统
            {
                $out=array();
                $ms=array();
                $m1='';//
                $str = shell_exec('systeminfo | find "内存"');//执行CMD命令取总内存 中文提示符
                if($str=="")
                    $str = shell_exec('systeminfo | find "Memory"');//执行CMD命令取总内存 英文提示符;

                $ms=explode("MB",$str);//字符串分隔
                $str=$ms[0];//0是总物理内存
                $pattern = '/[0-9].*[0-9]/';//正则表达式
                preg_match($pattern, $str, $out);//正则处理
                $str=$out[0];
                $str=str_replace(',','',$str);//如果出现1,112格式则去掉,
                $system_memory=(int)$str;
                $str=$ms[1];//1是剩余物理内存
                $pattern = '/[0-9].*[0-9]/';//正则表达式
                preg_match($pattern, $str, $out);//正则处理
                $str=$out[0];
                $str=str_replace(',','',$str);//如果出现1,112格式则去掉,
                $m1=(int)$str;
                $system_memory=((int)((($system_memory-$m1)/$system_memory)*100)).'%';
            }
        $sysArray['used_memory']=$system_memory;
        $jsonObj_1 = json_encode($sysArray);//生成json数据
        return $jsonObj_1;

    }
}