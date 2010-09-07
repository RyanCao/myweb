<?php
/*
About: 这是Sam Teng写的BluePage分页类的默认配置文件，请不要删除
　　　 你可以照这个文件拷贝一分
       请根据你的需要保存相应的编码格式，如ansi或utf-8
　　　 在使用的时候将路径加入到 $pBP->getHTML( $aPDatas , '相对路径与此文件名' );
*/

// 以下标签名称，可以任意组合，以|隔开
// f  首页
// pg 上一组页码
// p  上一页
// bar  分页条
// ng 下一组页码
// n  下一页
// m  总页数
// sl 下拉选页
// i  Input表单

/***  以下为HTML格式配置，需要有一定HTML知识  ***/
//请自行修改为自己需要的链接形式，请勿数字键名
//
$PA[f]   = '<a href="%s" title="第一页">首页</a> ' ;      //首页
$PA[pg]  = '<a href="%s" title="上一组页码">[<<]</a> ' ;  //上一组页码
$PA[p]   = '<a href="%s" title="上一页">上一页</a> ' ;    //上一页
$PA[bar] = '<a href="%1$s" title=""><span id="pn%2$d">%2$d</span></a> ' ;       //分页条
$PA[ng]  = '<a href="%s" title="下一组页码">[>>]</a> ' ;  //下一组页码
$PA[n]   = '<a href="%s" title="下一页">[下一页]</a> ' ;    //下一页
$PA[m]   = '<a href="%s" title="">%d</a> ' ;       //总页
$PA[sl]  = '<option value="?%s%s=%s%5$d%s">%5$d</option>\n' ;  //下拉表单页码,

//突出当前页的效果 请自行修改'<b><i>%d</i></b>'部份
$PA[bar_s1] = "<script>var ThisPN=document.getElementById('pn%d');ThisPN.innerHTML='<b><i>%d</i></b>';</script>";
//分页数字条的头部与尾部
$PA[bar_head] = '' ;      //这个会加到分页条头部
$PA[bar_end] = '' ;       //这个会加到分页条尾部

//下拉表单头部 不需要修改
$PA[sl_head] =  "<select name=\"goPage\" onchange=\"window.location=this.value\">\n" ; 
//下拉表单尾部 不需要修改
$PA[sl_end] =  "</select>" ; 

//表单input
$PA[i] = ' <input type="text" style="border:1 solid #ccc;width:26px;" name="toPage" onkeydown="if(event.keyCode==13) {window.location=\'?%s%s=%s\'+this.value+\'%s\'; return false;}" > ' ;

?>