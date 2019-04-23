/*获取登录验证码*/
function getCode(id) {
    var a=document.getElementById(id);
    a.setAttribute("src","http://localhost/index.php/index/Qrcode");
}
function getData(un,pwd,code) {
    var uname=document.getElementById(un);
    var pwd=document.getElementById(pwd);
    var code=document.getElementById(code);
   //a.setAttribute("href","http://localhost/index.php/index/Qrcode");
    window.alert(un);
}