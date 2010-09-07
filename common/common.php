<?php
@header('content-Type: text/html; charset=gb2312');

$dbcharset = 'gb2312';

include_once("Smarty.class.php");			//include  smarty
//======= @@@@help 1.这里是将DB_Sql类文件包含进来，下面一行是将一个中文截取类包含到当前页==============================
include_once("database.inc.php");			//include db.class
//=======================================
define("NUM", 5); //定义每次显示的新闻条数

$smarty = new Smarty(); //建立smarty实例对象$smarty
$smarty->templates_dir = "./templates"; //设置模板目录
$smarty->compile_dir ="./templates_c"; //设置编译目录
$smarty->cache_dir = "./cache"; //设置缓存目录
$smarty->caching = false; //这里是调试时设为false,发布时请使用true
$smarty->left_delimiter = "<{"; //设置左边界符
$smarty->right_delimiter = "}>"; //设置右边界符

//=========@@@@help 2.实例化一个类，并设置类的Host, Database, User, Password属性, 最后connect数据库=========================
$db = new DB_Sql(); //实例化一个DB类
$db->Host = "localhost"; // 数据库主机名
$db->Database = "techflash"; //数据库名称
$db->User = "root"; //用户名
$db->Password = "123"; //密码
$db->connect(); //进行数据库连接

//设置Mysql编码
mysql_query("set names ".$dbcharset) ;

?>