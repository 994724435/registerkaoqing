<?php
    
    require("weixin_base_api.php");

    define("TOKEN","weixin");
    define("ACCESS_TOKEN","lo9zShAQs0ft8TeIft7e80nYrYhJYfOZrEXxlulK8IkxyJih03nwYQELi2yQfQOblUD6Mwuexx44RbwkvXWy-THtMxAF8BmUV0qIFf53iUc");
    $wechat = new Wechat_base_api();


    if(!isset($_GET['echostr']))
    {
        //调用响应消息函数
        $wechat->responseMsg();
    }
    else
    {
        //实现网址接入，调用验证消息函数   
        $wechat->valid();
    }


?>